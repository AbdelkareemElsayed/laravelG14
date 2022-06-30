<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1> {{ $title }} </h1>
            <br>

            {{ 'Welcome , ' . auth('student')->user()->name }}
            <br>

            @include('messages')

        </div>

        <a href="{{ url('Blogs/create') }}" class='btn btn-primary m-r-1em'>+ Blog</a>
        <a href="{{ url('Students') }}" class='btn btn-primary m-r-1em'>List Students</a>
         <a href="{{ url('Logout') }}"
            class='btn btn-primary m-r-1em'>Logout</a>

        <br>

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>{{__('labels.id')}} </th>
                <th>{{__('labels.title')}}</th>
                <th>{{__('labels.content')}}</th>
                <th>{{__('labels.date')}}</th>
                <th>{{__('labels.image')}}</th>
                <th>{{__('labels.AddedBy')}}</th>
                <th>{{__('labels.action')}}</th>
            </tr>


            @foreach ($data as $key => $Raw)
                <tr>

                    <td>{{ $Raw->id }}</td>
                    <td>{{ $Raw->title }}</td>
                    <td>{{ Str::limit($Raw->content, 30, '...') }}</td>
                    <td>{{ date('Y-m-d', $Raw->date) }}</td>
                    <td><img src="{{ url('images/blogs/' . $Raw->image) }}" width="80px" height="80px"></td>

                    <td> {{ $Raw->name }} </td>


                    <td>
                        <a href='{{ url('Blogs/' . $Raw->id) }}' class='btn btn-primary m-r-1em'>Show Raw</a>
                    </td>

                    <td>
                        <a href='' data-toggle="modal" data-target="#modal_single_del{{ $Raw->id }}"
                            class='btn btn-danger m-r-1em'>Remove Raw</a>
                        <a href="{{ url('Blogs/' . $Raw->id.'/edit') }} " class='btn btn-primary m-r-1em'>Update
                            Raw</a>
                    </td>
                </tr>






                <div class="modal" id="modal_single_del{{ $Raw->id }}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">delete confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                Remove Blod : {{ $Raw->title }} !!!!
                            </div>
                            <div class="modal-footer">
                                <form action="{{ url('Blogs/' . $Raw->id) }}" method="post">

                                    @method('delete') {{-- <input type="hidden" name="_method" value="delete"> --}}
                                    @csrf

                                    <div class="not-empty-record">
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>
