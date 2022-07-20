<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    use HasFactory;
    protected $table = 'pedido_produtos';
    protected $fillable = ['quantidade', 'produto_id', 'pedido_id'];
}
