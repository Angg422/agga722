<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // Email tujuan (ganti dengan email Anda)
    $to = "everydaykahf3@gmail.com"; // Ganti dengan email Anda
    $subject = "Pendaftaran Baru dari $name";

    // Format email
    $body = "Nama: $name\n";
    $body .= "Email: $email\n";
    $body .= "Nomor Telepon: $phone\n";
    $body .= "Pesan: $message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Kirim email
    if (mail($to, $subject, $body, $headers)) {
        echo "Pendaftaran berhasil! Kami telah menerima data Anda.";
    } else {
        echo "Maaf, terjadi kesalahan. Coba lagi nanti.";
    }
} else {
    echo "Metode pengiriman tidak valid.";
}
?>