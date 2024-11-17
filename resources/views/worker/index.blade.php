<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <a href="{{ route('worker.create') }}">Добавить</a>
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
                        <a href="{{ route('worker.show', $worker->id) }}">Подробнее</a>
                        <br />
                        <a href="{{ route('worker.edit', $worker->id) }}">Редактировать</a>
                        <br />
                        <form action="{{ route('worker.delete', $worker->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Удалить">
                        </form>
                    </div>
                </li>
                <hr>
            @endforeach
            <div class="nav">
                {{ $workers->links() }}
            </div>
        </ol>
    </div>

    <style>
        .nav svg{
            width: 20px;
        }
    </style>
</body>
</html>
