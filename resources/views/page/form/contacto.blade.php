<!DOCTYPE html>
<html>
<body>
	<h2>GSD</h2>
	<h3>Contacto</h3> 
	<p>Enviado desde la web</p>
	<br>
	<br>
	<h3>Datos del contacto</h3>
	<ul>
		<li><strong>Nombre:</strong> {{$nombre}} {{$apellido}}</li>
		<li><strong>Télefono:</strong> {{$telefono}}</li>
		<li><strong>Email:</strong> <a href="mailto:{{$email}}">{{$email}}</a></li>
	</ul>
    <br>
    <h4>Mensaje:</h4>
    <p>{{$mensaje}}</p>
</body>
</html>