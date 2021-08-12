<?php

namespace Manager;

use Model\Classe;
use PDO;


class Classe_Manager extends EntityManager
{
    public function getList(): array
    {
        $sql = "SELECT * 
                FROM classes";
        $r = $this->_db->query($sql);
        $classes = [];
        foreach ($r as $value) {
            $classe = new Classe($value["id"], $value["niveau"],$value["nom"],$value["id_Professeur"],);
            array_push($classes, $classe);
        }
        return $classes;
    }

    public function getClasse($id) : Classe
    {
        $sql = "SELECT * 
                FROM classes 
                WHERE id = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        foreach($r as $value){
            $classe = new Classe($value["id"], $value["niveau"],$value["nom"],$value["id_Professeur"],);
        }

        return $classe;
    }

    public function getEleves($id) : array
    {
        $sql = "SELECT eleves.nom, eleves.prenom 
                FROM eleves
                WHERE eleves.id_Classe = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        $eleves = [];
        foreach($r as $value){
            $eleve = [$value["nom"],$value["prenom"]];
            array_push($eleves, $eleve);
        }

        return $eleves;
    }

    public function getCours($id) : array
    {
        $sql = "SELECT cours.nom AS coursnom, professeurs.nom AS profnom, professeurs.prenom AS profprenom
                FROM professeurs, cours, professeurs_cours_classes
                WHERE professeurs_cours_classes.id_Classe = :id
                AND professeurs_cours_classes.id_Cours = cours.id
                AND professeurs_cours_classes.id_Professeur = professeurs.id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        $cours = [];
        foreach($r as $value){
            $moncour = [$value["coursnom"],$value["profnom"],$value["profprenom"]];
            array_push($cours, $moncour);
        }

        return $cours;
    }


}