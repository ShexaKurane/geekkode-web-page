<?php
// Comparar con usuarios existentes
// ->si existe, redirigir a login
// Validar los datos
// Agregar registro

// redirección

$bd_usuarios = [
    ['username' => '1234', 'email' => 'mail1@mail.com', 'password' => '1234'],
    ['username' => '5678', 'email' => 'mail2@mail.com', 'password' => '5678'],
    ['username' => 'abcd', 'email' => 'mail3@mail.com', 'password' => '9012'],
];

if($_POST['username'] && $_POST['email'] && $_POST['password'] && $_POST['confirm_pass']) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_pass = htmlspecialchars($_POST['confirm_pass']);

        foreach ($bd_usuarios as $usuario) {
            if ($usuario['username'] == $username || $usuario['email'] == $email) {
                echo('Usuario ya registrado');
                header('Location: login.php');
                exit(); // Detener la ejecución del script
            }
        }

        if ($password != $confirm_pass) {
            echo('Las contraseñas no coinciden');
            exit();
        }

        // $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // echo($email);
        // if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        //     echo('Correo inválido');
        //     exit();
        // }

        if(!preg_match('/^[a-zA-Z0-9]+$/', $username)){
            echo('Nombre de usuario inválido');
            exit();
        }

        

    } else {
            
    }
}else{
    echo('No se han enviado datos');
}

?>