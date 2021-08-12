<?php
require '../vendor/autoload.php';


$container = new \App\Container();
$twig = $container->getTwig();

$coursManager = $container->getCoursManager();
$moncours = $coursManager->getCours($_GET['id']);
$matiere = $coursManager->getMatiere($_GET['id']);
$profsClasses = $coursManager->getEnseigner($_GET['id']);
$evaluations = $coursManager->getEvaluation($_GET['id']);

var_dump($evaluations);



echo $twig->render('infoscours.twig',
    [
        'moncours' => $moncours,
        'matiere' => $matiere,
        'profsClasses' => $profsClasses,
        'evaluations' => $evaluations,

    ]
);