<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog | Edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="container">
        <h2>Edit Blog</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @include('messages')



        <form action="<?php echo url('Blogs'); ?>" method="post" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="exampleInputName">Title</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="" name="title"
                    placeholder="Enter Title" value="{{ $data->title }}">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail">Content</label>
                <textarea  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="content"
                    placeholder="Enter Content"> {{ $data->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword">Date</label>
                <input type="date" class="form-control" id="exampleInput" name="date" value="{{  date('Y-m-d',$data->date)}}">
            </div>


            <div class="form-group">
                <label for="exampleInputPassword">Image</label>
                <input type="file" name="image">
            </div>

            <p>  <img src="{{url('images/blogs/'.$data->image)}}" height="80px" width="80px"> </p>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


</body>

</html>
