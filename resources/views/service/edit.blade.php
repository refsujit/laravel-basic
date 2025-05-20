<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Service</title>
</head>

<body>

    @if (request()->session()->has('success'))
    <div class="alert alert-success" style="margin-bottom:0px">
        <h4> {{ request()->session()->get('success') }} </h4>
    </div>
    @endif

    @if (request()->session()->has('warning'))
    <div class="alert alert-warning" style="margin-bottom:0px">
        <h4> {{ request()->session()->get('warning') }} </h4>
    </div>
    @endif


    @if ($errors->any())
    <div class="alert alert-danger" style="margin-bottom:0px">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="post" action="{{ route('service.update',$service->id) }}">
        @csrf
        @method('patch')
        <input type="text" name="name" value="{{ $service->name }}">
        <input type="submit" name="submit" value="Update">
    </form>
</body>

</html>