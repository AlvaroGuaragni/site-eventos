<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <main class="text-center">
        <div class="container">
            <h1 class="mb-4">Seja Bem-vindo, Administrador!</h1>
            <p class="text-muted mb-5">Gerencie seu evento conosco de forma simples e rápida.</p>

            <div class="d-grid gap-3 col-10 col-sm-8 col-md-6 mx-auto">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg">
                    <i class="fa-solid fa-chart-line me-2"></i> Dashboard (Gráficos)
                </a>
                <a href="{{ url('/cliente/listar') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fa-solid fa-users me-2"></i> Clientes
                </a>
                <a href="{{ url('/evento/listar') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fa-solid fa-calendar-days me-2"></i> Eventos
                </a>
                <a href="{{ url('/local/listar') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fa-solid fa-map-location-dot me-2"></i> Locais
                </a>
                <a href="{{ url('fornecedores') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fa-solid fa-truck-field me-2"></i> Fornecedores
                </a>
                <a href="{{ url('servicos') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fa-solid fa-briefcase me-2"></i> Serviços
                </a>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
