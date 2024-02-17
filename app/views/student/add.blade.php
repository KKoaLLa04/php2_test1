@extends('layout.main')
@section('content')
<a href="list-student">quay lai</a>
<form action="post-student" method="POST">

    @if(!empty($msg))
        <div class="alert alert-{{$msg_type}}">{{$msg}}</div>
    @endif
    <label for="">Ho ten</label>
    <input type="text" placeholder="Ho va ten..." name="name" class="form-control" value="{{!empty($old['name'])?$old['name']:false}}">
    <p style="color: red">{{!empty($errors['name'])?$errors['name']:false}}</p>

    <label for="">Nam sinh</label>
    <input type="text" placeholder="Nam sinh..." name="year_of_birth" value="{{!empty($old['year_of_birth'])?$old['year_of_birth']:false}}" class="form-control">
   <p style="color: red">{{!empty($errors['year_of_birth'])?$errors['year_of_birth']:false}}</p>

    <label for="">SDT</label>
    <input type="text" placeholder="SDT..." name="phone_number" value="{{!empty($old['phone_number'])?$old['phone_number']:false}}" class="form-control">
   <p style="color: red">{{!empty($errors['phone_number'])?$errors['phone_number']:false}}</p>

    <button type="submit" class="btn btn-primary">Dong y</button>
</form>
@endsection
