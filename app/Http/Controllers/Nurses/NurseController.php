<?php

namespace App\Http\Controllers\Nurses;
use App\Http\Controllers\Controller;

use App\Models\Nurse;
use Illuminate\Http\Request;
use App\Repository\NurseRepositoryInterface;


class NurseController extends Controller
{

    protected $Nurse;

    public function __construct(NurseRepositoryInterface $Nurse)
    {
        $this->Nurse = $Nurse;
    }


    public function index()
    {
        return $this->Nurse->GetNurses();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Nurse->StoreNurses($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->Nurse->ShowNurses($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this->Nurse->UpdateNurses($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Nurse->DeleteNurses($request);
    }
}
