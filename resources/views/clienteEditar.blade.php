<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 12px;">
        <h3 class="text-center mb-4">Cadastro de Cliente</h3>
        
        <form action="{{ route('clientes.update', $cliente->id) }}" method="post">

    @csrf
    @method('PUT')
            
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" value="{{$cliente->nome}}" id="nome" name="nome" class="form-control" placeholder="Digite o nome">
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" id="telefone" name="telefone" value="{{$cliente->telefone}}" class="form-control" placeholder="Digite o telefone">
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" id="cpf" name="cpf" value="{{$cliente->cpf}}" class="form-control" placeholder="Digite o CPF">
            </div>

             <div class="mb-3">
                <label for="genero" class="form-label">Gênero</label>
                <input type="text" id="genero" name="genero" value="{{$cliente->genero}}" class="form-control" placeholder="Digite o genero">
            </div>

              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" value="{{$cliente->email}}" class="form-control" placeholder="Digite o email">
            </div>

            <button type="submit" class="btn btn-primary w-100">Salvar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

