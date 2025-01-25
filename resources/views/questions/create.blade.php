<h1>Nieuwe Vraag Toevoegen</h1>
<form action="{{ route('questions.store') }}" method="POST">
    @csrf
    <label for="spel_id">Spel:</label>
    <select name="spel_id" id="spel_id" required>
        @foreach ($spellen as $spel)
            <option value="{{ $spel->id }}">{{ $spel->naam }}</option>
        @endforeach
    </select>

    <label for="inhoud">Vraag:</label>
    <textarea name="inhoud" id="inhoud" required></textarea>

    <label for="type">Type:</label>
    <select name="type" id="type" required>
        <option value="open">Open</option>
        <option value="meerkeuze">Meerkeuze</option>
    </select>

    <label for="punten">Punten:</label>
    <input type="number" name="punten" id="punten" min="0" required>

    <label for="qr_code_url">QR Code URL (optioneel):</label>
    <input type="url" name="qr_code_url" id="qr_code_url">

    <button type="submit">Toevoegen</button>
</form>
