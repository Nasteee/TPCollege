<?php


namespace Model;


class Matiere
{
    private int $_id;
    private string $_nom;


    public function __construct(int $id, string $nom)
    {
        $this->_id = $id;
        $this->_nom = $nom;
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


}