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
        <h1>Nuovo Contatto</h1>
        <hr>
        <p class="bold"><span>Nome: </span> {{$lead->name}}</p>
        <p class="bold"><span>Cognome: </span> {{$lead->surname}}</p>
        <p class="bold"><span>Email: </span> {{$lead->email}}</p>
        <p class="bold"><span>Telefono: </span> {{$lead->phone}}</p>
        <p class="bold"><span>Messaggio: </span> {{$lead->message}}</p>
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