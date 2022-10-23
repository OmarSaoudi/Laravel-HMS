<?php

namespace App\Repository;

interface DoctorRepositoryInterface{

    // Get Doctors
    public function GetDoctors();

    // CreateDoctors
    public function CreateDoctors();

    // StoreDoctors
    public function StoreDoctors($request);

    // ShowDoctors
    public function ShowDoctors($id);

    // EditDoctors
    public function EditDoctors($id);

    // UpdateDoctors
    public function UpdateDoctors($request);

    // DeleteDoctors
    public function DeleteDoctors($request);

}


