
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto - StockFlow</title>
</head>
<body>
    <main>
        <h1>Editar produto</h1>

        <p>ID do produto: {{ $product->id }}</p>

        <form action="/products/{{ $product->id }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Nome</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $product->name) }}"
                    required
                >
            </div>

            <div>
                <label for="sku">SKU</label>
                <input
                    type="text"
                    id="sku"
                    name="sku"
                    value="{{ old('sku', $product->sku) }}"
                    required
                >
            </div>

            <div>
                <label for="price">Preço</label>
                <input
                    type="number"
                    id="price"
                    name="price"
                    value="{{ old('price', $product->price) }}"
                    step="0.01"
                    min="0"
                    required
                >
            </div>

            <div>
                <label for="quantity">Quantidade</label>
                <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    value="{{ old('quantity', $product->quantity) }}"
                    min="0"
                    required
                >
            </div>

            <button type="submit">Salvar alterações</button>
            <a href="/products">Cancelar</a>
        </form>
    </main>
</body>
</html>
