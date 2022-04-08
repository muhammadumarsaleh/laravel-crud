<?php

namespace App\Http\Controllers;
use App\Models\Guru;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function profile(guru $guru){
        return view('guru.profile', ['guru' => $guru]);
    }
}