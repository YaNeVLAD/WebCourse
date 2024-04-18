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
function findUserInDatabase(PDO $pdo, int $userId): ?array
{
    $query = "SELECT `first_name`, `last_name`, `middle_name`, `gender`, `birth_date`, `email`, `phone`, `avatar_path`
    FROM `user` WHERE `user_id` = :user_id;";
    $statement = $pdo->prepare($query);
    $statement->execute([
        ':user_id' => $userId,
    ]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return ($result === false) ? null: $result;
}
$database = getConnection();
$userId = (int) $_GET['user_id'];
$userInfo = findUserInDatabase($database, $userId);
if ($_GET or $_GET['user_id']) {
    if ($userInfo === null) {
        exit('Пользователя с таким id не найдено.');
    }
} else {
    exit('Неверный user_id');
}

include __DIR__ . '/view_form.php';