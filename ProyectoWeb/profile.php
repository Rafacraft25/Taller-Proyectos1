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
        <title>Profile Page</title>
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

            table {
                width: 100%;
                margin-top: 20px;
            }

            table td {
                padding: 10px;
                text-align: left;
            }

            table tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            a {
                text-decoration: none;
                color: #007bff;
            }

            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
    <div id="container">
        <h1>Perfil de Usuario</h1>
        <table>
            <tr>
                <td>Nombres :</td>
                <td><?php echo $fetch['Nombres']; ?></td>
            </tr>
            <tr>
                <td>Apellidos :</td>
                <td><?php echo $fetch['Apellidos']; ?></td>
            </tr>
            <tr>
                <td>Email :</td>
                <td><?php echo $fetch['E-mail']; ?></td>
            </tr>
            <tr>
                <td>Nro Movil :</td>
                <td><?php echo $fetch['nroMovil']; ?></td>
            </tr>
            <tr>
                <td><a href="edit-profile.php?id=<?php echo $fetch['_id']; ?>">Editar</a></td>
                <td><a href="logout.php">Logout</a></td>
            </tr>
        </table>
    </div>
    </body>
    </html>

<?php } ?>
