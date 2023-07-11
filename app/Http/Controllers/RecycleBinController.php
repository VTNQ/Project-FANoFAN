<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RecycleBinController extends Controller
{
    public function delete_product(){
        DB::update('update table product set deleted_at=?',[now()]);
    }
}
