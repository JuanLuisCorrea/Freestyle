<html>

<head>
  <title>Menú Administrador</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body class="body-menu">
  <div class="nav-bg">
    <nav class="nav-principal">
      <p class="nav-title">FreeStyle Barbershop</p>
      <div class="nav-links">
        <a href="../CRUD/Listar_Citas.php">Citas</a>
        <a href="../CRUD_Admin/RegistroServicios.php">Añadir servicio</a>
        <a href="../index.php">Salir</a>
      </div>
    </nav>
  </div>
  <div class="menu-main">
    <p class="menu-main-title">Servicios</p>
    <?php
      require '../CRUD_Admin/ListarServicios.php';
    ?>
  </div>
</body>


</html>