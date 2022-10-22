<?php

namespace App\Http\Controllers\Departments;
use App\Http\Controllers\Controller;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('pages.departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $departments = new Department();
            $departments->name = ['ar' => $request->name, 'en' => $request->name_en];
            $departments->status = 1;
            $departments->note = $request->note;
            $departments->save();

            return redirect()->route('departments.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            $departments = Department::findOrFail($request->id);
            $departments->name = ['ar' => $request->name, 'en' => $request->name_en];
            $departments->note = $request->note;

            if(isset($request->status)) {
              $departments->status = 1;
            } else {
              $departments->status = 2;
            }

            $departments->save();
            return redirect()->route('departments.index');
        }
        catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        Department::findOrFail($request->id)->delete();
        return redirect()->route('departments.index');
    }
}
