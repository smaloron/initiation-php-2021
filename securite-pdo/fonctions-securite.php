<?php
session_start();

// Création d'une instance de PDO
function getPDO()
{
    $pdo = new PDO(
        "mysql:host=127.0.0.1;dbname=formation_php;charset=utf8",
        "root",
        "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );

    return $pdo;
}

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
// dans la BD
function saveUser($user)
{
    // obtenir une instance PDO
    $pdo = getPDO();

    // Encodage du mot de passe
    $user["user_password"] = password_hash($user["user_password"], PASSWORD_BCRYPT);

    // test de la présence d'un upload
    $fileName = uploadAvatar();
    // Si il existe un nom de fichier valide
    if ($fileName) {
        $sql = "INSERT INTO users (username,
                user_login, user_password, avatar_image)
                VALUES (:username, :user_login, :user_password, :avatar)";
        $user["avatar"] = $fileName;
    } else {
        // La requête sql
        $sql = "INSERT INTO users (username, user_login, user_password)
                VALUES (:username, :user_login, :user_password)";
    }

    // Préparation de la requête
    $statement = $pdo->prepare($sql);
    // Exécution de la requête
    $success = $statement->execute($user);

    return $success;
}

// Trouver les utilisateurs qui possèdent un login donné
function getUsersByLogin($login)
{
    $pdo = getPDO();
    $sql = "SELECT * FROM users WHERE user_login=?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$login]);

    // Récupération des données sous la forme d'un tableau
    $foundUsers = $statement->fetchAll();

    return $foundUsers;
}

function authenticateUser($credentials)
{
    // Liste des utilisateurs possèdant le login saisi
    $foundUserList = getUsersByLogin($credentials["login"]);
    $authenticated = false;

    foreach ($foundUserList as $user) {
        if (password_verify($credentials["password"], $user["user_password"])) {
            $_SESSION["authenticatedUser"] = $user;
            $authenticated = true;
            break;
        }
    }

    return $authenticated;
}

// Test pour
function isAuthenticated()
{
    return isset($_SESSION["authenticatedUser"]);
}

function getAuthenticatedUser()
{
    if (isAuthenticated()) {
        return $_SESSION["authenticatedUser"];
    } else {
        return null;
    }
}

function logout()
{
    session_regenerate_id(true);
    unset($_SESSION["authenticatedUser"]);

    header("location:/securite-pdo/index.php");
}

// vérifie si une image a été transmise dans la requête
// il existe donc un clef "avatar" dans le tableau $_FILES
function hasUploadedAvatar()
{
    return isset($_FILES["avatar"]);
}

// Retourne les données du fichiers envoyé par l'utilisateur
// - type : le type mime du fichier (ex: image/jpeg)
// - error : entier indiquant s'il y a des erreurs (0 = pas d'erreur)
// - tmp_name : nom du fichier temporaire sur le serveur
// - name : nom du fichier d'origine
function getUploadedData()
{
    return $_FILES["avatar"];
}

// Récupération de l'extension du fichier en fonction du type mime
// et vérification que cette exension fait partie de la liste
// des extensions autorisées
function getFileExtension($file)
{
    // Tableau des types autorisés et des extensions correspondantes
    $allowedExtensions = [
        "image/jpeg" => "jpg",
        "image/png" => "png",
    ];

    // test si le type du fichier est bien autorisé
    if (array_key_exists($file["type"], $allowedExtensions)) {
        // retourne l'extension correspondant
        return $allowedExtensions[$file["type"]];
    } else {
        return false;
    }
}

// Génére un nom unique pour le fichier
function getFileName($file)
{
    $ext = getFileExtension($file);
    // création du nom uniquement si l'extension est autorisée
    if ($ext) {
        return uniqid() . ".$ext";
    } else {
        return false;
    }
}

// détermine qu'il ny a pas d'erreur et que le nom du fichier est ok
// donc que l'on peut finaliser l'upload
function isUploadOK($file, $fileName)
{
    return $file["error"] == 0 && $fileName !== false;
}

function uploadAvatar()
{
    $success = false;

    if (hasUploadedAvatar()) {
        // Récupération des données
        $avatar = getUploadedData();
        // Obtention du nom du fichier
        $fileName = getFileName($avatar);
        // si tout est ok alors on tente de déplacer le fichier
        // depuis le dossier temporaire vers sa destination

        $success = isUploadOK($avatar, $fileName)
        && move_uploaded_file($avatar["tmp_name"], getcwd() . "/img/$fileName");
        // Si l'upload est ok on retourne le nom du fichier
        if ($success) {

            return $fileName;
        }
    }
    return $success;
}
