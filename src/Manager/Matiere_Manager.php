<?php

namespace Manager;

use Model\Cours;
use Model\Matiere;
use PDO;

class Matiere_Manager extends EntityManager
{
        public function getList(){
            $sql = "SELECT * FROM matieres";
            $r = $this->_db->query($sql);
            $matieres = [];
            foreach ($r as $value){
                $matiere = new Matiere($value["id"], $value["nom"]);
                array_push($matieres, $matiere);
            }

            return $matieres;
        }

    public function getMatiere($id) : Matiere
    {
        $sql = "SELECT * FROM matieres WHERE id = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();
        foreach($r as $value){
            $matiere = new Matiere($value["id"], $value["nom"]);
        }

        return $matiere;
    }

    public function getCours($id) : array
    {
        $sql = "SELECT cours.nom FROM cours WHERE cours.id_Matiere = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        $mescours = [];
        foreach($r as $value){
            $cours = $value["nom"];
            array_push($mescours, $cours);
        }

        return $mescours;
    }

        public function getProf($id) : array
    {
        $sql = "SELECT professeurs.nom, professeurs.prenom 
                FROM professeurs_matieres, professeurs 
                WHERE professeurs_matieres.id_Matiere = :id AND professeurs_matieres.id_Professeur = professeurs.id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        $idprofs = [];
        foreach($r as $value){
            $idprof = [$value["nom"], $value["prenom"]];
            array_push($idprofs, $idprof);
        }


        return $idprofs;
    }






}