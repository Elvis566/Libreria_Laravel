<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <table border="1px red">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Libro</th>
                    <th>Autor</th>
                    <th>Año de publicacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->titulo}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->year}}</td>
                    <td>
                        <form action="{{url('datos', $item->id)}}" method="post">
                            @csrf
                            @method('delete')
                           <button type="submit">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{url('actualizarLibro', $item->id)}}" method="post">
                            @csrf
                            @method('put')
                           <button type="submit">Actualizar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        
        <form action="{{url('filtrar')}}" method="GET">
            @csrf
            <select name="datoFiltrado" id="">
                @foreach($autor as $item)
                   <option value="{{$item->id}}">{{$item->nombre}}</option>
                @endforeach
            </select> 
            <button type="submit">Filtrar</button>      
        </form>
 
  
</body>
</html>