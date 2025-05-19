<h1>Web Tech 2022</h1>

<h3>Welcome {{$name}}</h3>

@foreach($services as $s)
<p>{{$s->name}}</p>
@endforeach

@if($status)
<p>This is true</p>
@else
<p>This is false</p>
@endif

<p>{{$msg}}</p>
<p>{!! $msg !!}</p>

<p>{{$id}}</p>


<a href="{{route('about.test')}}">Test Page</a>

