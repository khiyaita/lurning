<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <title>Document</title>
</head>
<body>
    @include("partials.nav")
    <main>
        @yield("main")
    </main>
    @include("partials.footer")
</body>
</html>








{{--
<h2>  {{ $nom}} {{$prenom}} </h2>
@if(count($Modules)>0)
<h3>Cours: </h3>
<ul>
    @foreach($Modules as $Module)
    <li>
        <h5>  {{$Module}}</h5>
    </li>
    @endforeach
</ul>
@endif
@php
    /*
        @unless
        @endunless

        @isset()
        @endisset
        
        @empty()
        @endempty
        
        @switch()
            @case
                @break
            @default
                @break    
        @endSwitch

        @include("")

        @once
        @endonce

    */
@endphp    
    --}}