<?php
if (isset($_POST["request"])) {
    $request = $_POST["request"];
    switch ($request) {
        case 'create':
            require_once 'Create.php';
            $loadClass = new Create();
            echo $loadClass->createTask();
            break;
        case 'update':
            require_once 'Update.php';
            $loadClass = new Update();
            if(isset($_POST['finalizado'])){
                echo $loadClass->finalizar();
            }else{
                echo $loadClass->update();
            }
            break;
        case 'delete':
            require_once 'Delete.php';
            $loadClass = new Delete();
            echo $loadClass->delete();
            break;
    }
}
