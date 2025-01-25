<form action="{{ route('upload.questions') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="file">Upload Questions (CSV/JSON):</label>
    <input type="file" name="file" id="file" required>
    <button type="submit">Upload</button>
</form>
@if ($errors->any())
<div>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('success'))
<div>{{ session('success') }}</div>
@endif