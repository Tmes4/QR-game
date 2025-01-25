<h1>Vragenlijst</h1>
<a href="{{ route('questions.create') }}">Nieuwe vraag toevoegen</a>
<table>
    <thead>
        <tr>
            <th>Inhoud</th>
            <th>Type</th>
            <th>Punten</th>
            <th>Spel</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vragen as $vraag)
        <tr>
            <td>{{ $vraag->inhoud }}</td>
            <td>{{ $vraag->type }}</td>
            <td>{{ $vraag->punten }}</td>
            <td>{{ $vraag->spel->naam ?? 'Onbekend' }}</td>
            <td>
                <a href="{{ route('questions.edit', $vraag->id) }}">Bewerken</a>
                <form action="{{ route('questions.destroy', $vraag->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Verwijderen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>