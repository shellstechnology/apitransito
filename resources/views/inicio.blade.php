<!DOCTYPE html>
<html>
<head>
    <title>Enviar Datos</title>
</head>
<body>
    <form action="{{ route('transito.buscarLotesChofer') }}" method="POST">
        @csrf
        <label for="id_usuario">ID de Usuario:</label>
        <input type="text" name="id_usuario">
        <button type="submit">Enviar</button>
    </form>
</body>
{{ dd(Session::get('datos')) }}

</html>