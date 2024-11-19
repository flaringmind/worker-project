@extends('layout.main')

@section('content')
<div>
    <a href="{{ route('workers.create') }}">Добавить</a>
</div>
<hr>
<div>
    <form action="{{ route('workers.index') }}">
        <input type="text" name="first_name" placeholder="first_name" value="{{ request()->get('first_name') }}">
        <input type="text" name="last_name" placeholder="last_name" value="{{ request()->get('last_name') }}">
        <input type="text" name="email" placeholder="email" value="{{ request()->get('email') }}">
        <input type="number" name="from" placeholder="from" value="{{ request()->get('from') }}">
        <input type="number" name="to" placeholder="to" value="{{ request()->get('to') }}">
        <input type="text" name="description" placeholder="description" value="{{ request()->get('description') }}">
        <input id="isMarried" type="checkbox" name="is_married"
            {{request()->get('is_married') == 'on' ? ' checked' : '' }}>
        <label for="isMarried">Is Married</label>
        <input type="submit">
        <a href="{{ route('workers.index') }}">Сбросить фильтры</a>
    </form>
</div>
<hr>
<div>
    <ol>
        @foreach($workers as $worker)
            <li>
                <div>First Name:{{ $worker->first_name }}</div>
                <div>Last Name: {{ $worker->last_name }}</div>
                <div>Email: {{ $worker->email }}</div>
                <div>Age: {{ $worker->age }}</div>
                <div>Description: {{ $worker->description }}</div>
                <div>Is Married: {{ $worker->is_married }}</div>
                <div>
                    <a href="{{ route('workers.show', $worker->id) }}">Подробнее</a>
                    <br />
                    <a href="{{ route('workers.edit', $worker->id) }}">Редактировать</a>
                    <br />
                    <form action="{{ route('workers.destroy', $worker->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить">
                    </form>
                </div>
            </li>
            <hr>
        @endforeach
        <div class="nav">
            {{ $workers->withQueryString()->links() }}
        </div>
    </ol>
</div>
@endsection
