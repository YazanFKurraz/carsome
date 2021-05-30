<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UserRequest;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:superadministrator|dealer']);
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function indexUser()
    {
        $users = User::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('admin.manage.user.index', compact('users'));
    }

    public function showUser($id)
    {

        $user = User::find($id);
        return view('admin.manage.user.show', compact('user'));

    }

    public function createUser()
    {
        $roles = Role::all();
        return view('admin.manage.user.create', compact('roles'));
    }

    public function storeUser(UserRequest $request)
    {

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
        return redirect()->route('admin.users');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.manage.user.edit', compact('roles', 'user'));
    }

    public function updateUser(UserRequest $request, $id)
    {

        $user = User::find($id);

        if ($request->donotchange == true) {
            $password = $user->password;
        } else {
            $password = $request->password;
            $user->password = Hash::make($password);
//            User::create([
//                'password' => Hash::make($password)]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->syncRoles($request->roles);
        return redirect()->route('admin.users');
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
        return redirect()->route('admin.permissions');
    }

    public function showPermission($id)
    {
        $permission = Permission::find($id);
        return view('admin.manage.permission.show', compact('permission'));

    }

    public function editPermission($id)
    {
        $permission = Permission::find($id);
        return view('admin.manage.permission.edit', compact('permission'));
    }

    public function updatePermission(PermissionRequest $request, $id)
    {

        $permission = Permission::find($id);
        $permission->update([
            'display_name' => $request->display_name,
            'description' => $request->description
        ]);

        return redirect()->route('admin.permission.show', $id);
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

        $role = Role::create([
            'display_name' => $request->display_name,
            'name' => $request->name,
            'description' => $request->description
        ]);

        $role->syncPermissions($request->permissionsSelected);

        return redirect()->route('admin.roles');

    }

    public function showRole($id)
    {
        $role = Role::find($id);
        return view('admin.manage.role.show', compact('role'));

    }

    public function editRole($id)
    {
        $permissions = Permission::all();
        $role = Role::find($id);
        return view('admin.manage.role.edit', compact('role', 'permissions'));
    }

    public function updateRole(RoleRequest $request, $id){
        $role = Role::find($id);

        $role->update([
            'display_name' => $request->display_name,
            'name' => $request->name,
            'description' => $request->description
        ]);

        $role->syncPermissions($request->permissionsSelected);

        return redirect()->route('admin.role.show', $id);
    }

}
