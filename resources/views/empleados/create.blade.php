<h1>Seccion para crear empleados </h1>
<form action="{{route('empleados.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" name="Nombre" id="Nombre" value="">
    <label for="ApellidoPaterno">{{'Apellido Paterno'}}</label>
    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="">
    <label for="ApellidoMaterno">{{'Apellido Materno'}}</label>
    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" value="">
    <label for="Correo">{{'Correo'}}</label>
    <input type="email" name="Correo" id="Correo" value="">
    <label for="Foto">{{'Foto'}}</label>
    <input type="file" name="Foto" id="Foto" value="">
    <input type="submit" value="Agregar">
</form>