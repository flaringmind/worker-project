@extends('layout.main')

@section('content')
<h2>Edit page</h2>
<hr>
<div>
    <form action="{{ route('workers.update', $worker->id) }}" method="post">
        @csrf
        @method('patch')
        <div style="margin-bottom: 20px"><input type="text" name="first_name"
            placeholder="first_name" value="{{ old('first_name') ?? $worker->first_name }}">
            @error('first_name')
                <br> {{ $message }}
            @enderror
        </div>
        <div style="margin-bottom: 20px"><input type="text" name="last_name"
            placeholder="last_name" value="{{ old('last_name') ?? $worker->last_name }}">
            @error('last_name')
                <br> {{ $message }}
            @enderror
        </div>
        <div style="margin-bottom: 20px"><input type="email" name="email"
            placeholder="email" value="{{ old('email') ?? $worker->email }}">
            @error('email')
                <br> {{ $message }}
            @enderror
        </div>
        <div style="margin-bottom: 20px"><input type="number" name="age"
            placeholder="age" value="{{ old('age') ?? $worker->age }}">
            @error('age')
                <br> {{ $message }}
            @enderror
        </div>
        <div style="margin-bottom: 20px"><textarea name="description"
            placeholder="description">{{ old('description') ?? $worker->description }}</textarea>
            @error('description')
                <br> {{ $message }}
            @enderror
        </div>
        <div style="margin-bottom: 20px">
            <input id="IsMarried" type="checkbox" name="is_married"
            {{ $worker->is_married ? ' checked' : '' }} >
            <label for="IsMarried">Is married</label>
            @error('is_married')
                <br> {{ $message }}
            @enderror
        </div>
        <div style="margin-bottom: 20px"><input type="submit" value="Сохранить"></div>
    </form>
</div>
@endsection
