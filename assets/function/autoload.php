<?php

function __autoload($class_name) {
    $class_name = "assets/Classes/" . $class_name . ".php";
    //var_dump($class_name);
    if (!file_exists($class_name)) {
        throw new Exception("Patch de Arquivo: '{$class_name}' Não Encontrado");
    }

    require_once ($class_name);
}

?>