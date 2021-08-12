<?php

namespace Manager;


use Model\Cours;
use Model\Professeur;
use PDO;

class Cours_Manager extends EntityManager

{
    public function getList(): array
    {
        $sql = "SELECT * 
                FROM cours";
        $r = $this->_db->query($sql);
        $cours = [];
        foreach ($r as $value) {
            $mescours = new Cours($value["id"], $value["niveau"],$value["nom"],$value["id_Matiere"],);
            array_push($cours, $mescours);
        }
        return $cours;
    }

    public function getCours($id) : Cours
    {
        $sql = "SELECT * 
                FROM cours 
                WHERE id = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        foreach($r as $value){
            $cours = new Cours($value["id"], $value["niveau"],$value["nom"],$value["id_Matiere"],);
        }

        return $cours;
    }

    public function getMatiere($id){
        $sql = "SELECT matieres.nom 
                FROM matieres, cours
                WHERE cours.id_Matiere = matieres.id
                AND cours.id = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        $matiere = $r->fetch(PDO::FETCH_ASSOC);

        return $matiere;

    }

    public function getEnseigner($id){
        $sql = "SELECT professeurs.nom, professeurs.prenom, classes.nom AS classenom
                FROM professeurs, classes, professeurs_cours_classes
                WHERE professeurs_cours_classes.id_Cours = :id
                AND professeurs_cours_classes.id_Professeur = professeurs.id
                AND professeurs_cours_classes.id_Classe = classes.id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        $profsClasses = [];
        foreach ($r as $value) {
            $profClasse = [$value["nom"], $value["prenom"],$value["classenom"]];
            array_push($profsClasses, $profClasse);
        }
        return $profsClasses;

    }

    public function getEvaluation($id){

        $sql = "SELECT evaluations.nom
                FROM evaluations
                WHERE evaluations.id_Cours = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        $evaluations = [];
        foreach ($r as $value) {
            $evaluation = $value["nom"];
            array_push($evaluations, $evaluation);
        }
        return $evaluations;

    }
}