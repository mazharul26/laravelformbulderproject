<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>Md. Mazharul Islam</h1>
    <p> <b>My mail: </b>

    </p>
    @foreach ($datas as $data)
    <p> <b>Email:</b>{{ $data->email ?? ''}} </p>
    <p> <b>Name:</b> {{ $data->name ?? ''}}</p>

    @endforeach

    <p>Thank you</p>
</body>
</html>
