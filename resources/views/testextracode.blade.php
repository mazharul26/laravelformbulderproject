


$date = Carbon::parse('January 2022')->format('F Y');
$firstDateOfMonth = Carbon::parse($date)->firstOfMonth()->format('d.m.Y');
$lastDateOfMonth = Carbon::parse($date)->endOfMonth()->format('d.m.Y');
