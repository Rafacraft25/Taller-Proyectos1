<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
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
        <h1>Signup</h1>
        <form action="actions/actions.php" method="POST">
            <label for="fname">Nombres:</label>
            <input type="text" placeholder="Nombres" name="fname" id="fname" required=""><br><br>

            <label for="lname">Apellidos:</label>
            <input type="text" placeholder="Apellidos" name="lname" id="lname" required=""><br><br>

            <label for="email">E-mail:</label>
            <input type="email" placeholder="E-mail" name="email" id="email" required=""><br><br>

            <label for="phoneNo">nroMovil:</label>
            <input type="text" placeholder="nroMovil" name="phoneNo" id="phoneNo" required=""><br><br>

            <label for="password">Contraseña:</label>
            <input type="password" placeholder="Contraseña" name="password" id="password" required=""><br><br>

            <input type="submit" name="signup" id="signup" value="Signup"><br><br>
        </form>
        <a href="index.php">¿Ya tienes cuenta? Login</a>
    </div>
</body>
</html>
