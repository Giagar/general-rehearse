<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My homepage</title>
</head>
<body>
    <header>
        <h1>My homepage</h1>
    </header>
    <main>
        @yield('mymaincontent')
        @include('myinclude')
        @foreach ($data as $item)
            {{$item}} <br>
        @endforeach
        @dump($db_data)
    </main>
</body>
</html>
