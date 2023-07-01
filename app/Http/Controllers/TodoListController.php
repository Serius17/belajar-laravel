<?php

namespace App\Http\Controllers;

use App\Services\TodoListService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    private $todoListService;

    public function __construct(TodoListService $todoListService)
    {
        $this->todoListService = $todoListService;
    }

    public function todoList(Request $request)
    {
        $todolist = $this->todoListService->getTodoList();
        return response()->view("todolist.todolist", [
            'title' => "Todo List",
            'todolist' => $todolist
        ]);
    }

    public function addTodo(Request $request)
    {
        $todo = $request->input("todo");
        if (empty($todo)) {
            $todolist = $this->todoListService->getTodoList();
            return response()->view("todolist.addtodo", [
                "title" => "Add Todo",
                "todolist" => $todolist,
                "error" => "Todo tidak boleh kosong"
            ]);
        }
        $this->todoListService->saveTodo(uniqid(), $todo);
        return redirect('/todolist');
    }

    public function removeTodo(Request $request, string $todoId): RedirectResponse
    {
        $this->todoListService->removeTodo($todoId);
        return redirect('/todolist');
    }
}
