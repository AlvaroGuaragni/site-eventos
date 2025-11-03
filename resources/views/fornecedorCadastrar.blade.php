<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Fornecedor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
<div class="card p-4 shadow" style="width: 460px;">
    <h3 class="mb-3">Cadastrar Fornecedor</h3>
    <form method="POST" action="{{ route('fornecedores.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input class="form-control" name="nome" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input class="form-control" name="telefone">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input class="form-control" name="email" type="email">
        </div>
        <div class="mb-3">
            <label class="form-label">CNPJ</label>
            <input class="form-control" name="cnpj">
        </div>
        <div class="mb-3">
            <label class="form-label">Logo (jpg, png, webp)</label>
            <input class="form-control" type="file" name="logo" accept=".jpg,.jpeg,.png,.webp">
        </div>
        <button class="btn btn-primary w-100">Salvar</button>
    </form>
    <a href="{{ route('fornecedores.index') }}" class="btn btn-link mt-2">Voltar</a>
</div>
</body>
</html>


