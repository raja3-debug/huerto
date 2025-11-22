<?php
require_once "funcion.php";  
require_once "funcion_ciclo_cultivo.php"; 

$conn = conexion_bd();      

$res = $conn->query("SELECT id, nombre, tipo, dias_cosecha FROM cultivo");

 
 $cultivos = [];
while ($fila = $res->fetch_assoc()) {
    $cultivos[] = $fila; 
}

 
 if(isset($_POST['menor'])){
     $cultivos = ordenarPorDiasAsc($cultivos);
 }
 
 if(isset($_POST['mayor'])){
     $cultivos = ordenarPorDiasDesc($cultivos);
 }



?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <title>Index</title>
 <style>
    body{
        background-color:beige;
        

    }

 table { border-collapse: collapse; width: 50%;}
 td, th { border: 1px solid #ccc; padding: 6px; }
 th {background: green ;color: white; }
 h2 {
                padding: 20px;
                background-color: #4CAF50;
                color: #fff;
                text-align: center;
                margin-top: 20px;
                font-size: 24px;
                font-weight: bold;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            
            }
            form {
                display: flex;
                 align-items: center; 
                 gap: 20px;
                 max-width: 400px;
                margin: 50px auto;
            }
            form.botones {
             display: flex;
             justify-content: center; 
            gap: 10px;              
             margin-top: 20px;
            }
           input[type="submit"] {
                background-color: black;
                color: white;
                padding: 5px 5px;
                border: none;
                border-radius: 3px;
                cursor: pointer;
            }
           label {
              
                margin-bottom: 10px;
                font-weight: bold;
                color:black;
               
            }

            input[type="submit"]:hover {
                background-color: #45a049;
            }




            table {
                max-width: 400px;
                margin: 50px auto;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
           
 </style>
</head>
<body>
 <h2>Lista de  cultivos</h2>
 <?php if(!empty($cultivos)) :?> 
 <table>
 <tr>
 <th>ID</th>
 <th>Nombre</th>
 <th>TIPO</th>
 <th>DIAS COSECHA</th>
 <th>CICLO CULTIVO</th>
 </tr>
  
 <?php foreach($cultivos as $r): ?>
 <tr>
 <td><?= $r['id'] ?></td>
 <td><?= $r['nombre'] ?></td>
 <td><?= $r['tipo'] ?></td>
 <td><?= $r['dias_cosecha'] ?></td>
 
 <?php 
 $ciclo=cicloCultivo($r['dias_cosecha']);
 ?>
 <td><?= $ciclo ?></td>
 </tr>
<?php endforeach; ?>
 </table>
 <?php else: ?>
 <p>No hay registros.</p>
 <?php endif; ?>
 <form action="nuevo.php" method="POST" class="botones">
    <input type="submit" value="AÑadir cultivo+" name="cultivo">
</form>
 <form action="" method="POST" class="botones">
    <input type="submit" value="Ordenar de menor" name="menor">
    <input type="submit" value="Ordenar de mayor" name="mayor">
</form>

 
</body>
</html>
<?php $conn->close(); ?>