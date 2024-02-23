
<?php
// Nettoyage et validation des entrées utilisateur

$name = trim(strip_tags($_POST['name']));
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$subject = "[$name] Nouveau message depuis Portfolio";
$message = trim(htmlspecialchars($_POST['message']));

// Construction de l'en-tête du courriel
$headers = "From: $name <$email>" . "\r\n" .
    "Reply-To: $email" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();


// Envoi du courriel
if (mail('pelcat.nd@gmail.com', $subject, $message, $headers)) {
    // Redirection vers une page de confirmation
    header("Location: thanks.html");
} else {
    // Gestion des erreurs
    echo "<p>Une erreur s'est produite lors de l'envoi du message. Veuillez réessayer plus tard.</p>";
}
