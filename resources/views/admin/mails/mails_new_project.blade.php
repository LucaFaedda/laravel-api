<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body >
    <div >
        <h1>Nuovo progetto</h1>
        <h4><span>Titolo</span> {{$lead->title}}</h4>
        <hr>
        <p class="bold"><span>Data del Progetto</span> {{$lead->data_progetto}}</p>
        <p class="bold"><span>Descrizione: </span> {{$lead->descrizione}}</p>
        <p class="bold"><span>Difficoltà:</span> {{$lead->difficoltà}}</p>
    </div>
    
</body>
</html>

<style>
    body{
        background-color: #F3F7F0;
    }
    h1{
        color: rgb(100, 32, 32);
        font-family: 'Courier New', Courier, monospace;
    }

    hr{
        color: #BBE6E4;
    }

    .bold{
        font-weight: 700;
    }
</style>