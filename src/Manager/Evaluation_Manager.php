<?php

namespace Manager;


use PDO;
use Model\Evaluation;

class Evaluation_Manager extends EntityManager
{
    public function getEvaluation($id) : Evaluation
    {
        $sql = "SELECT * FROM evaluations WHERE evaluations.id = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        foreach($r as $value){
            $evaluation = new Evaluation($value["id"], $value["nom"], $value["id_Cours"]);
        }

        return $evaluation;
    }

    public function getList() : array
    {
        $sql = "SELECT * 
                FROM evaluations";
        $r = $this->_db->query($sql);
        $evaluations = [];
        foreach( $r as $value ){
            $evaluation = new Evaluation($value["id"], $value["nom"], $value["id_Cours"]);
            array_push($evaluations, $evaluation);
        }
        return $evaluations;

    }

    public function getCours($id)
    {
        $sql = "SELECT cours.nom 
                FROM cours, evaluations
                WHERE evaluations.id_Cours = cours.id
                AND evaluations.id = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        $cours = $r->fetch(PDO::FETCH_ASSOC);

        return $cours;
    }


}