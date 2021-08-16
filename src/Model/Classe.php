<?php

namespace Model;

class Classe
{
    private int $_id;
    private string $_niveau;
    private string $_nom;
    private int $_idProfesseur;


    public function __construct(int $id, string $niveau, string $nom, int $idProfesseur)
    {
        $this->_id = $id;
        $this->_niveau = $niveau;
        $this->_nom = $nom;
        $this->_idProfesseur = $idProfesseur;
    }


    public function getId(): int
    {
        return $this->_id;
    }


    public function setId(int $id): void
    {
        $this->_id = $id;
    }


    public function getNiveau(): string
    {
        return $this->_niveau;
    }


    public function setNiveau(string $niveau): void
    {
        $this->_niveau = $niveau;
    }


    public function getNom(): string
    {
        return $this->_nom;
    }


    public function setNom(string $nom): void
    {
        $this->_nom = $nom;
    }


    public function getIdProfesseur(): int
    {
        return $this->_idProfesseur;
    }


    public function setIdProfesseur(int $idProfesseur): void
    {
        $this->_idProfesseur = $idProfesseur;
    }



}