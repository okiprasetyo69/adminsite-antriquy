<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MstInstances;

class InstansiController extends Controller
{
    public function index()
    {
        $dataInstansi = MstInstances::get();
        return view('instances.index', ['instansi' => $dataInstansi]);
    }
}
