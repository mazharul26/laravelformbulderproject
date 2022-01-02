<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>Md. Mazharul Islam</h1>
    <p> <b>My mail: {{ Auth()->user()->name }}</b>

    </p>

    <p> <b>Email:</b> {{ $email ?? '' }}</p>
    <p> <b>Title:</b> {{ $title ?? '' }}</p>
    <p><b>Message:</b> {{ $body ?? ''}}</p>
    <p>Thank you</p>
</body>
</html>
