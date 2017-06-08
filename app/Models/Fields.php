<?php

namespace Models;

use Lib\Bdd;

class Fields
{

    public $name;
    public $bdname;
    public $bdTable;
    public $type;
    public $valeurDefault;
    public $null;

    public function __construct($name = null, $bdname = null, $bdTable = null, $type = null, $valeurDefault = null, $null = null)
    {
        $this->name = $name;
        $this->bdname = $bdname;
        $this->bdTable = $bdTable;
        $this->type = $type;
        $this->valeurDefault = $valeurDefault;
        $this->null = $this->checkNull($null);
    }

    public function checkNull($null) : string{
        if ($_POST["null"] == "on")
            return "NULL";
        else
            return "NOT NULL";
    }

    public function updateField($newName = null)
    {
        $newName = $newName ? $newName : $this->name;
        $pdo = Bdd::getInstance();
        $pdo->exec("USE " . $this->bdname);
        if ($this->getType() == "LONGTEXT")
            $end = "CHARACTER";
        else if ($this->getType() == "VARCHAR")
            $end = "UNSIGNED NOT NULL AUTO_INCREMENT";
        else if ($this->getType() == "INT")
            $end = "UNSIGNED NOT NULL AUTO_INCREMENT";
        $requete = $pdo->prepare('ALTER TABLE ' . $this->bdTable . ' CHANGE ' . $this->name . ' ' . $newName . ' ' . $this->type . ' ' . $end . ';');
        var_dump($requete);
        $requete->execute();
    }

    public function getType(): string
    {
        $rslt = null;
        if (preg_match_all('/[a-zA-Z]+/', $this->type, $matches, PREG_SET_ORDER, 0) && strtoupper($matches[0][0]) == "LONGTEXT")
            $rslt = "LONGTEXT";
        else if (preg_match_all('/[a-zA-Z]+/', $this->type, $matches, PREG_SET_ORDER, 0) && strtoupper($matches[0][0]) == "VARCHAR")
            $rslt = "VARCHAR";
        else if (preg_match_all('/[a-zA-Z]+/', $this->type, $matches, PREG_SET_ORDER, 0) && strtoupper($matches[0][0]) == "INT")
            $rslt = "INT";
        var_dump($matches[0][0]);
        return $rslt;
    }

    public function getFields($name = null)
    {
        $pdo = Bdd::getInstance();
        $pdo->exec("USE " . $this->bdname);
        $requete = $pdo->prepare('SHOW COLUMNS FROM ' . $this->name);
        $requete->execute();
        return $requete->fetchAll();
    }

}

// ALTER TABLE author_tweet CHANGE id_author_tweet id_author_tweet int(11) SET latin1 COLLATE latin1_swedish_ci NO
// ALTER TABLE `author_tweet` CHANGE `id_author_tweet` `id_author_tweet` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;