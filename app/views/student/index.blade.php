@extends('layout.main')
@section('content')
<a href="add-student">Them moi sinh vien</a>
<table border="1">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Year of Birth</th>
        <th>Phone Number</th>
        <th>Action</th>

    </thead>
    <tbody>
         @foreach($students as $st)
            <tr>
                <td>{{ $st->id }}</td>
                <td>{{ $st->name }}</td>
                <td>{{ $st->year_of_birth }}</td>
                <td>{{ $st->phone_number }}</td>
                <th>
                    <a href="edit-student/{{$st->id}}">Sửa</a>
                    <a href="delete-student/{{$st->id}}" onclick="return confirm('Ban co chac chan muon xoa?')">Xóa</a>
                </th>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
