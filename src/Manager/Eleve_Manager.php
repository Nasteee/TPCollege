<?php

namespace Manager;

use Model\Eleve;
use Model\Professeur_Eleve_Evaluation;
use PDO;

class Eleve_Manager extends EntityManager

{
    public function getList() : array
    {
        $sql = "SELECT id, nom, prenom, date_naissance, adresse, email, telephone, id_Parrain, id_Classe FROM eleves";
        $r = $this->_db->query($sql);
        $eleves = [];
        foreach( $r as $value ){
            $eleve = new Eleve($value["id"], $value["nom"], $value["prenom"], $value["date_naissance"], $value["adresse"], $value["email"], $value["telephone"], $value["id_Parrain"], $value["id_Classe"] );
            array_push($eleves, $eleve);
        }
        return $eleves;

    }

    public function getEleve($id)
    {
        $sql = "SELECT * FROM eleves WHERE id = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();
        foreach($r as $value){
            $eleve = new Eleve ($value["id"], $value["nom"], $value["prenom"], $value["date_naissance"], $value["adresse"], $value["email"], $value["telephone"], $value["id_Parrain"], $value["id_Classe"]);
        }
        return $eleve;
    }

    public function getParrain($id)
    {
        $sql = "SELECT eleves.nom, eleves.prenom FROM eleves WHERE :id = eleves.id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();
        $parrain = $r->fetch(PDO::FETCH_ASSOC);

        if($parrain == null){
            return false;
        }
        return $parrain;
    }

    public function getClasse($id)
    {
        $sql = "SELECT classes.nom FROM classes WHERE classes.id = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();
        $classe = $r->fetch(PDO::FETCH_ASSOC);
        return $classe;
    }

        public function getInfoEval($id)
    {
        $sql = "SELECT * FROM professeurs_eleves_evaluations WHERE professeurs_eleves_evaluations.id_Eleve = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        $infoseval = [];
        while ($donnees = $r->fetch(PDO::FETCH_ASSOC))
        {
            $evaluation = new Professeur_Eleve_Evaluation ($donnees["id_Professeur"], $donnees["id_Eleve"], $donnees["id_Evaluation"], $donnees["date_Evaluation"], $donnees["note_Evaluation"]);
            array_push($infoseval, $evaluation);
        }

        if ($infoseval == null){
            return null;
        }

        return $infoseval;
    }






}