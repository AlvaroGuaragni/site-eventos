<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Fornecedores</title>
 
</head>
<body>
    <div class="bg-dark p-3 text-center mb-4">
        <h1>Relatório de Fornecedores</h1>
    </div>

    <div class="container">


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>CNPJ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($fornecedores as $fornecedor)
                    <tr>
                        <td>{{ $fornecedor->id }}</td>
                        <td>{{ $fornecedor->nome }}</td>
                        <td>{{ $fornecedor->telefone}}</td>
                        <td>{{ $fornecedor->email}}</td>
                        <td>{{ $fornecedor->cnpj}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nenhum fornecedor cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="bg-light px-3 py-2 rounded border text-center fw-bold">Total: {{ $fornecedores->count() }} fornecedor(es)</div>
    </div>

</body>
</html>

