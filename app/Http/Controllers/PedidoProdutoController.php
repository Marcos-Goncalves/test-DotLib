<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PedidoProduto;
use Illuminate\Support\Facades\DB;

class PedidoProdutoController extends Controller
{
    public function details($id){
       $pedidoProd = DB::table('pedido_produtos')
            ->join('pedidos', 'pedido_produtos.pedido_id', '=', 'pedidos.id')
            ->join('produtos', 'pedido_produtos.produto_id', '=', 'produtos.id')
            ->select('pedido_produtos.*', 'pedidos.*', 'produtos.*')
            ->where('pedido_produtos.pedido_id', $id)
            ->get();

            $valorTotal = $pedidoProd->reduce(function ($total, $item) {
                return $total += (($item->valor)*$item->quantidade);
            });

            $resultado = ['detalhes'=>$pedidoProd, 'valor'=>$valorTotal];

            return $resultado;
    }
}