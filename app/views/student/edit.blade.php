@extends('layout.main')
@section('content')
<a href="{{BASE_URL}}list-student">quay lai</a>
<form action="{{BASE_URL}}edit-post/{{$studentDetail->id}}" method="POST">

    @if(!empty($msg))
        <div class="alert alert-{{$msg_type}}">{{$msg}}</div>
    @endif
    <label for="">Ho ten</label>
    <input type="text" placeholder="Ho va ten..." name="name" class="form-control" value="{{$studentDetail->name}}">
    <p style="color: red">{{!empty($errors['name'])?$errors['name']:false}}</p>

    <label for="">Nam sinh</label>
    <input type="text" placeholder="Nam sinh..." name="year_of_birth" value="{{$studentDetail->year_of_birth}}" class="form-control">
   <p style="color: red">{{!empty($errors['year_of_birth'])?$errors['year_of_birth']:false}}</p>

    <label for="">SDT</label>
    <input type="text" placeholder="SDT..." name="phone_number" value="{{$studentDetail->phone_number}}" class="form-control">
   <p style="color: red">{{!empty($errors['phone_number'])?$errors['phone_number']:false}}</p>

    <button type="submit" class="btn btn-primary">Dong y</button>
</form>
@endsection
