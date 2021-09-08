<!DOCTYPE html>
<html>
<head>
</head>
<body>
<ul>
    <h3>Contact Information</h3>
    <li>
        <h2>First Name: {{ $details['ownerInfo']['first_name'] }}</h2>
    </li>
    <li>
        <h2>Last Name: {{ $details['ownerInfo']['last_name'] }}</h2>
    </li>
    <li>
        <h2>Email: {{ $details['ownerInfo']['email_address'] }}</h2>
    </li>
    <li>
        <h2>Phone: {{ $details['ownerInfo']['phone_number'] }}</h2>
    </li>
    <li>
        <p>Comment: {{ $details['ownerInfo']['comment'] }}</p>
    </li>
    <h3>Car Information</h3>
    <li>
        <h2>Car Make: {{ $details['make'] }}</h2>
    </li>
    <li>
        <h2>Car Model: {{ $details['model'] }}</h2>
    </li>
    <li>
        <h2>Kilometers: {{ $details['kilometers'] }}</h2>
    </li>
    <li>
        <h2>Year: {{ $details['year'] }}</h2>
    </li>
    <li>
        <h2>Price: {{ $details['price'] }}</h2>
    </li>
    <li>
        <h2>Warranty: {{ $details['warranty'] }}</h2>
    </li>
    <li>
        <h2>Number of doors: {{ $details['number_of_doors'] }}</h2>
    </li>
    <li>
        <h2>Number of cylinders: {{ $details['number_of_cylinders'] }}</h2>
    </li>
    <li>
        <h2>Horse power: {{ $details['horse_power'] }}</h2>
    </li>
    <li>
        <h2>Has Warranty: {{ $details['warranty'] ? 'Yes' : 'No' }}</h2>
    </li>
    <h3>Car Condition</h3>
    <li>
        <h2>{{trans('web.sell_a_car.exterior_condition_label')}} : {{ trans($details['condition']['exterior']) }}</h2>
    </li>
    <li>
        <h2>{{trans('web.sell_a_car.interior_condition_label')}} : {{ trans($details['condition']['interior']) }}</h2>
    </li>
    <li>
        <h2>{{trans('web.sell_a_car.accident_label')}} : {{ trans($details['condition']['accident']) }}</h2>
    </li>
</ul>
</body>
</html>
