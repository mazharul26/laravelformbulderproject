<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    @if(!empty($details))
    <h1>Name : {{$details['name']}}</h1>
    <h1>Email : {{$details['email']}}</h1>
    <h1>Title : {{$details['title']}}</h1>

    @elseif($datas)
    @foreach ( $datas as $data)
    <h1>Name : {{$data['name']}}</h1>
    <h1>Email : {{$data['email']}}</h1>
    @endforeach

    @endif

    <p>Thank you</p>
</body>
</html>
