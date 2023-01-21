@extends('template.template')

@section('title',$event->title)

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    #ul-footer-main{
        width: 100%;
    }

    .container-footer{
        display: flex;
        justify-content: center;
        flex-direction: column;
        position: absolute;
        bottom: 0px;
    }

    </style>
</head>
<body>
    <div id="container-img-text" class="col-md-10 offset-md-1">
        <div class="row">
        <div id="image-container" class="col-md-3"></div>
            <img src="/img/events/{{$event->image}}" class="img-fluid" alt="Imagem do evento">
        </div>
        <div id="info-container" class="col-md-3">
            <h1>{{$event->title}}</h1>
            <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{$event->city}}</p>
            <p class="event-owner"><ion-icon name="star-outline"></ion-icon>{{$eventOwner['name']}}</p>
            <p class=""><ion-icon name="calendar-number-outline"></ion-icon> {{date('d/m/Y', strtotime($event->date))}}</p>
            <p class="events-particpants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users)}}</p>
            <p class=""><ion-icon name="chatbox-ellipses-outline"></ion-icon> {{$event->description}}</p>
            <h3>O Evento conta com:</h3>
            <ul id="items-list">
                @foreach ($event->itens as $item)
                    <li><ion-icon name="play-outline"></ion-icon>{{$item}}</li>
                @endforeach

            </ul>
            @if(!$hasUserJoined)
                <form action="/events/join/{{$event->id}}" method="POST">
                @csrf
                <a href="/events/join/{{$event->id}}"
                    class="botao botao-primario"
                    id="event-submit"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Participar do Evento
                </a>
                </form>
            @else
            <p class="alredy-joined-message">Você já está cadastrado no Evento!</p>
            @endif
        </div>
    </div>    
</body>
</html>
@endsection