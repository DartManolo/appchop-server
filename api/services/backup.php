<?php
    require_once 'firebase.php';
    require_once '/../../parameters/util.php';
    $fcmMessage = [
        'ids' => array("cLR4cEFHSWKes6WKA3mTq5:APA91bE1wCIqbRGm61rYMj4-3YX7-xQkSRL-j8Ysu7rtF8xDfIrazD6-7JB2YHxQaV0-UPh3okV7qAbmZVCSP9rC-WJGHhoTyc5gQkdicU0eIYwLPIgH5og"),
        'titulo' => 'Prueba',
        'cuerpo' => 'Notificacion',
        'data' => [
            'customKey1' => 'valor1'
        ]
    ];
    $notificacion = Firebase::enviarNotificacionExternal($fcmMessage);
    echo $notificacion;
?>