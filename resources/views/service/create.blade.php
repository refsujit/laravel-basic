<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Service</title>
</head>

<body>

   
    @include('partials.flash')

    <form method="post" action="{{ route('service.store') }}">
        @csrf
        <input type="text" name="name">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>
