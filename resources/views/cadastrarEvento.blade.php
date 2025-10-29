<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow-lg p-4" style="width: 420px; border-radius: 12px;">
        <h3 class="text-center mb-4">Cadastro de Evento</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($evento) ? route('evento.salvar', $evento->id) : route('evento.salvar') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select id="tipo" name="tipo" class="form-control" required>
                    <option value="" disabled {{ old('tipo', $evento->tipo ?? '') == '' ? 'selected' : '' }}>Selecione o tipo do evento</option>
                    <option value="Casamento" {{ old('tipo', $evento->tipo ?? '') == 'Casamento' ? 'selected' : '' }}>Casamento</option>
                    <option value="Formatura" {{ old('tipo', $evento->tipo ?? '') == 'Formatura' ? 'selected' : '' }}>Formatura</option>
                    <option value="Festa de Aniversário" {{ old('tipo', $evento->tipo ?? '') == 'Festa de Aniversário' ? 'selected' : '' }}>Festa de Aniversário</option>
                    <option value="Workshop" {{ old('tipo', $evento->tipo ?? '') == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                    <option value="Outro" {{ old('tipo', $evento->tipo ?? '') == 'Outro' ? 'selected' : '' }}>Outro</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="local_id" class="form-label">Local</label>
                <select id="local_id" name="local_id" class="form-control">
                    <option value="">-- selecione --</option>
                    @foreach($locais ?? [] as $local)
                        <option value="{{ $local->id }}" {{ old('local_id', $evento->local_id ?? '') == $local->id ? 'selected' : '' }}>
                            {{ $local->local }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="cliente_id" class="form-label">Cliente</label>
                <select id="cliente_id" name="cliente_id" class="form-control">
                    <option value="">-- selecione --</option>
                    @foreach($clientes ?? [] as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('cliente_id', $evento->cliente_id ?? '') == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" required id="data" name="data" value="{{ old('data', $evento->data ?? '') }}" class="form-control">
            </div>



            <div class="mb-3">
                <label for="qtdPessoas" class="form-label">Quantidade de Pessoas</label>
                <input type="text" required id="qtdPessoas" name="qtdPessoas" value="{{ old('qtdPessoas', $evento->qtdPessoas ?? '') }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Salvar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
