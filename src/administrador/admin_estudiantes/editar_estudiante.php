<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad XYZ</title>
    <!-- Linking Google font link for icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <!-- Link your external CSS file -->
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    /* Estilos CSS personalizados aquí */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #34393f;
        color: white;
        text-align: center;
        padding: 10px;
    }

    .icon__menu {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sidebar {
        width: 20%;
        background-color: #34393f;
        color: white;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    .logo {
        text-align: center;
        padding: 20px 0;
    }

    .logo img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }

    .links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .links li {
        padding: 10px 0;
        border-top: 1px solid #51575e;
        border-bottom: 1px solid #51575e;
    }

    .links h4 {
        margin: 0;
        padding: 10px;
    }

    .links a {
        text-decoration: none;
        color: white;
        font-weight: bold;
    }

    .main-content {
        margin-left: 20%;
        padding: 20px;
    }

    .main-content h1 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .table-container {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    form {
        width: 70%;
        margin: 0 auto;
        padding: 10px;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #3498db;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #2980b9;
    }
    </style>

</head>

<body>
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
            <h1 class="li">Home</h1>
            <div class="flex gap-2 justify-end">
                <p>Administrador</p>


    </header>
    <aside class="sidebar">
        <div class="logo">
            <img src="../../../img/logo.jpg" alt="logo">
            <h2 class="lu">Universidad</h2>
        </div>
        <ul class="links">
            <li class="separator-horizontal"></li>
            <li>
                <h4>Admin</h4>
            </li>
            <div class="text-white font-medium flex">
                <p>Administrador</p>
            </div>
            <li class="separator-horizontal"></li>
            <li>
                <h4>MENU ADMINISTRATIVO</h4>
            </li>
            <li>
                <span class="material-symbols-outlined">person</span>
                <a href="#">Personas</a>
            </li>
            <li>
                <span class="material-symbols-outlined">group</span>
                <a href="../admin_maestro/crud_maestros.php">Maestros</a>
            </li>
            <li>
                <span class="material-symbols-outlined">ambient_screen</span>
                <a href="admin_estudiantes/crud_alumnos.php">Alumnos</a>
            </li>
            <li>
                <span class="material-symbols-outlined">pacemaker</span>
                <a href="../clases/clases_vista.php">Clases</a>
            </li>
        </ul>
    </aside>
    <div class="main-content">
        <div class="p-5 h-[80%] flex flex-col gap-6 mt-[70px]">
            <div class="flex justify-between">
                <h1 class="text-2xl font-medium text-gray-700">Lista de Alumnos</h1>

                <div class="flex gap-1">
                    <a href="./vAdmin.php">
                        <p class="text-blue-500">Home</p>
                    </a>/ <p>Alumno</p>
                </div>
            </div>


            <div class="table-container">
                <h2>Registrar alumno</h2>
            </div>

            <body>

                <?php
                include "../../config/conexiondatabs.php";
                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Error de conexión a la base de datos: " . $conn->connect_error);
                }

                // Verificar si se ha enviado un ID de estudiante para editar
                if (isset($_GET["id"])) {
                    $id_estudiante = $_GET["id"];

                    // Consulta SQL para obtener los datos del estudiante por su ID
                    $sql = "SELECT id_estudiante, DNI, nombre, apellido, email, direccion, fecha_nacimiento FROM estudiantes WHERE id_estudiante = ?";
                    $stmt = $conn->prepare($sql);

                    if ($stmt) {
                        // Vincular el parámetro con el valor
                        $stmt->bind_param("i", $id_estudiante);

                        // Ejecutar la consulta
                        if ($stmt->execute()) {
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                // Mostrar el formulario de edición con los datos del estudiante
                                $row = $result->fetch_assoc();
                ?>
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Editar Estudiante</title>
                </head>

                <body>
                    <h1>Editar Estudiante</h1>

                    <form action="editar_action.php" method="POST">
                        <input type="hidden" name="id_estudiante" value="<?php echo $row["id_estudiante"]; ?>">

                        <label for="DNI">DNI:</label>
                        <input type="text" id="DNI" name="DNI" value="<?php echo $row["DNI"]; ?>" required><br><br>

                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo $row["nombre"]; ?>"
                            required><br><br>

                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" value="<?php echo $row["apellido"]; ?>"
                            required><br><br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $row["email"]; ?>"
                            required><br><br>

                        <label for="direccion">Dirección:</label>
                        <input type="text" id="direccion" name="direccion"
                            value="<?php echo $row["direccion"]; ?>"><br><br>

                        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                            value="<?php echo $row["fecha_nacimiento"]; ?>" required><br><br>

                        <input type="submit" value="Guardar Cambios">
                    </form>
                </body>

                </html>
                <?php
                            } else {
                                echo "No se encontró ningún estudiante con ese ID.";
                            }
                        } else {
                            echo "Error al ejecutar la consulta: " . $stmt->error;
                        }

                        // Cerrar la consulta preparada
                        $stmt->close();
                    } else {
                        echo "Error en la preparación de la consulta: " . $conn->error;
                    }
                } else {
                    echo "Falta el ID de estudiante para editar.";
                }

                // Cerrar la conexión a la base de datos
                $conn->close();
                ?>

            </body>
            </table>
        </div>
    </div>
    </div>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>