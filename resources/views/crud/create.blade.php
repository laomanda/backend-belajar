<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Create</h1>

    <form action="{{ route('crud.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="text">Text</label>
        <input type="text" id="text" name="text" placeholder="Masukkan teks"><br><br>

        <label>Radio</label><br>
        <input type="radio" id="radio1" name="radio_group" value="option1">
        <label for="radio1">Opsi 1</label>
        <input type="radio" id="radio2" name="radio_group" value="option2">
        <label for="radio2">Opsi 2</label><br><br>

        <label>Checkbox</label><br>
        <input type="checkbox" id="cb1" name="checkbox[]" value="cb1">
        <label for="cb1">Pilihan 1</label>
        <input type="checkbox" id="cb2" name="checkbox[]" value="cb2">
        <label for="cb2">Pilihan 2</label><br><br>

        <label for="select">Select</label>
        <select id="select" name="select_field">
            <option value="">-- Pilih --</option>
            <option value="A">Pilihan A</option>
            <option value="B">Pilihan B</option>
        </select><br><br>

        <label for="date">Date</label>
        <input type="date" id="date" name="date"><br><br>

        <label for="file">File</label>
        <input type="file" id="file" name="file"><br><br>

        <label for="textarea">TextArea</label>
        <textarea id="textarea" name="textarea" rows="4" placeholder="Tulis sesuatu..."></textarea><br><br>

        <button type="submit">Kirim</button>
    </form>

    <a href="{{ url('index') }}">Back</a>
</body>

</html>
