@extends('layouts.app')
@section('title')
    New Todos
@stop
@section('content')
    <h1 class="text-center">Create Todos</h1>
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Create New Todo
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                            @foreach($errors->all() as $error)
                            <li class="list-group-item">{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/store-todos" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Enter Todo">
                        </div>
                        <div class="form-group">
                            <textarea name="description" class="form-control" cols="10" rows="3" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-dark">Create Todo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
