<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Http\Resources\TodoResource;
use App\Http\Resources\TopicResource;
use App\Models\Todo;
use App\Models\Topic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $todoQuery = Todo::search($request);

        $todos = TodoResource::collection($todoQuery->with('topic')->latest()->paginate(10));
        $topics = TopicResource::collection(Topic::all());

        return Inertia::render('Todos/Index', [
            'todos' => $todos,
            'topics' => $topics,
            'topic_id' => $request->topic_id ?? '',
            'search' => $request->search ?? '',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = TopicResource::collection(Topic::all());
        return Inertia::render('Todos/Create', [
            'topics' => $topics,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        Todo::create($request->validated());
        return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        $topics = TopicResource::collection(Topic::all());
        return Inertia::render('Todos/Edit', [
            'todo' => $todo,
            'topics' => $topics,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());
        return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully.');
    }
}
