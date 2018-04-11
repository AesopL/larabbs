@extends('layouts.app') 
@section('title','编辑资料')
@section('content')
<div class="container">
    <div class="pane panel-default col-md-10 col-md-offset-1">
        <div class="panel-heading">
            <h4>
                <i class="glyphicon glyphicon-edit">编辑个人资料</i>
            </h4>
        </div>
        @include('common.error')
        <div class="panel-body">
            <form action="{{ route('users.update',$user->id) }}" method="post">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="name-field">用户名</label>
                    <input type="text" class="form-control" name="name" id="name-field" value="{{ old('name',$user->name) }}">
                </div>
                <div class="form-group">
                    <label for="">邮箱</label>
                    <input type="text" class="form-control" id="email-field" name="email" value="{{ old( 'email',$user->email) }}">
                </div>
                <div class="form-group">
                    <label for="introduction">简介</label>
                    <input type="text" class="form-control" id="introduction" name="introduction" value="{{ old('introduction',$user->introduction) }}">
                </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection