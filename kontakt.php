<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Benutzereingaben
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Empfänger-E-Mail-Adresse
    $to = "raphael.zimmerer@computer-zimmerer.de"; // Ersetze dies durch deine E-Mail-Adresse

    // Betreff der E-Mail
    $subject = "Neue Nachricht von Kontaktformular";

    // E-Mail-Inhalt
    $email_content = "
    <html>
    <head>
        <title>$subject</title>
    </head>
    <body>
        <p><strong>Name:</strong> $name</p>
        <p><strong>E-Mail:</strong> $email</p>
        <p><strong>Nachricht:</strong></p>
        <p>$message</p>
    </body>
    </html>
    ";

    // E-Mail-Kopfzeilen
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    // E-Mail senden
    if (mail($to, $subject, $email_content, $headers)) {
        echo "<p>Vielen Dank für deine Nachricht! Wir werden uns bald bei dir melden.</p>";
    } else {
        echo "<p>Es gab ein Problem beim Senden der Nachricht. Bitte versuche es später noch einmal.</p>";
    }
}
?>
