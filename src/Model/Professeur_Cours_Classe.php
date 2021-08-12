<?php


namespace Model;


class Professeur_Cours_Classe
{
    private int $_idProfesseur;
    private int $_idCours;
    private int $_idClasse;
    private string $_date;


    public function __construct(int $idProfesseur, int $idCours, int $idClasse, string $date)
    {
        $this->_idProfesseur = $idProfesseur;
        $this->_idCours = $idCours;
        $this->_idClasse = $idClasse;
        $this->_date = $date;
    }


    public function getIdProfesseur(): int
    {
        return $this->_idProfesseur;
    }


    public function setIdProfesseur(int $idProfesseur): void
    {
        $this->_idProfesseur = $idProfesseur;
    }


    public function getIdCours(): int
    {
        return $this->_idCours;
    }


    public function setIdCours(int $idCours): void
    {
        $this->_idCours = $idCours;
    }


    public function getIdClasse(): int
    {
        return $this->_idClasse;
    }



    public function setIdClasse(int $idClasse): void
    {
        $this->_idClasse = $idClasse;
    }



    public function getDate(): string
    {
        return $this->_date;
    }


    public function setDate(string $date): void
    {
        $this->_date = $date;
    }



}