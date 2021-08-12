<?php
require '../vendor/autoload.php';


$container = new \App\Container();
$twig = $container->getTwig();
$evaluationManager = $container->getEvaluationManager();
$mesevaluations = $evaluationManager->getList();


echo $twig->render('evaluations.twig',
    [
        'evaluations' => $mesevaluations,
    ]
);