<?php

$nombre=$_POST['namef'];
$carrera=$_POST['carreraf'];


$archivo= (isset($_FILES['archivof'])) ? $_FILES['archivof']: null;

if($archivo){

    $ruta_destino="archivo/{$archivo['name']}";
    $archivo_ok=move_uploaded_file($archivo['tmp_name'], $ruta_destino);
}
echo "<br> Tu nombre es: ".$nombre;
echo "<br> Tu carrera es: ".$carrera;

echo "<br><br><br> Tabla con datos de libros";
echo "<br><br><br> <table border ='2' <tbody> <tr> <th>Titulo del libro </th> <th>ID</th> <th> Autor </th> </tr>";
$fichero= fopen("archivo/datos ejercicio.txt","r");
$contador=0;

while(!feof($fichero)){
    $linea=fgets($fichero);
    $datos=explode('|',$linea);
    if($contador>0){
        echo "<tr> <td>".md5($datos[0])."</td> <td>".$datos[1]."</td> <td>".$datos[2]."</td> </tr>";
    }
    $contador=$contador+1;
}
echo "</tbody></table>";
fclose($fichero);

?>