<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <main>
    <h1>Produtos do StockFlow</h1>
    <section>
      <h2>Cadastrar produto</h2>

      <form action="/products" method="POST">
          @csrf

          <div>
              <label for="name">Nome</label>
              <input type="text" id="name" name="name" required>
          </div>

          <div>
              <label for="sku">SKU</label>
              <input type="text" id="sku" name="sku" required>
          </div>

          <div>
              <label for="price">Preço</label>
              <input type="number" id="price" name="price"
                    step="0.01" min="0" required>
          </div>

          <div>
              <label for="quantity">Quantidade</label>
              <input type="number" id="quantity" name="quantity"
                    min="0" value="0" required>
          </div>

          <button type="submit">Cadastrar produto</button>
      </form>
    </section>
    @if ($errors->any())
      <div>
          <strong>Não foi possível cadastrar o produto:</strong>

          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <table>
      <thead>
            <tr>
                <th>Nome</th>
                <th>SKU</th>
                <th>Preço</th>
                <th>Quantidade</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{ $product->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  </main>
</body>
</html>