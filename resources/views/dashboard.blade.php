<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
	<div class="container py-4">
		<div class="d-flex justify-content-between align-items-center mb-4">
			<h1>Dashboard</h1>
		</div>

		<div class="row g-4">
			<div class="col-12 col-lg-7">
				<div class="card h-100">
					<div class="card-body">
						<h5 class="card-title">Eventos por mês</h5>
						{!! $chartEventos->container() !!}
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-5">
				<div class="card h-100">
					<div class="card-body">
						<h5 class="card-title">Clientes por gênero</h5>
						{!! $chartClientes->container() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	{{ $chartEventos->script() }}
	{{ $chartClientes->script() }}
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


