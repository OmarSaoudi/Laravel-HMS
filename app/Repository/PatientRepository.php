<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Blood;
use App\Models\Patient;

class PatientRepository implements PatientRepositoryInterface{

    public function GetPatients()
    {
        $patients = Patient::all();
        return view('pages.patients.index', ['patients' => $patients]);
    }

    public function CreatePatients()
    {
        $data['genders'] = Gender::all();
        $data['bloods'] = Blood::all();
        return view('pages.patients.create',$data);
    }

    public function StorePatients($request)
    {

        try {

            $patients = new Patient();
            $patients->name = ['en' => $request->name_en, 'ar' => $request->name];
            $patients->email = $request->email;
            $patients->date_birth = $request->date_birth;
            $patients->joining_date = $request->joining_date;
            $patients->address = $request->address;
            $patients->phone = $request->phone;
            $patients->blood_id = $request->blood_id;
            $patients->gender_id = $request->gender_id;
            $patients->save();
            return redirect()->route('patients.index');

        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function ShowPatients($id)
    {
        $patients = Patient::findorfail($id);
        return view('pages.patients.show',compact('patients'));
    }

    public function EditPatients($id)
    {
        $data['genders'] = Gender::all();
        $data['bloods'] = Blood::all();
        $patients =  Patient::findOrFail($id);
        return view('pages.patients.edit',$data,compact('patients'));
    }

    public function UpdatePatients($request)
    {
        try{
            $patients = Patient::findorfail($request->id);
            $patients->name = ['en' => $request->name_en, 'ar' => $request->name];
            $patients->email = $request->email;
            $patients->date_birth = $request->date_birth;
            $patients->joining_date = $request->joining_date;
            $patients->address = $request->address;
            $patients->phone = $request->phone;
            $patients->blood_id = $request->blood_id;
            $patients->gender_id = $request->gender_id;
            $patients->save();

            return redirect()->route('patients.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeletePatients($request)
    {
        Patient::destroy($request->id);
        return redirect()->route('patients.index');
    }

}
