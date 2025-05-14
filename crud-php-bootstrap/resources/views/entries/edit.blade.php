<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Entrada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Editar Entrada</h1>

    {{-- Exibir mensagens de erro --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('entries.update', $entry) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="full_name" class="form-label">Nome Completo</label>
            <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $entry->full_name) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('entries.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
