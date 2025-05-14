<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registros Deletados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Registros Deletados</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome completo</th>
                <th>Deletado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($entries as $entry)
                <tr>
                    <td>{{ $entry->full_name }}</td>
                    <td>{{ $entry->deleted_at }}</td>
                    <td>
                        <form action="{{ route('entries.restore', $entry->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-success" type="submit">Restaurar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Nenhum registro deletado.</td></tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('entries.index') }}" class="btn btn-secondary">Voltar</a>
</body>
</html>
