<?php
require '../vendor/autoload.php';


$container = new \App\Container();
$twig = $container->getTwig();
$evaluationManager = $container->getEvaluationManager();
$evaluation = $evaluationManager->getEvaluation($_GET['id']);
$cours = $evaluationManager->getCours($_GET['id']);



echo $twig->render('infoseval.twig',
    [
        'evaluation' => $evaluation,
        'cours' => $cours,

    ]
);