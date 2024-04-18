<?php
function getConnectionParams(): array
{
    return parse_ini_file('config.ini');
}
function getConnection(): PDO
{
    $connectionParams = getConnectionParams();
    return new PDO($connectionParams['dsn'], $connectionParams['username'], $connectionParams['password']);
}
function saveUserToDatabase(PDO $pdo, array $userParams): ?int
{
    $query = "INSERT INTO `user` 
    (`first_name`, `last_name`, `middle_name`, `gender`, `birth_date`, `email`, `phone`, `avatar_path`)
    VALUES (:first_name, :last_name, :middle_name, :gender, :birth_date, :email, :phone, :avatar_path);";
    $statement = $pdo->prepare($query);
    if ($pdo->prepare($query) === false) {
        throw new Exception("FAILED TO EXECUTE DATABASE REQUEST.");
    }
    $statement->execute([
        ':first_name' => $userParams['first_name'],
        ':last_name' => $userParams['last_name'],
        ':middle_name' => $userParams['middle_name'] ?? '',
        ':gender' => $userParams['gender'],
        ':birth_date' => $userParams['birth_date'],
        ':email' => $userParams['email'],
        ':phone' => $userParams['phone'] ?? '',
        ':avatar_path' => $userParams['avatar_path'] ?? '',
    ]);
    return (int) $pdo->lastInsertId();
}
$database = getConnection();
try {
    $userId = saveUserToDatabase($database, $_POST);
} catch (Exception $e) {
    echo '<br>' . $e->getMessage() . '<br>';
    die();
}
$redirectUrl = "show_user?user_id=$userId";
header('Location: /!php/' . $redirectUrl, true, 303);
die();