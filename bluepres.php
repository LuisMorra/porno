<?php
	require("clases/class.BaseDatos.php"); 
	$conexion = new BaseDatos(); 
	$conexion->Conectar(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<head><title>CONSULTAR DVD/CD PRESTADOS</title></head>
<body background="IMAGENES/New Megan Fox/Megan Fox SexyDesktop Wallpaper 05.jpg">
<?php
	
	$comansql = "SELECT * FROM bluepres WHERE  stat_blry= '1'";
	$conexion->Query($comansql);
?>
	<table border="2" align="center" bgcolor="#FFFFFF">
		<tr>
        <td align="center">#</td>
		<td align="center">Blueray #</td>
		<td align="center">Nombre</td>
	    </tr>
<?php 
while($data = $conexion->Extraer2())
	{	
	$n++;
	?>
    <tr>
    <td><?php echo $n;?></td>
	<td><?php echo $data['codi_blry'];?></td>
	<td><?php echo $data['num_blry'];?></td>
	<?php 
	}
	?>
	</tr>
</table>
<?php 
if (isset($_POST[guardar]))
{
	$sql= "SELECT stat_blry FROM bluepres AS t1 WHERE t1.codi_blry= '$_POST[num_blry]' AND  t1.stat_blry = '0'";
	$conexion->Query($sql);
	$fila8 = $conexion->Numfilas();
	
}
?>

<input name="submit" type="button" value="REGRESAR" onClick="location.href='PAGINAPRINCIPAL.PHP'"> 
</body>
</html>