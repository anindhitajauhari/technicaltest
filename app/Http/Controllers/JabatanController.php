<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function index(){
        $data = Jabatan::all();
        return view('datapegawai', compact('data'));
    }

    public function tambahpegawai(){
        $data = Jabatan::all();
        return view('tambahdata', compact('data'));
    }

}
