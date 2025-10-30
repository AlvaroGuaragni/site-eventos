<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="text-center">
        <h1 class="mb-5">Seja Bem Vindo ADM!
            <BR>Gerencie seu evento conosco...</BR>
        </h1>

        <div class="d-grid gap-3 col-6 mx-auto">
            <a href="{{ url('/cliente/listar') }}" class="btn btn-primary btn-lg">Clientes</a>
            <a href="{{ url('/evento/listar') }}" class="btn btn-primary btn-lg">Eventos</a>
            <a href="{{ url('/local/listar') }}" class="btn btn-primary btn-lg text-white">Locais</a>
            <a href="{{ url('fornecedores') }}" class="btn btn-primary btn-lg text-white">Fornecedores</a>
            <a href="{{ url('servicos') }}" class="btn btn-primary btn-lg text-white">Serviços</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
