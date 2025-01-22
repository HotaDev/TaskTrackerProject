<?php

namespace App\Http\Controllers;

use App\Enums\Priority;
use App\Enums\Status;
use App\Models\Task;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 * Класс для обработки пользовательских API запросов 
 */
class TaskController extends Controller
{
    /**
     * Метод для создания новой задачи
     *
     * @param Request $req - данные для создания задачи
     * 
     * @return Response - ответ на запрос в Json формате
     */
    public function taskCreate(Request $req)
    {
        $rule = [ // Правила для ввода данных
            'title'       => 'required|max:255',
            'due_date'    => 'required|date',
            'create_date' => 'required|date',
            'priority'    => Rule::enum(Priority::class),
            'category'    => 'required',
            'status'      => Rule::enum(Status::class),
        ];
        $validator = Validator::make($req->all(), $rule);
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 415);
        }

        $nb = Task::create($req->all());

        return response()->json(
            [
                'id' => $nb['id'],
                'message' => 'Task created successfully'
            ],
            201
        );
    }

    /**
     * Метод для получния задач с возможность указать данные для поиска и сортировки
     * 
     * @return Response|void - сообщение об ошибке в Json формате
     */
    public function taskGet()
    {
        $listTask = new Task();
        if (isset($_GET['search'])) {
            $listTask = $listTask->where('title', '=', $_GET['search']);
        }
        if (isset($_GET['sort'])) {
            $listTask = $listTask->orderByDesc($_GET['sort']);
        }
        try {
            $listTask = $listTask->paginate(3)->appends(request()->query());
        } catch (QueryException $e) {
            return response()->json(['error' => $e->getMessage()], 415);
        }

        foreach ($listTask->all() as $li) {
            echo json_encode($li, JSON_UNESCAPED_UNICODE);
        }
        echo $listTask->links();
    }

    /**
     * Метод для получения задачи по id
     *
     * @param string $id - Id требуемой задачи
     * 
     * @return Response - ответ на запрос в Json формате
     */
    public function taskGetOne($id)
    {
        $nb = Task::find($id);
        if (is_null($nb)) {
            return  response()->json(['error' => 'Task not found'], 404);
        }
        return response()->json($nb, 200);
    }

    /**
     * Метод для редактирования задачи
     *
     * @param Request $req - данные нужные для редактирования
     * @param string  $id  - Id требуемой задачи
     * 
     * @return Response - ответ на запрос в Json формате
     */
    public function taskEdit(Request $req, $id)
    {
        $task = Task::find($id);

        if (is_null($task)) {
            return  response()->json(['error' => 'Task not found'], 404);
        }

        $rule = [
            'title'       => 'string|max:255',
            'due_date'    => 'date',
            'create_date' => 'date',
            'priority'    => Rule::enum(Priority::class),
            'category'    => 'string',
            'status'      => Rule::enum(Status::class),
        ];
        $validator = Validator::make($req->all(), $rule);
        if ($validator->fails()) {
            return  response()->json($validator->errors(), 415);
        }

        $task->update($req->all());

        return response()->json(['message' => 'Task updated successfully'], 200);
    }

    /**
     * Метод для удаления задачи
     *
     * @param string $id - Id требуемой задачи
     * 
     * @return Response - ответ на запрос в Json формате
     */
    public function taskDelete($id)
    {
        $task = Task::find($id);

        if (is_null($task)) {
            return  response()->json(['error' => 'Task not found'], 404);
        }
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully'], 200);
    }
}
