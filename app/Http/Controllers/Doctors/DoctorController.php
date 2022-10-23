<?php

namespace App\Http\Controllers\Doctors;
use App\Http\Controllers\Controller;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Repository\DoctorRepositoryInterface;


class DoctorController extends Controller
{

    protected $Doctor;

    public function __construct(DoctorRepositoryInterface $Doctor)
    {
        $this->Doctor = $Doctor;
    }


    public function index()
    {
        return $this->Doctor->GetDoctors();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Doctor->CreateDoctors();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Doctor->StoreDoctors($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->Doctor->ShowDoctors($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->Doctor->EditDoctors($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->Doctor->UpdateDoctors($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Doctor->DeleteDoctors($request);
    }
}
