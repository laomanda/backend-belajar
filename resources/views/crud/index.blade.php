<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>CRUD SEDERHANA</h1><br>
    <a href="{{ url('create') }}">Create</a>
    <table border="1" cellpadding="5" cellsspacing="0">
        <tr>
            <th>No</th>
            <th>Text Field</th>
            <th>Radio Field</th>
            <th>Checkbox Field</th>
            <th>Select Field</th>
            <th>Date Field</th>
            <th>File Field</th>
            <th>TextArea</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->text }}</td>
                <td>{{ $row->radio_group }}</td>
                <td>
                    @if (is_array($row->checkbox))
                        {{ implode(', ', $row->checkbox) }}
                    @else
                        {{ $row->checkbox }}
                    @endif
                </td>
                <td>{{ $row->select_field }}</td>
                <td>{{ $row->date }}</td>
                <td><img src="{{ asset('storage/' . $row->file) }}" alt=""></td>
                <td>{{ $row->textarea }}</td>
                <td><a href="{{ url('crud/edit/' . $row->id) }}">Edit</a>
                    <form action="{{ url('crud/delete/' . $row->id) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confrim('delete?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <a href="{{ url('hai') }}">KALKULATOR</a>
</body>

</html>
