<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>Md. Mazharul Islam</h1>
    <p> <b>My mail: {{ Auth()->user()->name }}</b>

    </p>
    <p> <b>Title:</b> {{ $data['email'] ?? '' }}</p>
    <p><b>Message:</b> {{ $data['body'] ?? ''}}</p>
    <p>Thank you</p>
</body>
</html>
