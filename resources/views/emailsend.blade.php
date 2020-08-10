<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Certificate</title>
</head>

<body>
    

    <h1>Dear {{ $details['name'] }}</h1>
    <p>Greetings from e-Edport...!!!</p>
    <p>{{ $details['body'] }}</p>
    <div>
        <strong> Certificate Link</strong>:<a href="{{route('createPDF', ['id' => encrypt($details['id'])])}}" target="_blank" rel="noopener noreferrer">Link</a>
    </div>
    <div>
        <strong>Password : {{ $details['password'] }}</strong>
    </div>

    <p>Thank you</p>
</body>

</html>