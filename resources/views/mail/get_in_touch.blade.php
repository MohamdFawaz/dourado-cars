<!DOCTYPE html>
<html>
<head>
</head>
<body>
<ul>
    <li>
        <h2>Name: {{ $details['full_name'] }}</h2>
    </li>
    <li>
        <h2>Date: {{ $details['date'] }}</h2>
    </li>
    <li>
        <h2>Time: {{ $details['time'] }}</h2>
    </li>
    <li>
        <h2>Phone: {{ $details['mobile_number'] }}</h2>
    </li>
    @if(isset($details['interested']))
    <li>
        <h2>Interested In: {{ $details['interested'] }}</h2>
    </li>
    @else
    <li>
        <h2>Interested on Car: {{ $details['car_name'] }}</h2>
    </li>
    @endif
</ul>
</body>
</html>
