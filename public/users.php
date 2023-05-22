<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of All users</title>

    <style>
        table, th, td {
            border: 1px solid;
            border-collapse: collapse;
            padding: 8px;
            text-align: center;
        }

    </style>
</head>
<body>
        <?php

            use App\Models\UserRepository;
            use Symfony\Component\VarDumper\VarDumper;

            require_once __DIR__ . '/../vendor/autoload.php';

            $repo = new UserRepository();

            $users = $repo->getAllUser();
        ?>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>User Local Time</th>
                <th>Account Age</th>
                <th>Account Active</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo $user->id ?></td>
                        <td><?php echo $user->name ?></td>
                        <td><?php echo $user->getLocalTime()?></td>
                        <td><?php echo $user->getAccountAge()?></td>
                        <td><?php echo $user->isActive() ? 'YES' : 'NO' ?></td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>