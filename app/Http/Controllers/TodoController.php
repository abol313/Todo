<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('todo.index',['todos'=>Todo::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todo.create',['categories' => Category::all(['id','name'])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoRequest $request)
    {
        //
        Todo::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
        return view('todo.show',['todo'=>$todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
        // return view('todo.edit',['todo'=>Todo::findOrFail($id)]);
        return view('todo.edit',['todo'=>$todo,'categories' => Category::all(['id','name'])]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoRequest $request,Todo $todo)
    {
        //
        $todo->title = $request->get('title');
        if($request->exists('description'))$todo->description = $request->get('description');
        if($request->exists('category'))$todo->category = $request->get('category');
        $todo->done_at = match($request->get('done')){"0"=>null,"1"=>date('Y-m-d H:i:s')};
        $todo->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
        $todo->delete();

        return redirect()->route('todos.index');
    }
}
