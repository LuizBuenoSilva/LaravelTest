<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Entries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h1>Lista de Entradas</h1>

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('entries.trash') }}" class="btn btn-warning">Ver Lixeira</a>

        <form action="{{ route('export.excel') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Exportar Excel</button>
        </form>
    </div>

    <form action="{{ route('entries.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" name="full_name" class="form-control" placeholder="Nome completo" required>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
    </form>

    @if($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Última Atualização</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entries as $entry)
            <tr>
                <td>{{ $entry->id }}</td>
                <td>{{ $entry->full_name }}</td>
                <td>{{ $entry->updated_at }}</td>
                <td>
                    <form action="{{ route('entries.destroy', $entry) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                    <a href="{{ route('entries.edit', $entry) }}" class="btn btn-secondary btn-sm">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
