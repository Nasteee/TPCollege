<?php
require '../vendor/autoload.php';

use View\EleveView;
use View\EvaluationView;
use View\ProfessorView;

$container = new \App\Container();
$twig = $container->getTwig();
$eleveManager = $container->getEleveManager();
$evaluationManager = $container->getEvaluationManager();
$professeurManager = $container->getProfesseurManager();

// Recupération de mon entité élève
$monEleve = $eleveManager->getEleve($_GET["id"]);

// Recupération du parrain de l'élève
$monParrain = $eleveManager->getParrain($monEleve->getIdParrain());

// Récupération de la classe de l'élève
$maClasse = $eleveManager->getClasse($monEleve->getIdClasse());

// Récupération des informations des évaluations de l'élève
$infosEval = $eleveManager->getInfoEval($_GET["id"]);

$eleveView = new EleveView();
$eleveView->nom = $monEleve->getNom();
$eleveView->prenom = $monEleve->getPrenom();
$eleveView->email = $monEleve->getEmail();

foreach ($infosEval as $value) {

    //Récupération du nom de l'évaluation
    $evaluation    = $evaluationManager->getEvaluation($value->getIdEvaluation());
    $nomEvaluation = $evaluation->getNom();

    //Récupération du nom du professeur
    $professeur       = $professeurManager->getProf($value->getIdProfesseur());
    $nomProfesseur    = $professeur->getNom();
    $prenomProfesseur = $professeur->getPrenom();

    $evaluation        = new EvaluationView();
    $evaluation->date  = $value->getDateEvaluation();
    $evaluation->note  = $value->getNoteEvaluation();
    $evaluation->label = $nomEvaluation;

    $professor         = new ProfessorView();
    $professor->prenom = $prenomProfesseur;
    $professor->nom    = $nomProfesseur;

    $evaluation->professor = $professor;

    $eleveView->evaluations[] = $evaluation;
}





echo $twig->render('infoseleve.twig',
    [
        'eleve' => $eleveView,
        'parrain' => $monParrain,
        'classe' => $maClasse,
        'infosEvals' => $infosEval
    ]
);

die;

if ($infosEval == null)
{
    echo $twig->render('infoseleve.twig',
        [
            'eleve' => $monEleve,
            'parrain' => $monParrain,
            'classe' => $maClasse,
        ]
    );
} else {

    $evaluations = [];
    $professeurs = [];

    foreach ($infosEval as $value) {
        //Récupération du nom de l'évaluation
        $evaluation = $evaluationManager->getEvaluation($value->getIdEvaluation());
        $nomEvaluation = $evaluation->getNom();

        //Récupération du nom du professeur
        $professeur = $professeurManager->getProf($value->getIdProfesseur());
        $nomProfesseur = $professeur->getNom();
        $prenomProfesseur = $professeur->getPrenom();

        // Ajout de toutes les données en tableau séparé
        array_push($evaluations, ['nomProf' => $nomProfesseur,'prenomProf' => $prenomProfesseur, 'nomEval' => $nomEvaluation, 'date' => $value->getDateEvaluation(), 'note' => $value->getNoteEvaluation() ]);
    }

    echo $twig->render('infoseleve.twig',
        [
            'eleve' => $monEleve,
            'parrain' => $monParrain,
            'classe' => $maClasse,
            'infosEvals' => $infosEval,
            'evaluations' => $evaluations,
            'professeurs' => $professeurs,

        ]
    );
}


