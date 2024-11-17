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
    <ol>
        <li>
            <div>First Name:{{ $worker->first_name }}</div>
            <div>Last Name: {{ $worker->last_name }}</div>
            <div>Email: {{ $worker->email }}</div>
            <div>Age: {{ $worker->age }}</div>
            <div>Description: {{ $worker->description }}</div>
            <div>Is Married: {{ $worker->is_married }}</div>
            <div>
                <a href="{{ route('worker.index') }}">Назад</a>
            </div>
        </li>
    </ol>
</div>

</body>
</html>
