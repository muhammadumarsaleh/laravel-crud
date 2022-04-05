<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Mapel_Siswa;

class ApiController extends Controller
{
    public function editnilai(Request $request, $id){

        $siswa = siswa::find($id);
        $siswa->mapel()->updateExistingPivot($request->pk, ['nilai' => $request->value]);
        
    } 
}