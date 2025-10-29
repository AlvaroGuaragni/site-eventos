<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Eventos</title>
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

    <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Listagem de Eventos</h2>

        <!-- Botão buscar -->
             <div class="row">
        <div class="col">
            <form action="{{ route('evento.buscar') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" class="form-select">
                            <option value="tipo">Tipo</option>
                            <option value="qtdPessoas">Quantidade de pessoas</option>
                            <option value="data">Data</option>
                            
                            

                        </select>

                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Valor</label>
                        <input type="text" class="form-control" name="valor" placeholder="Pesquisar...">
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-magnifying-glass"></i> Buscar
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>


            <!-- Botão cadastrar -->
            <a href="{{ url('/evento/cadastrar') }}" class="btn btn-success">
                <i class="fa-solid fa-square-plus"></i> Cadastrar Evento
            </a>
        </div>
    </div>
</div>


        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle">
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Quantidade de pessoas</th>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Local</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($eventos as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->tipo }}</td>
                                <td>{{ $item->qtdPessoas }}</td>
                                <td>{{ $item->data }}</td>
                                <td>{{ $item->cliente->nome ?? '-' }}</td>
                                <td> {{ $item->local->local ?? '-' }}</td>

                                <td>
                                    <a href="{{ url('/evento/editar/'.$item->id) }}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                    
                                    <form action="{{ route('evento.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
