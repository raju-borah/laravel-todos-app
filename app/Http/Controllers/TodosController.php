<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(){
        return view('todos.index')->with('todos',Todo::all());
    }
    public function show($id){
        return view('todos.show')->with('todo',Todo::findOrFail($id));
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
    public function edit($id){
            $todo=Todo::findOrFail($id);
        return view('todos.edit',compact('todo'));
    }
    public function update($id){
        $this->validate(request(),[
            'name'=>'required',
            'description'=>'required'
        ]);
        $data=request()->all();
        $todo=Todo::findOrFail($id);

        $todo->name=$data['name'];
        $todo->description=$data['description'];
        $todo->save();

        return redirect('/todos');
    }
    public function destroy($id){
        Todo::findOrFail($id)->delete();
        return redirect('/todos');
    }
}
