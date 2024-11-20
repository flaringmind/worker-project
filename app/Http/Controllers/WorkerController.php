<?php

namespace App\Http\Controllers;

use App\Http\Filters\Var1\WorkerFilter;
use App\Http\Filters\Var2\Worker\AgeFrom;
use App\Http\Filters\Var2\Worker\AgeTo;
use App\Http\Filters\Var2\Worker\Name;
use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Pipeline\Pipeline;

class WorkerController extends Controller
{
    public function index(IndexRequest $request)
    {
        $workers = app()->make(Pipeline::class)
            ->send(Worker::query())
            ->through([
                AgeFrom::class,
                AgeTo::class,
                Name::class,
            ])
            ->thenReturn();

        $workers = $workers->paginate(4);

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
