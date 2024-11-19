@extends('layout.main')

@section('content')
<div>
    <ol>
        <li>
            <div>First Name:{{ $worker->first_name }}</div>
            <div>Last Name: {{ $worker->last_name }}</div>
            <div>Email: {{ $worker->email }}</div>
            <div>Age: {{ $worker->age }}</div>
            <div>Description: {{ $worker->description }}</div>
            <div>Is Married: {{ $worker->is_married }}</div>
            <div>
                <a href="{{ route('workers.index') }}">Назад</a>
            </div>
        </li>
    </ol>
</div>
@endsection
