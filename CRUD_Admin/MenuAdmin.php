<html>

<head>
  <title>Menú Usuario</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>FreeStyle barbershop</h1>
  <br>
  <a href="../CRUD/Listar_Citas.php">Citas</a>
  <br><br>
  <br>
  <a href="../CRUD_Admin/RegistroServicios.php">Agendar servicio</a>
  <br><br>
  <br>
  <a href="../index.php">Salir</a>
  <div class="register">

    <div>
      <?php

      require '../CRUD_Admin/ListarServicios.php';

      ?>
    </div>
</body>


</html>