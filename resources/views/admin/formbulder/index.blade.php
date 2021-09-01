
<br>
<br>
<br>
<br>
@php
echo Form::open(['route' => 'form.store', 'method' => 'POST']);

echo Form::label('email', 'E-Mail Address');
echo Form::text('email', 'example@gmail.com');
echo Form::checkbox('checkme', 'value');

echo Form::radio('radiome', '1').'male';
echo Form::radio('radiome', '2').'Female';
echo Form::radio('radiome', '3').'other';
echo Form::select('size', ['L' => 'Large', 'S' => 'Small']);
echo Form::date('current_date', \Carbon\Carbon::now());
echo Form::submit('Click Me!');
echo Form::close();
@endphp



