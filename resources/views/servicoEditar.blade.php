<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Serviço</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
<div class="card p-4 shadow" style="width: 520px;">
    <h3 class="mb-3">Editar Serviço</h3>
    <form method="POST" action="{{ route('servicos.update', $servico->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input class="form-control" name="nome" value="{{ $servico->nome }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Preço</label>
            <input class="form-control" name="preco" type="number" step="0.01" min="0" value="{{ $servico->preco }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <input class="form-control" name="categoria" value="{{ $servico->categoria }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Fornecedor</label>
            <select class="form-select" name="fornecedor_id">
                <option value="">-- selecione --</option>
                @foreach(($fornecedores ?? []) as $f)
                    <option value="{{ $f->id }}" {{ $servico->fornecedor_id == $f->id ? 'selected' : '' }}>{{ $f->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" rows="3">{{ $servico->descricao }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Imagem atual</label>
            @if($servico->imagem_path)
                <img src="{{ asset('storage/' . $servico->imagem_path) }}" alt="Imagem" style="height:60px; width:auto;">
            @else
                <span>-</span>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Trocar imagem</label>
            <input class="form-control" type="file" name="imagem" accept=".jpg,.jpeg,.png,.webp">
        </div>
        <button class="btn btn-primary w-100">Salvar</button>
    </form>
    <a href="{{ route('servicos.index') }}" class="btn btn-link mt-2">Voltar</a>
</div>
</body>
</html>


