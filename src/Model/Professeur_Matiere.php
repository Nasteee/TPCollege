<?php


namespace Model;


class Professeur_Matiere
{
    private int $idProfesseur;
    private int $idMatiere;


    public function getIdProfesseur(): int
    {
        return $this->idProfesseur;
    }


    public function setIdProfesseur(int $idProfesseur): void
    {
        $this->idProfesseur = $idProfesseur;
    }


    public function getIdMatiere(): int
    {
        return $this->idMatiere;
    }


    public function setIdMatiere(int $idMatiere): void
    {
        $this->idMatiere = $idMatiere;
    }


    public function __construct(int $idProfesseur, int $idMatiere)
    {
        $this->idProfesseur = $idProfesseur;
        $this->idMatiere = $idMatiere;
    }

}