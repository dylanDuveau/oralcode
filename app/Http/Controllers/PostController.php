<?php

namespace App\Http\Controllers;

use App\Models\qrbdd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class PostController extends Controller
{

    Public function formulaire()
    {
     return view('formulaire');
    }
    Public function login()
    {
     return view('login');
    }

    Public function barrecode()
    {
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        echo $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);
    }
    public function getMembers(){
        $products = qrbdd::all();
        return view('qrcode')->with('products',$products);
    }


}
