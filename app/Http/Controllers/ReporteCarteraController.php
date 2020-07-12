<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facade\DB;

class ReporteCarteraController extends Controller
{
    //
    public function getIndex() {
        
        $notas = DB::table(accounts)->get();
        var_dump(notas);
        return view('informe.index');
    }

}
