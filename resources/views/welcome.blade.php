<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Distribution</title>
</head>
<body>
    <p>Welcome to the "Simplest" form of Report distribution, made in Laravel</p>
    <p>
        <a href="{{ route('report.index') }}">
            Reports List
        </a>
    </p>
    <p>
        <a href="{{ route('destination.index') }}">
            Destinations List
        </a>
    </p>
</body>
</html>