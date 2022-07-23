<!DOCTYPE html>
<html>
<head>
    <title>PEDIDO</title>
</head>
<body>
    <h1>LISTA DE PEDIDOS</h1>
    @foreach($pedidoProd as $item)
        <h1>{{ $item->nome}}</h1>
        <p>Data: {{ $item->created_at }}</p>
        <p>Quantidade: {{ $item->quantidade }}</p>
        <p>Preço: {{ $item->valor }}</p>
    @endforeach
</body>
</html>