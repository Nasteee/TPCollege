<?php


namespace Model;


class Evaluation
{
    private int $_id;
    private string $_nom;
    private int $_idCours;

    public function __construct(int $id, string $nom, int $idCours)
    {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_idCours = $idCours;
    }

    public function getId(): int
    {
        return $this->_id;
    }


    public function setId(int $id): void
    {
        $this->_id = $id;
    }


    public function getNom(): string
    {
        return $this->_nom;
    }


    public function setNom(string $nom): void
    {
        $this->_nom = $nom;
    }


    public function getIdCours(): int
    {
        return $this->_idCours;
    }


    public function setIdCours(int $idCours): void
    {
        $this->_idCours = $idCours;
    }





}