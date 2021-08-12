<?php


namespace Model;


class Professeur_Eleve_Evaluation
{
    private int $_idProfesseur;
    private int $_idEleve;
    private int $_idEvaluation;
    private string $_dateEvaluation;
    private int $_noteEvaluation;


    public function __construct(int $idProfesseur, int $idEleve, int $idEvaluation, string $dateEvaluation, int $noteEvaluation)
    {
        $this->_idProfesseur = $idProfesseur;
        $this->_idEleve = $idEleve;
        $this->_idEvaluation = $idEvaluation;
        $this->_dateEvaluation = $dateEvaluation;
        $this->_noteEvaluation = $noteEvaluation;
    }

    public function getNoteEvaluation(): int
    {
        return $this->_noteEvaluation;
    }


    public function setNoteEvaluation(int $noteEvaluation): void
    {
        $this->_noteEvaluation = $noteEvaluation;
    }


    public function getIdProfesseur(): int
    {
        return $this->_idProfesseur;
    }


    public function setIdProfesseur(int $idProfesseur): void
    {
        $this->_idProfesseur = $idProfesseur;
    }


    public function getIdEleve(): int
    {
        return $this->_idEleve;
    }


    public function setIdEleve(int $idEleve): void
    {
        $this->_idEleve = $idEleve;
    }


    public function getIdEvaluation(): int
    {
        return $this->_idEvaluation;
    }


    public function setIdEvaluation(int $idEvaluation): void
    {
        $this->_idEvaluation = $idEvaluation;
    }


    public function getDateEvaluation(): string
    {
        return $this->_dateEvaluation;
    }


    public function setDateEvaluation(string $dateEvaluation): void
    {
        $this->_dateEvaluation = $dateEvaluation;
    }

}