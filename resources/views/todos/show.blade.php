@extends('layouts.app')
@section('title')
    {{$todo->name}}
@stop
@section('content')
    <h1 class="text-center">{{$todo->name}}</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default my-5">
                <div class="card-header">
                    Details
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">{{$todo->description}}</li>
                    </ul>
                </div>
            </div>
              <a href="/todos/{{$todo->id}}/edit" class="btn btn-primary">Edit</a>
    </div>
    </div>
@stop
