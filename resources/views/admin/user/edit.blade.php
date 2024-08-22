@extends('master.admin')
@section('title', 'Edit a User')
@section('main')


<div class="row">
    <form action="{{ route('user.update',  $user->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="col-md-9">
            <div class="form-group">
                <label for="">User name</label>
                <input type="text" name="name" class="form-control" placeholder=" Name" value="{{$user -> name}}">
            </div>

            <div class="form-group">
                <label for="">User Email</label>
                <input type="text" name="email" class="form-control" placeholder=" Email" value="{{$user -> email}}">
            </div>
            <div class="form-group">
                <label for="">User PassWord</label>
                <input type="text" name="password" class="form-control" placeholder=" PassWord">
            </div>
            <div class="form-group">
                <label for="">Comfirm PassWord</label>
                <input type="text" name="re_password" class="form-control" placeholder=" Comfirm PassWord">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
    </form>
</div>
@stop()
