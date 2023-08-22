<!DOCTYPE html>
<html>
<head>
    <title>Exemplo de Consumo de API</title>
</head>
<body>
    <h1>Products from API</h1>
    <ul>
        @foreach ($products as $product)
            <li>
                <h2>{{ $product['title'] }}</h2>
                <p>Preço: {{ $product['price'] }}</p>
                <p>Categoria: {{ $product['category'] }}</p>
                <p>Descrição: {{ $product['description'] }}</p>
                <img src="{{ $product['image'] }}" alt="Imagem do Produto">
            </li>
        @endforeach
    </ul>
</body>
</html>
