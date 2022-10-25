<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Administrate</title>
        <style>span { margin: 10px; }</style>
    </head>
    <body>
        <h1>List of users</h1>
        <?php
            const
            host = 'db',
            users = 'users',
            name = 'name',
            dbUser = 'mqsql',
            password = '123456',
            db = 'app_db',
            menu = 'menu',
            id = 'ID',
            description = 'description',
            price = 'price';
    
            function openMysqli(): mysqli { return new mysqli(
                host, dbUser, password, db
            ); }
            
            $mysqli = openMysqli();
            $users = $mysqli->query('select * from ' . users);
        ?>
        <div style="
            display: flex;
            flex-direction: column;
        "><?php foreach ($users as $user) { echo <<<A
            <div style="
                display: flex;
                flex-direction: row;
            ">
                <span>{$user[id]}</span><span>{$user[name]}</span><span>{$user[password]}</span>
            </div>
        A; } ?></div>
        <?php $mysqli->close(); ?>
    </body>
</html>