<?php
require '../vendor/autoload.php';


$container = new \App\Container();
$twig = $container->getTwig();
$evaluationManager = $container->getEvaluationManager();
$evaluation = $evaluationManager->getEvaluation($_GET['id']);
$cours = $evaluationManager->getCours($_GET['id']);

var_dump($cours);


echo $twig->render('infoseval.twig',
    [
        'evaluation' => $evaluation,
        'cours' => $cours,

    ]
);