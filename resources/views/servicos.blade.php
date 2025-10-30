<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Serviços</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="bg-light p-4">
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Serviços</h2>
        <div class="row">
            <div class="col">
                <form action="{{ route('servicos.buscar') }}" method="post">
                    @csrf
                    <div class="row g-2">
                        <div class="col-md-3">
                            <select name="tipo" class="form-select">
                                <option value="nome">Nome</option>
                                <option value="categoria">Categoria</option>
                                <option value="preco">Preço</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="valor" class="form-control" placeholder="Pesquisar...">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <a href="{{ route('servicos.create') }}" class="btn btn-success"><i class="fa-solid fa-square-plus"></i> Cadastrar</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($servicos as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->nome }}</td>
                        <td>{{ number_format($s->preco, 2, ',', '.') }}</td>
                        <td>{{ $s->categoria }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($s->descricao, 60) }}</td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('servicos.edit', $s->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form action="{{ route('servicos.destroy', $s->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir?')"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>


