<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyValue = $request->keyvalue;
        if (strlen($keyValue)) {
            $student = student::where('nim', 'like', "%$keyValue%")
                ->orWhere('name','like', "%$keyValue%")
                ->orWhere('major','like', "%$keyValue%")->get();
        } else {
            $student = student::all();
        }
        return view('student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        Session::flash('nim', $request->nim);
//        Session::flash('name', $request->name);
//        Session::flash('major', $request->major);

        $request->validate([
            'nim'=>'required|numeric|unique:student,nim',
            'name'=>'required:student,name',
            'major'=>'required:student,major',
        ]);

        $data = new student();
        $data->nim = $request->nim;
        $data->name = $request->name;
        $data->major = $request->major;
        $data->save();
        return redirect('student')->with('success', 'Successfully add student');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = student::where('nim', $id)->first();
        return view('student.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required:student,name',
            'major'=>'required:student,major',
        ]);

        $data = [
            'name' => $request->name,
            'major' => $request->major,
        ];
        student::where('nim', $id)->update($data);
        return redirect('student')->with('success', 'Successfully edited student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        student::where('nim', $id)->delete();
        return redirect('student')->with('success', 'Successfully deleted student');
    }
}
