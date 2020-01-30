<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){
        return view('todos.index')->with('todos',Todo::all());
    }
    public function show(Todo $todo){
        return view('todos.show')->with('todo',$todo);
    }
    public function create(){
        return view('todos.create');
    }
    public function store(){
        $this->validate(request(),[
            'name'=>'required',
            'description'=>'required'
            ]);
        $data=request()->all();
        $todo= new Todo();
        $todo->name=$data['name'];
        $todo->description=$data['description'];
        $todo->completed=false;
        $todo->save();
        return redirect('/todos');
    }
    public function edit(Todo $todo){
//            $todo=Todo::findOrFail($id);
        return view('todos.edit',compact('todo'));
    }
    public function update(Todo $todo){//route model binding
        $this->validate(request(),[
            'name'=>'required',
            'description'=>'required'
        ]);
        $data=request()->all();

        $todo->name=$data['name'];
        $todo->description=$data['description'];
        $todo->save();

        return redirect('/todos');
    }
    public function destroy(Todo $todo){
        $todo->delete();
        return redirect('/todos');
    }
}
