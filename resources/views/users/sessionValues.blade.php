<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <?php

    //  dd(session()->has('name'));

     echo 'session1 = ' . session()->get('name').'<br>';

  //   echo 'session2 = ' . session()->get('id').'<br>';

     echo 'session3 = ' . session()->get('level');

    // session()->forget(['name', '']);

    session()->flush();   // = session_destroy(); // remove all session data

    ?>



</body>

</html>
