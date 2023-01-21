@extends('template.template')

@section('title','Dashboard')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body{
            background-color:#44475a; 
        }


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

        a{
            color: #bd93f9;
        }

        a:hover{
            color:#ff79c6;
        }

        ion-icon{
            color:#FFF;

        }

    </style>
</head>
<body>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($events) > 0)
            <table class="table">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td scope="row">{{$loop->index + 1}}</td>
                            <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                            <td>{{count($event->users)}}</td>
                            <td>
                                <a href="/events/edit/{{$event->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                                <form action="/events/{{$event->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <p>Você ainda não tem eventos, <a href="/events/create">Editar evento</a></p>
        @endif
    </div>
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Eventos que estou Participando</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($eventsAsParticipant) > 0)
        <table class="table">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        
            <tbody>
                @foreach($eventsAsParticipant as $event)
                    <tr>
                        <td scope="row">{{$loop->index + 1}}</td>
                        <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                        <td>{{count($event->users)}}</td>
                        <td>
                            <form action="/events/leave/{{$event->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button tyoe='submit' class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Sair do Evento</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>Você ainda não participa de nenhum evento, <a href="/">Procurar eventos</a></p>
        @endif
    </div>

</body>
</html>

@endsection
