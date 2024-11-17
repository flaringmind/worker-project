@extends('layout.main')

@section('content')
<h2>Create page</h2>
<hr>
<div>
    <form action="{{ route('worker.store') }}" method="post">
        @csrf
        <div style="margin-bottom: 20px">
            <input type="text" name="first_name"
            placeholder="first_name" value="{{ old('first_name') }}">
            @error('first_name')
                <br> {{ $message }}
            @enderror
        </div>
        <div style="margin-bottom: 20px"><input type="text" name="last_name"
            placeholder="last_name" value="{{ old('last_name') }}">
            @error('last_name')
                <br> {{ $message }}
            @enderror
        </div>
        <div style="margin-bottom: 20px"><input type="email" name="email"
            placeholder="email" value="{{ old('email') }}">
            @error('email')
                <br> {{ $message }}
            @enderror
        </div>
        <div style="margin-bottom: 20px"><input type="number" name="age"
            placeholder="age" value="{{ old('age') }}">
            @error('age')
                <br> {{ $message }}
            @enderror
        </div>
        <div style="margin-bottom: 20px"><textarea name="description"
            placeholder="description">{{ old('description') }}</textarea>
            @error('description')
                <br> {{ $message }}
            @enderror
        </div>
        <div style="margin-bottom: 20px">
            <input id="IsMarried" type="checkbox" name="is_married"
                {{ old('is_married') == 'on' ? ' checked' : '' }}>
            <label for="IsMarried">Is married</label>
            @error('is_married')
                <br> {{ $message }}
            @enderror
        </div>
        <div style="margin-bottom: 20px"><input type="submit" value="Добавить"></div>
    </form>
</div>
@endsection
