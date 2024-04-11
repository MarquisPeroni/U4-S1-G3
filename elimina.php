<?php
// Configurazione del database
$servername = "localhost";
$username = "root";
$password = ""; // Lascia vuota se non hai impostato una password
$dbname = "lista_utenti"; // Sostituisci con il nome del tuo database

// Connessione al database utilizzando PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Imposta l'attributo PDO::ATTR_ERRMODE su PDO::ERRMODE_EXCEPTION per gestire gli errori in modo esplicito
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prendi i dati inviati dal form
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $eta = $_POST['eta'];

    // Prepara la query di inserimento
    $stmt = $conn->prepare("DELETE FROM utenti WHERE nome = :nome and cognome = :cognome and eta = :eta");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cognome', $cognome);
    $stmt->bindParam(':eta', $eta);

    // Esegui la query
    $stmt->execute();

    echo "Dati eliminati con successo nel database!";
} catch(PDOException $e) {
    echo "Errore durante l'inserimento dei dati nel database: " . $e->getMessage();
}

// Chiudi la connessione
$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="elimina.php" method="POST">
        inserisci il nome da eliminare: <input type="text" name="nome"><br>

        inserisci il cognome da eliminare: <input type="text" name="cognome"><br>

        inserisci l'età : <input type="number" name="eta"><br>
        
        <input type="submit">
        <a href="index.php" class="button">COMEBACK</a>
    </form>

</body>
</html>

<!-- ////////////////////////////////////////////////// -->
