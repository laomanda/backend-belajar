<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>

<body>
    <h1>Create</h1>

    <form action="{{ route('crud.update', $crud->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="text">Text</label>
        <input type="text" id="text" name="text" value="{{ old('text', $crud->text) }}"><br><br>

        <label>Radio</label><br>
        <input type="radio" id="radio1" name="radio_group" value="option1"
            {{ $crud->radio_group == 'option1' ? 'checked' : '' }}>
        <label for="radio1">Opsi 1</label>

        <input type="radio" id="radio2" name="radio_group" value="option2"
            {{ $crud->radio_group == 'option2' ? 'checked' : '' }}>
        <label for="radio2">Opsi 2</label><br><br>

        <label>Checkbox</label><br>

        <input type="checkbox" id="cb1" name="checkbox[]" value="cb1"
            {{ in_array('cb1', $crud->checkbox) ? 'checked' : '' }}>
        <label for="cb1">Pilihan 1</label>

        <input type="checkbox" id="cb2" name="checkbox[]" value="cb2"
            {{ in_array('cb2', $crud->checkbox) ? 'checked' : '' }}>
        <label for="cb2">Pilihan 2</label>
        <br><br>


        <label for="select">Select</label>
        <select id="select" name="select_field">
            <option value="">-- Pilih --</option>
            <option value="A" {{ $crud->select_field == 'A' ? 'selected' : '' }}>Pilihan A</option>
            <option value="B" {{ $crud->select_field == 'B' ? 'selected' : '' }}>Pilihan B</option>
        </select><br><br>

        <label for="date">Date</label>
        <input type="date" id="date" name="date" value="{{ $crud->date }}"><br><br>

        <label for="file">File</label>
        <input type="file" id="file" name="file"><br>
        @if ($crud->file)
            <img src="{{ asset('storage/' . $crud->file) }}" alt="File lama" width="100"><br>
        @endif
        <br>

        <label for="textarea">TextArea</label>
        <textarea id="textarea" name="textarea" rows="4">{{ $crud->textarea }}</textarea><br><br>

        <button type="submit">Update</button>
    </form>


    <a href="{{ url('index') }}">Back</a>
</body>

</html>
