<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
} else {

    // This pulls the MongoDB driver from the vendor folder
    require_once 'vendor/autoload.php';

    // Connect to MongoDB Database
    $databaseConnection = new MongoDB\Client;

    // Connecting to a specific database in MongoDB
    $myDatabase = $databaseConnection->myDB;

    // Connecting to our MongoDB Collections
    $userCollection = $myDatabase->users;

    $userEmail = $_SESSION['email'];

    $data = array(
        "E-mail" => $userEmail,
    );

    // Fetch user from MongoDB Users Collection
    $fetch = $userCollection->findOne($data);
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Edit Profile</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                text-align: center;
                margin: 0;
                padding: 0;
            }

            #container {
                max-width: 400px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }

            h1 {
                font-size: 24px;
                color: #333;
            }

            form {
                text-align: left;
            }

            label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
            }

            input[type="text"],
            input[type="password"],
            input[type="email"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            input[type="hidden"] {
                display: none;
            }

            input[type="submit"] {
                background-color: #007bff;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 3px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }

            a {
                text-decoration: none;
                color: #007bff;
            }
        </style>
    </head>
    <body>
    <div id="container">
        <h1>Editar Perfil</h1>
        <form action="actions/edit-profile.php" method="POST">
            <label for="fname">Nombres:</label>
            <input type="text" value="<?php echo $fetch['Nombres']; ?>" name="fname" id="fname" required=""><br><br>

            <label for="lname">Apellidos:</label>
            <input type="text" value="<?php echo $fetch['Apellidos']; ?>" name="lname" id="lname" required=""><br><br>

            <label for="email">E-mail:</label>
            <input type="email" value="<?php echo $fetch['E-mail']; ?>" name="email" id="email" required=""><br><br>

            <label for="phoneNo">Nro Movil:</label>
            <input type="text" value="<?php echo $fetch['nroMovil']; ?>" name="phoneNo" id="phoneNo" required=""><br><br>

            <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $fetch['_id']; ?>">

            <input type="submit" name="update" id="update" value="Actualizar Información"><br><br>
        </form>
        <a href="profile.php">Pagina de Perfil</a>
    </div>
    </body>
    </html>

<?php } ?>
