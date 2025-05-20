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