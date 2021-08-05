<?php
if (isset($_POST["request"])) {
    $request = $_POST["rq"];
    switch ($request) {
        case 'create':
            require_once 'Create.php';
            $loadClass = new Create();
            echo $loadClass->createTask();
            break;
        case 'read':
            require_once 'Read.php';
            $loadClass = new Read();
            echo $loadClass->read();
            break;
        case 'update':
            require_once 'Update.php';
            $loadClass = new Update();
            echo $loadClass->update();
            break;
        case 'delete':
            require_once 'Delete.php';
            $loadClass = new Delete();
            echo $loadClass->delete();
            break;
    }
}
