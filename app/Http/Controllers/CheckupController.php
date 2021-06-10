<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckupRequest;
use App\Models\Car;
use App\Models\Checkup;
use App\Models\Images_checkups;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class CheckupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:superadministrator|administrator|checkup']);
    }

    public function index()
    {

        $cars = Car::with('checkup')->orderby('id', 'DESC')->paginate(PAGINATION_COUNT);

        return view('admin.checkups.index', compact('cars'));

    }

    public function create($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return redirect()->route('admin.checkups')->with(['error' => __('Car not found')]);
        }

        return view('admin.checkups.create', compact('car'));
    }

    public function store(CheckupRequest $request, $id)
    {

        try {

            DB::beginTransaction();

            //save and update is_checkup car7
            $car = Car::find($id);

            if (!$car) {
                return redirect()->route('admin.checkups')->with(['error' => __('Car not found')]);
            }

            if (!$request->has('is_checkup'))
                $request->request->add(['is_checkup' => 0]);
            else
                $request->request->add(['is_checkup' => 1]);

            if (!$request->has('is_accident'))
                $request->request->add(['is_accident' => 0]);
            else
                $request->request->add(['is_accident' => 1]);

            $checkup = Checkup::create($request->except(['is_checkup', '_token']));

            $car->update([
                'is_checkup' => $request->is_checkup
            ]);

            DB::commit();

            return redirect()->route('admin.checkups')->with(['success' => __('Success Save')]);

        } catch (Exception $ex) {
            DB::rollBack();

            return redirect()->route('admin.checkups')->with(['error' => __('Erorr')]);

        }

    }

    public function show($id = null)
    {

        if ($id) {
            $checkup = Checkup::with('car')->find($id);
            if (!$checkup) {
                return redirect()->route('admin.checkups')->with(['error' => __('checkup not found')]);
            }
            return view('admin.checkups.show', compact('checkup'));
        } else {
            return redirect()->route('admin.checkups')->with(['error' => __('No information check up car please add checkups')]);
        }
    }

    public function edit($id = null)
    {
        if ($id) {
            $checkup = Checkup::with('car')->find($id);
            if (!$checkup) {
                return redirect()->route('admin.checkups')->with(['error' => __('checkup not found')]);
            }
            return view('admin.checkups.edit', compact('checkup'));
        }

        return redirect()->route('admin.checkups')->with(['error' => __('No information check up car please add checkups')]);

    }

    public function update(CheckupRequest $request, $id)
    {
        try {
            $checkup = Checkup::with('car')->find($id);
            if (!$checkup) {
                return redirect()->route('admin.checkups')->with(['error' => __('checkup not found')]);
            }

            if (!$request->has('is_accident'))
                $request->request->add(['is_accident' => 0]);
            else
                $request->request->add(['is_accident' => 1]);

            $checkup->update($request->except(['_token']));

            return redirect()->route('admin.checkups')->with(['success' => __('Success Save Change')]);

        } catch (Exception $ex) {

            return redirect()->route('admin.checkups')->with(['error' => __('Erorr')]);

        }
    }

    public function showDropzone($id)
    {

        $checkup = Checkup::with('car')->find($id);

        return view('admin.checkups.dropzone', compact('checkup'));
    }

    public function upload(Request $request, Checkup $checkup)
    {

        $file = $request->file('file');
        $filename = uploadImage('checkup', $file);
        if ($filename) {
            $checkup->images_checkup()->create([
                'path' => $filename,
            ]);

            return response()->json([
                'upload_status' => 'success'

            ], 200);
        } else {
            return response()->json([
                'upload_status' => 'failde'
            ], 401);

        }
    }

    public function deleteImage(Images_checkups $image)
    {

        try {

            $path = public_path($image->path);
            File::delete($path);
            $image->delete();

            return back()->with(['success' => __('Success delete')]);

        } catch (Exception $ex) {

            return back()->with(['error' => __('Error delete')]);

        }
    }

}
