<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <h3>{{ $title }} </h3>

    {{-- <h3> {!!  '<h4>Page : </h4>'.$title   !!} </h3> --}}

    <p>

          @foreach ($studentData as $key => $value )

              {!!  $key.' : '.$value.'<br>'  !!}
          @endforeach


   <?php


   ?>


{{-- @php
       echo (3+2);
@endphp --}}



   {{-- @php
   $age =15;
    @endphp

@if($age >= 20)
     {{  'age >= 20'   }}
    @elseif($age<20 && $age >= 10)
      {{   'age between 10 , 20'  }}
@else
        {{ 'age < 10'  }}
@endif --}}


 {{-- @for ($i = 0; $i < 10; $i++)
    {{ $i }}

 @endfor --}}


 {{-- @empty()

 @endempty --}}

 {{-- @isset()

 @endisset --}}

{{--
 @method('PUT') --}}

 {{-- @csrf                 <input type="hidden" name="_token" value="<?php //echo csrf_token(); ?>">
 --}}



    </p>

</body>
</html>
