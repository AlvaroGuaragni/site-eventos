<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Serviços</title>
</head>
<body>
    <div class="bg-success p-3 text-center mb-4">
        <h1>Relatório de Serviços</h1>
    </div>

    <div class="container">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Fornecedor</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @forelse($servicos as $servico)
                    <tr>
                        <td>{{ $servico->id }}</td>
                        <td>{{ $servico->nome }}</td>
                        <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                        <td>{{ $servico->categoria}}</td>
                        <td>{{ $servico->fornecedor->nome }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($servico->descricao, 50) ?: '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhum serviço cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</body>
</html>

