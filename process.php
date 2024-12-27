<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);

    $message = "Checkout Details:\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Address: $address\n";

    $telegramToken = "7595198672:AAGHr15kpkev7Hlw7ehhKo96shzOT2WS2lM";
    $chatId = "IDcardmucom"; // Ganti dengan ID chat Anda

    $url = "https://api.telegram.org/bot$telegramToken/sendMessage";

    $data = [
        'chat_id' => $chatId,
        'text' => $message,
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result) {
        echo "Message sent";
    } else {
        echo "Failed to send message";
    }
}
