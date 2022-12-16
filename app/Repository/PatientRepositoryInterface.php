<?php

namespace App\Repository;

interface PatientRepositoryInterface{

    // Get Patients
    public function GetPatients();

    // CreatePatients
    public function CreatePatients();

    // StorePatients
    public function StorePatients($request);

    // ShowPatients
    public function ShowPatients($id);

    // EditPatients
    public function EditPatients($id);

    // UpdatePatients
    public function UpdatePatients($request);

    // DeletePatients
    public function DeletePatients($request);

}


