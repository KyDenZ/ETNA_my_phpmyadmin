<?php

if (isset($_POST['requestSQL'])) {
    try {

        $html = "";
        $pdo = Bdd::getInstance();
        $pdo->exec("USE my_phpmyadmin");
        $text = $pdo->quote($_POST['requestSQL'], PDO::PARAM_STR);
        $requete = $pdo->prepare($text);
        $requete->execute();
        foreach($requete->errorInfo() as $row)
            $html .= $row;

    } catch (Exception $e) {
        $html .= $e->getMessage();
    }
    echo $html;
}