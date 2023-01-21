@extends('template.template')

@section('title','Criar Evento')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background-color:#44475a; 
        }

        :root{
            --bs-body-line-height: 1;
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
    
        </style>
</head>
<body>
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu evento </h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="from-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">
            </div>
            <div class="from-group">
                <label for="date">Data:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="from-group">
                <label for="title">Local:</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento">
            </div>
            <div class="from-group">
                <label for="title">É um evento privado?</label>
                <select name="private" id="private" class="form-control" >
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="from-group">
                <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
            </div>
            <div class="from-group">
                <label for="title">Itens de Infraestrutura:</label>
                <div class="from-group">
                    <input type="checkbox" name="items[]" value="Computadores">Computadores
                    <input type="checkbox" name="items[]" value="Cadeiras">Cadeiras
                    <input type="checkbox" name="items[]" value="Teclado">Teclado
                    <input type="checkbox" name="items[]" value="Mouse">Mouse
                    <input type="checkbox" name="items[]" value="Monitores">Monitores
                </div>
            </div>
            <div class="from-group">
                <label for="title">Imagem do Evento:</label>
                <input type="file" id="image" name="image" class="from-control-file">
            </div>
            <input type="submit" class="botao botao-primario" value="Criar Evento">
        </form>
    </div>
</body>
</html>


@endsection


<div align="center"></div>