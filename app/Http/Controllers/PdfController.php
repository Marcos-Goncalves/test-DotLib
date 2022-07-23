<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePDF($id){
        $pedidoProd = DB::table('pedido_produtos')
            ->join('pedidos', 'pedido_produtos.pedido_id', '=', 'pedidos.id')
            ->join('produtos', 'pedido_produtos.produto_id', '=', 'produtos.id')
            ->select('pedido_produtos.*', 'pedidos.*', 'produtos.*')
            ->where('pedido_produtos.pedido_id', $id)
            ->get();

        $pdf = PDF::loadView('PDF', compact('pedidoProd'));

        return $pdf->download('testPDF.pdf');
    }
}
