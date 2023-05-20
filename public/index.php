<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        .hidden {
            display: none;
        }

        form, button {
            display: inline-block;
        }

    </style>
</head>
<body>
<?php

// use App\Models\User;
use App\Models\UserRepository;
use Symfony\Component\VarDumper\VarDumper;


require_once __DIR__ . '/../vendor/autoload.php';

$timezones = DateTimeZone::listIdentifiers();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userRepo = new UserRepository();
    $result = $userRepo->save($_POST);
    echo "success";
}
?>

<form method="POST">
    <input type="text" name="name" id="" placeholder="NAME">
    <input type="email" name="email" id="" placeholder="Email">
    <label for="timezone"></label>
    <select name="user_timezone" id="timezone" width="50px">
        <?php foreach($timezones as $timezone): ?>
            <option value="<?php echo $timezone ?>"><?php echo $timezone ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Create Account">
</form>
<button>Find User</button>
<div class="find hidden">
<form action="find-user.php" method="GET">
    <input type="text" name='id'>
    <input type="submit" value="Find">
</form>
</div>
<script>
    let findUserFormVisible = false;
    const btn = document.getElementsByTagName('button')[0];
    const addUserForm = document.querySelector('form[method="POST"]');
    const findUserForm = document.querySelector('.find');
    btn.addEventListener('click', () => {
        addUserForm.classList.toggle('hidden');
        findUserForm.classList.toggle('hidden');
        findUserFormVisible = !findUserFormVisible;

        btn.innerHTML = (findUserFormVisible) ? "Add User" : "Find User";
    })
</script>
</body>
</html>
