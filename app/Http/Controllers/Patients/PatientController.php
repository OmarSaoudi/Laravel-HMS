<?php

namespace App\Http\Controllers\Patients;
use App\Http\Controllers\Controller;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Repository\PatientRepositoryInterface;

class PatientController extends Controller
{

    protected $Patient;

    public function __construct(PatientRepositoryInterface $Patient)
    {
        $this->Patient = $Patient;
    }


    public function index()
    {
        return $this->Patient->GetPatients();
    }

    public function create()
    {
        return $this->Patient->CreatePatients();
    }

    public function store(Request $request)
    {
        return $this->Patient->StorePatients($request);
    }

    public function show($id)
    {
        return $this->Patient->ShowPatients($id);
    }

    public function edit($id)
    {
        return $this->Patient->EditPatients($id);
    }

    public function update(Request $request)
    {
        return $this->Patient->UpdatePatients($request);
    }


    public function destroy(Request $request)
    {
        return $this->Patient->DeletePatients($request);
    }

}
