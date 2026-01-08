<?php
session_start();

include "database.php";
include "db_functions.php";

function checkEmptyFields($action) {
    if ($action === "log_out") return;

    $fields_names = array_keys($_POST);
    array_pop($fields_names);

    foreach ($fields_names as $f_name) {
        if (empty($_POST[$f_name])) {
            header("Location: {$action}.php?empty-field={$f_name}");
            exit();
        }
    }
}


if (!empty($_POST)) {
    $action = $_POST['auth-action'];
    
    // Нормалізація дії
    if ($action === "Log in") {
        $action = "log_in";
    } elseif ($action === "Sign in") {
        $action = "sign_in";
    } else {
        $action = "log_out";
    }

    checkEmptyFields($action);

    if ($action === "log_in") {
        /**
         * Вхід
         */
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Робимо валідацію пошти
        if (empty(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            header("Location: {$action}.php?error=email_incorrect");
            exit();
        }

        if (checkUserExists($pdo, $email)) {
            // Якщо користувач існує
            $user = getUser($pdo, $email);

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    // Сесія користувача
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    
                    header("Location: welcome.php");
                    exit();

                } else {
                    // Якщо пароль неправильний
                    header("Location: {$action}.php?error=incorrect_password");
                    exit();
                }
            }

        } else {
            // Якщо користувача не існує
            header("Location: {$action}.php?error=user_not_found");
            exit();
        }

    } elseif ($action === "sign_in") {
        /**
         * Реєстрація
         */
        $username = htmlspecialchars($_POST['username']);
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Робимо валідацію пошти
        if (empty(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            header("Location: {$action}.php?error=email_incorrect");
            exit();
        }

        if (strlen($password) < 8) {
            // Якщо пароль занадто короткий
            header("Location: {$action}.php?error=too_short_password");
            exit();
        }

        if (checkUserExists($pdo, $email)) {
            // Якщо користувач існує
            header("Location: {$action}.php?error=user_exist");
            exit();
        }

        try {
            // Додаємо користувача в БД
            if (addUser($pdo, $username, $email, $password)) {
                header("Location: log_in.php?registered=true");
                exit();
            } else {
                header("Location: {$action}.php?error=registration_failed");
                exit();
            }
        } catch (PDOException $e) {
            header("Location: {$action}.php?error=idk_error");
            exit();
        }
    } else {
        /**
         * Вихід з акаунту
         */
        session_unset();
        session_destroy();

        header("Location: log_in.php");
        exit();
    }

}

?>
