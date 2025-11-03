<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Serviços</title>
    <style>
        /* Bootstrap-like minimal */
        * { box-sizing: border-box; }
        body { font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #212529; }
        h1, h2, h3 { margin: 0 0 .5rem 0; font-weight: 600; }
        .container { width: 100%; padding: 0 12px; margin: 0 auto; }
        .mb-3 { margin-bottom: 1rem; }
        .mb-4 { margin-bottom: 1.5rem; }
        .text-center { text-align: center; }
        .bg-success { background-color: #28a745; color: #fff; }
        .bg-light { background-color: #f8f9fa; }
        .border { border: 1px solid #dee2e6; }
        .rounded { border-radius: .25rem; }
        .p-3 { padding: 1rem; }
        .px-3 { padding-left: 1rem; padding-right: 1rem; }
        .py-2 { padding-top: .5rem; padding-bottom: .5rem; }
        .fw-bold { font-weight: 700; }
        .text-muted { color: #6c757d; }
        .badge { display: inline-block; padding: .35em .65em; font-size: 75%; font-weight: 700; color: #fff; background-color: #28a745; border-radius: .25rem; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { padding: .5rem .75rem; border: 1px solid #dee2e6; }
        .table thead th { background-color: #28a745; color: #fff; border-color: #218838; }
        .table-striped tbody tr:nth-child(odd) { background-color: #f8f9fa; }
        .footer { margin-top: 1.5rem; padding-top: .5rem; border-top: 2px solid #dee2e6; text-align: center; font-size: 10px; color: #6c757d; }
    </style>
</head>
<body>
    <div class="bg-success p-3 text-center mb-4">
        <h1>Relatório de Serviços</h1>
        <div class="text-muted">Gerado em {{ date('d/m/Y H:i:s') }}</div>
    </div>

    <div class="container">
        <div class="bg-light px-3 py-2 rounded border mb-3">
            <span class="fw-bold">Total de Serviços:</span>
            <span class="badge">{{ $servicos->count() }}</span>
        </div>

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
                        <td>{{ $servico->categoria ?? '-' }}</td>
                        <td>{{ $servico->fornecedor->nome ?? '-' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($servico->descricao, 50) ?: '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhum serviço cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="bg-light px-3 py-2 rounded border text-center fw-bold">
            <div>Total de Serviços: {{ $servicos->count() }}</div>
            <div>Valor Total: R$ {{ number_format($servicos->sum('preco'), 2, ',', '.') }}</div>
        </div>
    </div>

    <div class="footer">
        <p>Sistema de Gestão de Eventos - Relatório gerado automaticamente</p>
    </div>
</body>
</html>

