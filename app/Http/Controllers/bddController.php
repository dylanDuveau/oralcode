<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\boites;
use App\Models\batiments;
use App\Models\produits;
use App\Models\categories;
use Dompdf\Dompdf;
use Dompdf\Options;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class bddController extends Controller {

    public function qrcode(){
    $batiments = batiments::all();
    $products = produits::all();
        //$products = boites::all();
        $boites= boites::select("boites.id",
            "boites.quantite",
            "produits.nom as produits_nom",
            "batiments.nom as batiments_nom")
        ->join("produits", "produits.id", "=", "boites.produit_id")
        ->join("batiments", "batiments.id", "=", "boites.batiment_id")
        ->get();

        return view('qrcode',compact('products','boites'));
    }
    public function qrcodePDF(){
        $products = boites::all();

        //$pourvue=array();
        foreach ($products as $products)
        $products->description=base64_encode(QrCode::format('png')->size(100)->generate($products->id));

        $html = view('qrcodepdf', compact('products'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream();


    }

    public function barrecode(){
        $products = produits::all();
        return view('codebarre')->with('products',$products);
    }


    public function codebarrePDF(){
        $products = produits::all();

        //$pourvue=array();
        foreach ($products as $prod)
        $prod->description=base64_encode(QrCode::format('png')->size(100)->generate($prod->id));

        $html = view('codebarrepdf', compact('products'))->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream();


    }
}
