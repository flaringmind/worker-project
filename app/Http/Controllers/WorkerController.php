<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $workerQuery = Worker::query();

        $fieldsWithLike = ['first_name', 'last_name', 'email', 'description'];

        foreach ($fieldsWithLike as $field) {
            if (isset($data[$field])) {
                $workerQuery->where($field, 'like', "%{$data[$field]}%");
            }
        }

        if(isset($data['from'])) {
            $workerQuery->where('age', '>', $data['from']);
        }

        if(isset($data['to'])) {
            $workerQuery->where('age', '<', $data['to']);
        }

        if(isset($data['is_married'])) {
            $workerQuery->where('is_married', true);
        }


        $workers = $workerQuery->paginate(4);

        return view('worker.index', compact('workers'));
    }

    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));

    }

    public function create()
    {
        return view('worker.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::create($data);

        return redirect()->route('worker.index');
    }

    public function edit(Worker $worker)
    {
        return view('worker.edit', compact('worker'));
    }

    public function update(Worker $worker, UpdateRequest $request) {
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);

        $worker->update($data);

        return redirect()->route('worker.show', $worker->id);
    }

    public function delete(Worker $worker) {
        $worker->delete();
        return redirect()->route('worker.index');
    }
}
