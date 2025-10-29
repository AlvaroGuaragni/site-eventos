<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Local</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 12px;">
        <h3 class="text-center mb-4">Cadastro de Local</h3>
        
        <form action="{{ route('local.salvar') }}" method="post">
            @csrf


            <div class="mb-3">
                <label for="local" class="form-label">Local:</label>
                 <input type="text" required id="local" name="local" class="form-control" placeholder="Digite O Nome Do Local">
            </select>
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Capacidade</label>
                <input type="text " required id="capacidade" name="capacidade" class="form-control" placeholder="Digite a capacidade do local">
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">Endereço</label>
                <input type="endereco" required id="endereco" name="endereco" class="form-control" placeholder="Digite O Endereço">
            </div>

            <button type="submit" class="btn btn-primary w-100">Salvar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
