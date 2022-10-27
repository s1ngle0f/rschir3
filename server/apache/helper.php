<?php
    const
        host = 'db',
        users = 'users',
        name = 'name',
        dbUser = 'mysql',
        password = '123456',
        db = 'app_db',
        catalogue = 'catalogue',
        id = 'ID',
        description = 'description',
        price = 'price';

    function openMysqli(): mysqli { return new mysqli(
        host, dbUser, password, db
    ); }
?>