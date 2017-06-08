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
        if ($null == "on" || $null == "YES")
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
            $end = "CHARACTER SET latin1 COLLATE latin1_swedish_ci ". checkNull($this->null) ." DEFAULT ". $this->valeurDefault;
        else if ($this->getType() == "VARCHAR")
            $end = "UNSIGNED " . checkNull($this->null);
        else if ($this->getType() == "INT")
            $end = "UNSIGNED " . checkNull($this->null);
        $requete = $pdo->prepare('ALTER TABLE ' . $this->bdTable . ' CHANGE ' . $newName . ' ' . $this->name . ' ' . $this->type . ' ' . $end . ';');
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

// ALTER TABLE `author_tweet` CHANGE `tweet_author_id2` `tweet_author_id` LONGTEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

