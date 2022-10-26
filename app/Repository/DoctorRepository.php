<?php

namespace App\Repository;

use App\Models\Specialist;
use App\Models\Department;
use App\Models\Gender;
use App\Models\Nationalitie;
use App\Models\Blood;
use App\Models\Doctor;
use App\Models\Day;
use App\Http\Traits\AttachFilesTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class DoctorRepository implements DoctorRepositoryInterface{

    use AttachFilesTrait;

    public function GetDoctors()
    {
        $doctors = Doctor::all();
        return view('pages.doctors.index',compact('doctors'));
    }

    public function CreateDoctors()
    {
        $data['specialists'] = Specialist::all();
        $data['departments'] = Department::all();
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationalitie::all();
        $data['bloods'] = Blood::all();
        $data['days'] = Day::all();
        return view('pages.doctors.create',$data);
    }

    public function StoreDoctors($request)
    {

        try {

            $doctors = new Doctor();
            $doctors->name = ['en' => $request->name_en, 'ar' => $request->name];
            $doctors->file_name =  $request->file('file_name')->getClientOriginalName();
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->date_birth = $request->date_birth;
            $doctors->joining_date = $request->joining_date;
            $doctors->degree = $request->degree;
            $doctors->address = $request->address;
            $doctors->phone = $request->phone;
            $doctors->note = $request->note;
            $doctors->status = $request->status;
            $doctors->specialist_id = $request->specialist_id;
            $doctors->department_id = $request->department_id;
            $doctors->blood_id = $request->blood_id;
            $doctors->nationalitie_id = $request->nationalitie_id;
            $doctors->gender_id = $request->gender_id;
            $doctors->save();
            $this->uploadFile($request,'file_name');
            $doctors->day()->attach($request->day_id);
            return redirect()->route('doctors.index');

        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function ShowDoctors($id)
    {
        $doctors = Doctor::findorfail($id);
        return view('pages.doctors.show',compact('doctors'));
    }

    public function EditDoctors($id)
    {
        $data['specialists'] = Specialist::all();
        $data['departments'] = Department::all();
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationalitie::all();
        $data['bloods'] = Blood::all();
        $data['days'] = Day::all();
        $doctors =  Doctor::findOrFail($id);
        return view('pages.doctors.edit',$data,compact('doctors'));
    }

    public function UpdateDoctors($request)
    {
        try{
            $doctors = Doctor::findorfail($request->id);
            $doctors->name = ['en' => $request->name_en, 'ar' => $request->name];
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->date_birth = $request->date_birth;
            $doctors->joining_date = $request->joining_date;
            $doctors->degree = $request->degree;
            $doctors->address = $request->address;
            $doctors->phone = $request->phone;
            $doctors->note = $request->note;
            $doctors->status = $request->status;
            $doctors->specialist_id = $request->specialist_id;
            $doctors->department_id = $request->department_id;
            $doctors->blood_id = $request->blood_id;
            $doctors->nationalitie_id = $request->nationalitie_id;
            $doctors->gender_id = $request->gender_id;

            if (isset($request->day_id)) {
                $doctors->day()->sync($request->day_id);
              } else {
                $doctors->day()->sync(array());
            }

            if($request->hasfile('file_name')){
                $this->deleteFile($doctors->file_name);
                $this->uploadFile($request,'file_name');
                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $doctors->file_name = $doctors->file_name !== $file_name_new ? $file_name_new : $doctors->file_name;
            }
            $doctors->save();

            return redirect()->route('doctors.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteDoctors($request)
    {
        $this->deleteFile($request->file_name);
        Doctor::destroy($request->id);
        return redirect()->route('doctors.index');
    }

    public function delete_all_d($request)
    {
        $this->deleteFile($request->file_name);
        $delete_all_id = explode(",", $request->delete_all_id);
        Doctor::whereIn('id', $delete_all_id)->delete();
        return redirect()->route('doctors.index');
    }

    public function DownloadAttachment($filename)
    {
        return response()->download(public_path('attachments/doctor/'.$filename));
    }


}
