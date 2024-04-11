<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="modifica.php" method="POST">

        inserisci il cognome da modificare: <input type="text" name="cognome_mod"><br>

        inserisci il nome: <input type="text" name="nome"><br>

        inserisci il cognome: <input type="text" name="cognome"><br>

        inserisci l'età : <input type="number" name="eta"><br>
        
        <input type="submit">
        <a href="index.php" class="button">COMEBACK</a>
    </form>

</body>
</html>
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
    $cognome_mod = $_POST['cognome_mod'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $eta = $_POST['eta'];

    // Prepara la query di aggiornamento
    $stmt = $conn->prepare("UPDATE utenti SET nome = :nome, cognome = :cognome, eta = :eta WHERE  cognome = :cognome_mod");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cognome', $cognome);
    $stmt->bindParam(':eta', $eta);
    $stmt->bindParam(':cognome_mod', $cognome_mod); // Aggiungi questo bind per il parametro cognome_mod

    // Esegui la query di aggiornamento
    $stmt->execute();

    echo "Utente modificato con successo nel database!";
} catch(PDOException $e) {
    echo "Errore durante la modifica dell'utente nel database: " . $e->getMessage();
}

// Chiudi la connessione
$conn = null;
?>
