<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Atualização</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($entrys as $entry)
            <tr>
                <td>{{ $entry->full_name }}</td>
                <td>{{ $entry->updated_at->format('d/m/Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
