<?php
require_once 'databaseFunctions.php';

const SESSION_NAME = "auth";
function authBySession(): bool
{
    session_name(SESSION_NAME);
    session_start();

    $db = createDBConnection();
    if (!isset($_SESSION['id'])) {
        return false;
    } elseif (($userId = (int) $_SESSION['id']) === 0) {
        return false;
    } elseif (findUserById($db, $userId)) {
        return true;
    }
    closeDBConnection($db);
    return false;
}

function closeSession(): void
{
    session_name(SESSION_NAME);
    session_start();
    session_destroy();
    setcookie(SESSION_NAME,'', time() -0,'/');
}