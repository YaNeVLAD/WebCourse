<?php

const PASSWORD_MIN_LENGTH = 5;
const SALT = "MyWebCourse";

function validateData($data): void
{
    foreach ($data as $key => $value) {
        if (!$value) {
            throw new Exception('Empty ' . $key);
        }
        switch ($key) {
            case 'email':
                validateEmail($value);
            case 'password':
                validatePassword($value);
        }
    }
}

function validateEmail($email): void
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid Email');
    }
}

function validatePassword($password): void
{
    if (strlen($password) < PASSWORD_MIN_LENGTH) {
        throw new Exception('Invalid Password');
    }
}

function loginUser(mysqli $database, ?array $data): int 
{
    if (empty($data)) {
        throw new Exception("Empty data");
    }
    validateData($data);
    $email = $data['email'];
    $user = findUserByEmail($database, $email);
    if (!$user) {
        throw new Exception("Wrong Email");
    }
    $requestPassword = md5(md5($data['password']) . SALT);
    if ($user['password'] === $requestPassword) {
        return $user['user_id'];
    } else {
        throw new Exception('Wrong Password');
    }
}