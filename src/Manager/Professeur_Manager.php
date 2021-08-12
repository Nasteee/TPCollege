<?php
namespace Manager;


use Model\Professeur;
use PDO;

class Professeur_Manager extends EntityManager
{

    public function add(Professeur $professeur){
        $sql = "INSERT INTO professeurs (nom, prenom, date_naissance, adresse, email, telephone, dateEntre) 
                VALUES (:nom, :prenom, :date_naissance, :adresse, :email, :telephone, :dateEntre)";

        $r = $this->_pdo->prepare($sql);

        $nom = $professeur->getNom();
        $prenom = $professeur->getPrenom();
        $date_naissance = $professeur->getDateNaissance();

    }


    public function getList() : array
    {
        $sql = "SELECT id, nom, prenom, date_naissance, adresse, email, telephone, date_entre, CONCAT(TIMESTAMPDIFF(YEAR, date_naissance, CURRENT_DATE), ' ans') AS AGE 
                FROM professeurs";
        $r = $this->_db->query($sql);
        $professeurs = [];
        foreach( $r as $value ){
            $professeur = new Professeur($value["id"], $value["nom"], $value["prenom"], $value["date_naissance"], $value["adresse"], $value["email"], $value["telephone"], $value["date_entre"], $value["AGE"] );
            array_push($professeurs, $professeur);
        }
        return $professeurs;

    }

    public function getProf($id) : Professeur
    {
        $sql = "SELECT id, nom, prenom, date_naissance, adresse, email, telephone, date_entre, CONCAT(TIMESTAMPDIFF(YEAR, date_naissance, CURRENT_DATE), ' ans') AS AGE 
                FROM professeurs 
                WHERE id = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();
        foreach($r as $value){
            $professeur = new Professeur($value["id"], $value["nom"], $value["prenom"], $value["date_naissance"], $value["adresse"], $value["email"], $value["telephone"], $value["date_entre"], $value["AGE"]);
        }

        return $professeur;
    }

    public function getClasse(int $id)
    {

        $sql = "SELECT niveau, nom 
                FROM classes 
                WHERE id_Professeur = :id";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        $mesclasses = [];
        $mesclasses = $r->fetch(PDO::FETCH_ASSOC);

        if (isset($mesclasses)){
            return $mesclasses;
        }
    }

    public function getMatiere(int $id) : array
    {

        $sql = "SELECT matieres.nom 
                FROM professeurs_matieres, matieres 
                WHERE professeurs_matieres.id_Professeur = :id AND matieres.id = professeurs_matieres.id_Matiere";
        $r = $this->_db->prepare($sql);
        $r->bindValue(":id", $id, PDO::PARAM_INT);
        $r->execute();

        $mesmatieres = [];

        while ($donnees = $r->fetch(PDO::FETCH_ASSOC)){
//            $mesmatieres[] = $r->fetch(PDO::FETCH_ASSOC);
            array_push($mesmatieres, $donnees);
        }


        return $mesmatieres;
    }



}