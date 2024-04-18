<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <title>User Info</title>
</head>

<body>
    <h1> User Info </h1>
    <span>User First Name:
        <?= htmlentities($userInfo['first_name'], ENT_QUOTES | ENT_IGNORE, "UTF-8") ?>
    </span>
    <br>
    <span>User Last Name:
        <?= htmlentities($userInfo['last_name'], ENT_QUOTES | ENT_IGNORE, "UTF-8") ?>
    </span>
    <br>
    <span>User Middle Name:
        <?= htmlentities($userInfo['middle_name'] ?? '', ENT_QUOTES | ENT_IGNORE, "UTF-8") ?>
    </span>
    <br>
    <span>User Gender:
        <?= htmlentities($userInfo['gender'], ENT_QUOTES | ENT_IGNORE, "UTF-8") ?>
    </span>
    <br>
    <span>User Birth Date:
        <?= date("d/m/Y", strtotime($userInfo['birth_date'])) ?>
    </span>
    <br>
    <span>User Email Adress:
        <?= htmlentities($userInfo['email'], ENT_QUOTES | ENT_IGNORE, "UTF-8") ?>
    </span>
    <br>
    <span>User Phone Number:
        <?= htmlentities($userInfo['phone'] ?? '', ENT_QUOTES | ENT_IGNORE, "UTF-8") ?>
    </span>
    <br>
    <span>User Avatar:
        <?= htmlentities($userInfo['avatar_path'] ?? '', ENT_QUOTES | ENT_IGNORE, "UTF-8") ?>
    </span>
    <br>
</body>