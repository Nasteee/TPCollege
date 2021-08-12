<?php
require '../vendor/autoload.php';


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


if ($infosEval == null)
{
    $infos = "Non";

    echo $twig->render('infoseleve.twig',
        [
            'eleve' => $monEleve,
            'parrain' => $monParrain,
            'classe' => $maClasse,
            'infos' => $infos,
        ]
    );
}
else
{
    $infos = "Oui";
    $evaluations = [];
    $professeurs = [];

foreach ($infosEval as $value)
{
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
            'infos' => $infos,
        ]
    );
}


