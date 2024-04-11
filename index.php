<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestione utenti</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .button-container {
            text-align: center;
        }
        .button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestione Utenti</h1>
        <div class="button-container">
            <a href="aggiungi.php" class="button">Aggiungi utente</a>
            <a href="elimina.php" class="button">Elimina utente</a>
            <a href="modifica.php" class="button">Modifica utente</a>
        </div>
    </div>
</body>
</html>


