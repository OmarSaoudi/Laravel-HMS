<?php

namespace App\Repository;

interface NurseRepositoryInterface{

    // Get Nurses
    public function GetNurses();

    // StoreNurses
    public function StoreNurses($request);

    // ShowNurses
    public function ShowNurses($id);

    // UpdateNurses
    public function UpdateNurses($request);

    // DeleteNurses
    public function DeleteNurses($request);

}


