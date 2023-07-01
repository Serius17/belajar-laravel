<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class TodoListService
{
    public function saveTodo(string $id, string $todo): void
    {
        if (Session::exists('todolist')) {
            Session::put('todolist', []);
        }
        Session::push('todolist', [
            'id' => $id,
            'todo' => $todo
        ]);
    }

    public function getTodoList(): array
    {
        return Session::get('todolist', []);
    }

    public function removeTodo(string $todoId)
    {
        $todoList = Session::get('todolist', []);

        foreach ($todoList as $index => $value) {
            if ($value['id'] == $todoId) {
                unset($todoList[$index]);
                break;
            }
        }
        Session::put('todolist', $todoList);
    }
}
