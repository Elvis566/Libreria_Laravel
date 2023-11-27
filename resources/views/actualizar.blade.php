<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('actualizar', $libro->id)}}" method="post">
        @csrf
        @method('PUT')
        <h3>Datos del libro</h3>
        <label for="titulo">Titulo: </label>
        <input type="text" id="titulo" name="titulo" value="{{$libro->titulo}}"><br>
        <label for="year">Año de publicacion</label>
        <input type="number" id="year" name="year" value="{{$libro->year}}"><br><br>
        <select name="id_autor"  id="">
            @foreach($autor as $item)
                <option value={{$item->id}}>{{$item->nombre}}</option>
            @endforeach
        </select>
       
        <button type="submit">Actualizar Libro</button>

    </form>
</body>
</html>