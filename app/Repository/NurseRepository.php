<?php

namespace App\Repository;

use App\Models\Nationalitie;
use App\Models\Blood;
use App\Models\Nurse;
use App\Http\Traits\AttachFilesTrait;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class NurseRepository implements NurseRepositoryInterface{

    use AttachFilesTrait;

    public function GetNurses()
    {
        $data['nationalities'] = Nationalitie::all();
        $data['bloods'] = Blood::all();
        $nurses = Nurse::all();
        return view('pages.Nurses.index',$data,compact('nurses'));
    }


    public function StoreNurses($request)
    {

        try {
            $id = IdGenerator::generate(['table' => 'nurses', 'length' => 6, 'prefix' => date('Y')]);
            $nurses = new Nurse();
            $nurses->nur_id = $id;
            $nurses->name = ['en' => $request->name_en, 'ar' => $request->name];
            $nurses->nurses_images =  $request->file('nurses_images')->getClientOriginalName();
            $nurses->email = $request->email;
            $nurses->date_birth = $request->date_birth;
            $nurses->joining_date = $request->joining_date;
            $nurses->address = $request->address;
            $nurses->phone = $request->phone;
            $nurses->note = $request->note;
            $nurses->status = 1;
            $nurses->blood_id = $request->blood_id;
            $nurses->nationalitie_id = $request->nationalitie_id;
            $nurses->save();
            $this->uploadFile($request,'nurses_images','nurses_images');
            return redirect()->route('nurses.index');

        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }



    public function ShowNurses($id)
    {
        $nurses = Nurse::findorfail($id);
        return view('pages.nurses.show',compact('nurses'));
    }

    public function UpdateNurses($request)
    {
        try{
            $nurses = Nurse::findorfail($request->id);
            $nurses->name = ['en' => $request->name_en, 'ar' => $request->name];
            $nurses->email = $request->email;
            $nurses->date_birth = $request->date_birth;
            $nurses->joining_date = $request->joining_date;
            $nurses->address = $request->address;
            $nurses->phone = $request->phone;
            $nurses->note = $request->note;
            $nurses->blood_id = $request->blood_id;
            $nurses->nationalitie_id = $request->nationalitie_id;
            if(isset($request->status)) {
                $nurses->status = 1;
              } else {
                $nurses->status = 2;
            }
            if($request->hasfile('nurses_images')){
                $this->deleteFile($nurses->nurses_images);
                $this->uploadFile($request,'nurses_images','nurses_images');
                $nurses_images_new = $request->file('nurses_images')->getClientOriginalName();
                $nurses->nurses_images = $nurses->nurses_images !== $nurses_images_new ? $nurses_images_new : $nurses->nurses_images;
            }
            $nurses->save();

            return redirect()->route('nurses.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function DeleteNurses($request)
    {
        $this->deleteFile($request->nurses_images);
        Nurse::destroy($request->id);
        return redirect()->route('nurses.index');
    }

    public function deleteFile($name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/nurses_images/'.$name);
        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/nurses_images/'.$name);
        }
    }
}
