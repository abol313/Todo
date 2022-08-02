<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterIndexTodoRequest;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Category;
use App\Models\Todo;
use App\Models\UserTodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TodoController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Todo::class,'todo');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if($filterCategories = session('todo.filter.categories')){
            $filterCategoriesNoNulls = array_filter($filterCategories,fn($v)=>$v!==null);
            $todoQuery = Todo::query();
            if(!empty($filterCategoriesNoNulls))$todoQuery = $todoQuery->whereIn('category',$filterCategoriesNoNulls);
            if(in_array(null, $filterCategories, true))$todoQuery = $todoQuery->orWhereNull('category');

            return view('todo.index',['todos'=>$todoQuery->get(),'categories'=>Category::all()]);
        }

        return view('todo.index',['todos'=>Todo::all(),'categories'=>Category::all()]);
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
        $todo = Todo::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
        ]);
        
        UserTodo::create(
            [
            'user' => Auth::id(),
            'todo' => $todo->id,
            ]
        );


        return back()->with('message',
            [
                'mode'=>'ok',
                'content'=>'The todo created successfully ;)',
            ]
        );
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

        return back()->with('message',
            [
                'mode'=>'ok',
                'content'=>'The todo edited successfully ;)',
            ]
        );
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
        // if(Auth::check() || $todo->hasUser(Auth::id()))
        //     Gate::authorize('destroy-todo',$todo);
        
        $todo->delete();

        return redirect()->route('todos.index');
    }


    public function filterIndex(FilterIndexTodoRequest $request){
        $request->session()->put('todo.filter.categories',$request->input('filter.categories'));
        return back();
    }
}
