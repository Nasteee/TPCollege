<?php

namespace App;

use Manager\Classe_Manager;
use Manager\Cours_Manager;
use Manager\Eleve_Manager;
use Manager\Evaluation_Manager;
use Manager\Matiere_Manager;
use Manager\Professeur_Manager;
use Model\Professeur;
use PDO;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class Container
{
    private $pdo;
    private $twig;
    private $professeurManager;
    private $eleveManager;
    private $evaluationManager;
    private $matiereManager;
    private $coursManager;
    private $classeManager;
    private $classe;
    private $cours;
    private $eleve;
    private $evaluation;
    private $matiere;
    private $professeur;
    private $professeurCoursClasse;
    private $professeurEleveEvaluation;
    private $professeurMatiere;
    private array $parameters = [
        'db_host' => 'localhost',
        'db_port' => '3308',
        'db_name' => 'college',
        'db_user' => 'root',
        'db_password' => 'root',
        'root_dir' => __DIR__ . '/../../',
    ];

    public function getProfesseurManager(): Professeur_Manager
    {
        if ($this->professeurManager instanceof Professeur_Manager) {
            return $this->professeurManager;
        }

        $this->professeurManager = new Professeur_Manager($this->getPDO());

        return $this->professeurManager;
    }

    public function getEvaluationManager(): Evaluation_Manager
    {
        if ($this->evaluationManager instanceof Evaluation_Manager) {
            return $this->evaluationManager;
        }

        $this->evaluationManager = new Evaluation_Manager($this->getPDO());

        return $this->evaluationManager;
    }

    public function getEleveManager(): Eleve_Manager
    {
        if ($this->eleveManager instanceof Eleve_Manager) {
            return $this->eleveManager;
        }

        $this->eleveManager = new Eleve_Manager($this->getPDO());

        return $this->eleveManager;
    }

    public function getMatiereManager(): Matiere_Manager
    {
        if ($this->matiereManager instanceof Matiere_Manager) {
            return $this->matiereManager;
        }

        $this->matiereManager = new Matiere_Manager($this->getPDO());

        return $this->matiereManager;
    }

    public function getCoursManager(): Cours_Manager
    {
        if ($this->coursManager instanceof Cours_Manager) {
            return $this->coursManager;
        }

        $this->coursManager = new Cours_Manager($this->getPDO());

        return $this->coursManager;
    }

    public function getClasseManager(): Classe_Manager
    {
        if ($this->classeManager instanceof Classe_Manager) {
            return $this->classeManager;
        }

        $this->classeManager = new Classe_Manager($this->getPDO());

        return $this->classeManager;
    }



    public function getProfesseur(): Professeur
    {
        if ($this->professeur instanceof Professeur) {
            return $this->professeur;
        }

        $this->professeur = new Professeur($this->getPDO());

        return $this->professeur;
    }

    public function getParameter(string $key)
    {
        return $this->parameters[$key];
    }

    public function getPDO(): PDO
    {
        if ($this->pdo instanceof PDO) {
            return $this->pdo;
        }

        $this->pdo = new PDO("mysql:host=" . $this->getParameter('db_host') . ";port=".$this->getParameter('db_port').";dbname=" . $this->getParameter('db_name') . ";charset=utf8", $this->getParameter('db_user'), $this->getParameter('db_password'));

        return $this->pdo;
    }

    public function getTwig()
    {
        if ($this->twig instanceof Environment)
        {
            return $this->twig;
        }

        $loader = new FilesystemLoader($this->getParameter('root_dir') . "/templates");
        $this->twig = new Environment(
            $loader,
            [

            ]
        );

        return $this->twig;
    }


}