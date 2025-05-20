<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Services</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        table {
            text-align: center;
            margin: auto;
        }

        thead {
            background-color: black;
            color: white;
            height: 50px;
        }

        tr {
            height: 50px;
        }

        tr:hover:nth-child(even) {
            background-color: rgb(194, 197, 242);
        }
    </style>
</head>

<body>



    <a style="float:right;margin:20px;" href="{{ route('service.create') }}">Create Service</a>

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

    <table border="5px" width=100%>
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>

        @foreach ($services as $service)
        <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->name }}</td>
            <td>
                <a href="{{ route('service.edit', $service->id) }}">Edit</a>
                |
                <a id="delete-btn" data-id="{{ $service->id }}" action="{{ route('service.destroy',$service->id)  }}"
                    href="javascript:void(0)">Del</a>

                <form method="post" action="{{ route('service.destroy',$service->id)  }}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('Are you sure to del?')">
                        Del
                    </button>
                </form>

            </td>  
        </tr>
        @endforeach
    </table>

    <script>
        $(function() {
            $(document).on('click', '#delete-btn', function(e) {
                e.preventDefault();
                var result = confirm("Are you sure to delete this item...");
                if (result === true) {
                    var id = $(this).attr('data-id');
                    var url = $(this).attr('action');
                    $.ajax({
                        type: 'POST',
                        data: {
                            '_token': "{{ csrf_token() }}",
                            '_method': 'DELETE'
                        },
                        url: url,
                        success: function(resp) {
                            if (resp.status === true) {
                                window.location.reload(true);
                            }
                        },
                        error: function(resp) {
                            console.error(resp);
                        }
                    });
                }
            });
        })
    </script>

</body>

</html>