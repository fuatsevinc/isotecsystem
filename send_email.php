<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form verilerini al
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = strip_tags(trim($_POST["phone"]));
    $message = trim($_POST["message"]);

    // E-posta adresi
    $to = "info@isotecsystem.de";

    // E-posta başlığı
    $subject = "Neue Kontaktformular Nachricht";

    // E-posta içeriği
    $email_content = "Name: $name\n";
    $email_content .= "E-Mail: $email\n";
    $email_content .= "Telefon: $phone\n\n";
    $email_content .= "Nachricht:\n$message\n";

    // E-posta başlıkları
    $email_headers = "Von: $name <$email>";

    // E-postayı gönder
    if (mail($to, $subject, $email_content, $email_headers)) {
        // Başarılıysa
        header("Location: danke.html");
    } else {
        // Başarısızsa
        echo "Entschuldigung, es gab ein Problem beim Senden Ihrer Nachricht. Bitte versuchen Sie es später erneut.";
    }
} else {
    // POST değilse
    echo "Bitte füllen Sie das Formular aus.";
}
?>
