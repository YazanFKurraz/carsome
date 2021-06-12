<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UserRequest;
use App\Models\Car;
use App\Permission;
use App\Role;
use App\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:superadministrator|administrator'])->except(['index']);
    }

    public function index()
    {
        if (auth()->user()->hasRole(['superadministrator', 'administrator'])) {

            $cars = Car::orderBy('id', 'desc')->take(5)->get();
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->take(5)->get();

            return view('admin.dashboard', compact('cars', 'notifications'));

        } elseif (auth()->user()->hasRole('dealer')) {

            $cars = Car::where('user_id', auth()->user()->id)->take(5)->get();

            return view('admin.dashboard', compact('cars'));

        } elseif (auth()->user()->hasRole('checkup')) {

            $cars = Car::where('is_checkup', 0)->take(5)->get();

            return view('admin.dashboard', compact('cars'));

        }

    }

    public function indexUser()
    {
        $users = User::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('admin.manage.user.index', compact('users'));
    }

    public function showUser($id)
    {

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.users')->with(['error' => __('Not found user')]);
        }

        return view('admin.manage.user.show', compact('user'));

    }

    public function createUser()
    {
        $roles = Role::all();
        return view('admin.manage.user.create', compact('roles'));
    }

    public function storeUser(UserRequest $request)
    {
        try {
            if (!empty($request->password)) {
                $password = trim($request->password);
            } else {
                $password = 'password';
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password)
            ]);

            $user->syncRoles($request->roles);
            return redirect()->route('admin.users')->with(['success' => __('Saved successfully')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.users')->with(['error' => __('Erorr : Try again in correct ')]);

        }
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        if (!$user) {
            return redirect()->route('admin.users')->with(['error' => __('Not found user')]);
        }

        return view('admin.manage.user.edit', compact('roles', 'user'));
    }

    public function updateUser(UserRequest $request, $id)
    {

        try {
            $user = User::find($id);

            if (!$user) {
                return redirect()->route('admin.users')->with(['error' => __('Not found user')]);
            }

            if ($request->donotchange == true) {
                $password = $user->password;
            } else {
                $password = $request->password;
                $user->password = Hash::make($password);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $user->syncRoles($request->roles);

            return redirect()->route('admin.user.show', $id)->with(['success' => __('Change saved successfully')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.users')->with(['error' => __('Erorr : Try again in correct')]);

        }
    }

    public function destroyUser($id)
    {

        try {
            $user = User::find($id);
            if (!$user) {
                return redirect()->route('admin.users')->with(['error' => __('Not found user')]);
            }

            $user->delete();

            return redirect()->route('admin.users')->with(['success' => __('Delete successfully')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.users')->with(['error' => __('Erorr : Try again in correct ')]);

        }

    }

    public function indexPermission()
    {
        $permissions = Permission::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('admin.manage.permission.index', compact('permissions'));
    }

    public function createPermission()
    {
        $roles = Role::all();
        return view('admin.manage.permission.create', compact('roles'));
    }

    public function storePermission(PermissionRequest $request)
    {

        try {
            if ($request->permission_type == 'basic') {

                $premission = Permission::create([
                    'display_name' => $request->display_name,
                    'name' => $request->name,
                    'description' => $request->description
                ]);


            } else if ($request->permission_type = 'crud') {

                $crud = explode(',', $request->crud_selected);

                if (count($crud) > 0) {
                    foreach ($crud as $x) {
                        $display_name = ucwords($x . ' ' . $request->resource);
                        $slug = strtolower($x) . '-' . $request->resource;
                        $description = "Allow a user to " . strtoupper($x) . ' a ' . ucwords($request->resource);

                        $premission = Permission::create([
                            'display_name' => $display_name,
                            'name' => $slug,
                            'description' => $description
                        ]);
                    }
                }

            } else {
                return redirect()->route('admin.permission.create')->withInput();
            }

            return redirect()->route('admin.permissions')->with(['success' => __('Saved successfully')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.permissions')->with(['error' => __('Erorr : Try again in correct ')]);

        }


    }

    public function showPermission($id)
    {
        $permission = Permission::find($id);

        if (!$permission) {
            return redirect()->route('admin.permissions')->with(['error' => __('Not found permission')]);
        }

        return view('admin.manage.permission.show', compact('permission'));

    }

    public function editPermission($id)
    {
        $permission = Permission::find($id);

        if (!$permission) {
            return redirect()->route('admin.permissions')->with(['error' => __('Not found permission')]);
        }

        return view('admin.manage.permission.edit', compact('permission'));
    }

    public function updatePermission(PermissionRequest $request, $id)
    {
        try {

            $permission = Permission::find($id);

            if (!$permission) {
                return redirect()->route('admin.permissions')->with(['error' => __('Not found permission')]);
            }

            $permission->update([
                'display_name' => $request->display_name,
                'description' => $request->description
            ]);

            return redirect()->route('admin.permission.show', $id)->with(['success' => __('Change saved successfully')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.permissions')->with(['error' => __('Erorr : Try again in correct ')]);

        }

    }

    public function destroyPermission($id)
    {

        try {
            $permission = Permission::find($id);
            if (!$permission) {
                return redirect()->route('admin.permissions')->with(['error' => __('Not found permission')]);
            }

            $permission->delete();

            return redirect()->route('admin.permissions')->with(['success' => __('Delete successfully')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.permissions')->with(['error' => __('Erorr : Try again in correct ')]);

        }

    }

    public function indexRole()
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('admin.manage.role.index', compact('roles'));

    }

    public function createRole()
    {
        $permissions = Permission::all();
        return view('admin.manage.role.create', compact('permissions'));
    }

    public function storeRole(RoleRequest $request)
    {

        try {

            $role = Role::create([
                'display_name' => $request->display_name,
                'name' => $request->name,
                'description' => $request->description
            ]);

            $role->syncPermissions($request->permissionsSelected);

            return redirect()->route('admin.roles')->with(['success' => __('Saved successfully')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.roles')->with(['error' => __('Erorr : Try again in correct ')]);

        }

    }

    public function showRole($id)
    {
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('admin.roles')->with(['error' => __('Not found role')]);
        }

        return view('admin.manage.role.show', compact('role'));

    }

    public function editRole($id)
    {
        $permissions = Permission::all();
        $role = Role::find($id);

        if (!$role) {
            return redirect()->route('admin.roles')->with(['error' => __('Not found role')]);
        }

        return view('admin.manage.role.edit', compact('role', 'permissions'));
    }

    public function updateRole(RoleRequest $request, $id)
    {

        try {

            $role = Role::find($id);

            if (!$role) {
                return redirect()->route('admin.roles')->with(['error' => __('Not found role')]);
            }

            $role->update([
                'display_name' => $request->display_name,
                'name' => $request->name,
                'description' => $request->description
            ]);

            $role->syncPermissions($request->permissionsSelected);

            return redirect()->route('admin.role.show', $id)->with(['success' => __('Change saved successfully')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.roles')->with(['error' => __('Erorr : Try again in correct ')]);

        }

    }

    public function destroyRole($id)
    {

        try {
            $role = Role::find($id);
            if (!$role) {
                return redirect()->route('admin.roles')->with(['error' => __('Not found role')]);
            }

            $role->delete();

            return redirect()->route('admin.roles')->with(['success' => __('Delete successfully')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.roles')->with(['error' => __('Erorr : Try again in correct ')]);

        }

    }


}
