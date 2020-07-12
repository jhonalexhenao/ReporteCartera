<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Accounts;
use App\Aos_invoices;
use App\Aos_invoices_cstm;
use App\Aos_products;
use App\Aos_products_quotes;
use App\B13_sucursales;
use App\B13_sucursales_cstm;


class reporteController extends Controller
{
    //
    public function getIndex() {
        

        return 'Estoy probando';
    }

    public function index() {   

      $sucursales =DB::table('b13_sucursales')
                ->join('b13_sucursales_cstm','b13_sucursales.id','=','b13_sucursales_cstm.id_c')
                ->select('b13_sucursales.name')
                ->get();

    $data =DB::table('aos_invoices')
        ->join('accounts','aos_invoices.billing_account_id','=','accounts.id')
        ->join('aos_invoices_cstm','aos_invoices.id','=','aos_invoices_cstm.id_c')        
        ->join('b13_sucursales','b13_sucursales.id','=','aos_invoices_cstm.b13_sucursales_id_c')
        ->join('b13_sucursales_cstm','b13_sucursales.id','=','b13_sucursales_cstm.id_c')
        ->select('aos_invoices_cstm.cedula_c', 'aos_invoices_cstm.b13_sucursales_id_c', 'aos_invoices_cstm.saldo_c','aos_invoices_cstm.no_pedido_c','b13_sucursales.name','accounts.id','aos_invoices.invoice_date' )
       ->where('aos_invoices.status', '=', 'Unpaid')
        ->orderBy('aos_invoices.invoice_date','asc')
        ->get(); 
                        
        return view('informe.index',array(
            "datos"=>$data,
            "sucursales"=>$sucursales
        ) );

    }


}
