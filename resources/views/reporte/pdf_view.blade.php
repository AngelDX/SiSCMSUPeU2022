<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>resporte PDF</title>
</head>
<style>

</style>
<body>
    <h1>REPORTE LISTA DE CATEGORIAS</h1>

        <table border="1" cellspacing="0" cellpadding="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Slug</th>
                    <th>Fecha de creación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->slug}}</td>
                    <td>{{$item->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

</body>
</html>
