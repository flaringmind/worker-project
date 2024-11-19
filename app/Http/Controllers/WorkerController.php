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

        return view('workers.index', compact('workers'));
    }

    public function show(Worker $worker)
    {
        return view('workers.show', compact('worker'));

    }

    public function create()
    {
        $this->authorize('create', Worker::class);
        return view('workers.create');
    }

    public function store(StoreRequest $request)
    {
        $this->authorize('create', Worker::class);
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::create($data);

        return redirect()->route('workers.index');
    }

    public function edit(Worker $worker)
    {
        $this->authorize('update', $worker);
        return view('workers.edit', compact('worker'));
    }

    public function update(Worker $worker, UpdateRequest $request) {
        $this->authorize('update', $worker);
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);

        $worker->update($data);

        return redirect()->route('workers.show', $worker->id);
    }

    public function destroy(Worker $worker) {
        $this->authorize('delete', $worker);
        $worker->delete();
        return redirect()->route('workers.index');
    }
}
