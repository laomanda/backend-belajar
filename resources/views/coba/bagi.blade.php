<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bagi</h1>
    <a href="{{ url('hai')}}">Back</a>
    <form action="{{ route('bagi.store') }}" method="POST">
        @csrf
        <label for="">Angka  1</label>
        <input type="number" name="angka1"><br>
        <label for="">Angka  2</label>
        <input type="number" name="angka2">
        <button type="submit">Count</button>
    </form>

    <span>Hasilnya: {{($total)}}</span>
</body>
</html>