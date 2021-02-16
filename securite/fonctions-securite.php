<?php
session_start();

// Chemin du fichier json
// qui contient les utilisateurs
define("USER_PATH", "users.json");

// Liste des utilisateurs
function getUserList()
{
    $userList = [];

    if (file_exists(USER_PATH)) {
        $data = file_get_contents(USER_PATH);
        $userList = json_decode($data, true) ?? [];
    }
    return $userList;
}

// Enregistrement d'un nouvel utilisateur
function saveUser($user)
{

    $user["password"] = password_hash($user["password"], PASSWORD_BCRYPT);

    $userList = getUserList();
    array_push($userList, $user);
    $success = file_put_contents(USER_PATH, json_encode($userList));
    return $success;
}

// Trouver les utilisateurs qui possèdent un login donné
function getUsersByLogin($login)
{
    $userList = getUserList();
    $foundUsers = [];
    foreach ($userList as $user) {
        if ($user["login"] == $login) {
            array_push($foundUsers, $user);
        }
    }

    return $foundUsers;
}

function authenticateUser($credentials)
{
    // Liste des utilisateurs possèdant le login saisi
    $foundUserList = getUsersByLogin($credentials["login"]);
    $authenticated = false;

    var_dump($credentials);

    var_dump($foundUserList);

    foreach ($foundUserList as $user) {
        if (password_verify($credentials["password"], $user["password"])) {
            $_SESSION["user"] = $user;
            $authenticated = true;
            break;
        }
    }

    return $authenticated;
}

function isAuthenticated()
{
    return isset($_SESSION["user"]);
}
