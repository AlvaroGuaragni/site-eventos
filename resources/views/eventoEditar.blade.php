<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Evento</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 12px;">
        <h3 class="text-center mb-4">Cadastro de Evento</h3>
        
        <form action="{{ isset($evento) ? route('evento.salvar', $evento->id) : route('evento.salvar') }}" method="post">
            @csrf
            
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo:</label>
                <select id="tipo" name="tipo" class="form-control" required>
                    <option value="" disabled {{ empty($evento->tipo ?? '') ? 'selected' : '' }}>Selecione o tipo do evento</option>
                    <option value="Casamento" {{ (isset($evento) && $evento->tipo == 'Casamento') ? 'selected' : '' }}>Casamento</option>
                    <option value="Formatura" {{ (isset($evento) && $evento->tipo == 'Formatura') ? 'selected' : '' }}>Formatura</option>
                    <option value="Festa de Aniversário" {{ (isset($evento) && $evento->tipo == 'Festa de Aniversário') ? 'selected' : '' }}>Festa de Aniversário</option>
                    <option value="Workshop" {{ (isset($evento) && $evento->tipo == 'Workshop') ? 'selected' : '' }}>Workshop</option>
                    <option value="Outro" {{ (isset($evento) && $evento->tipo == 'Outro') ? 'selected' : '' }}>Outro</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="qtdPessoas" class="form-label">Quantidade de pessoas</label>
                <input type="text" id="qtdPessoas" name="qtdPessoas" class="form-control" 
                       value="{{ $evento->qtdPessoas ?? '' }}" placeholder="Digite a quantidade de pessoas">
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" id="data" name="data" class="form-control" 
                       value="{{ $evento->data ?? '' }}" placeholder="Digite a data">
            </div>

            <button type="submit" class="btn btn-primary w-100">Salvar</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>