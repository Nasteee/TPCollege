<?php
require '../vendor/autoload.php';


$container = new \App\Container();
$twig = $container->getTwig();
$classeManager = $container->getClasseManager();
$professeurManager = $container->getProfesseurManager();

$classe = $classeManager->getClasse($_GET['id']);
$professeur = $professeurManager->getProf($classe->getIdProfesseur());
$eleves = $classeManager->getEleves($_GET['id']);
$cours = $classeManager->getCours($_GET['id']);


echo $twig->render('infosclasse.twig',
    [
        'classe' => $classe,
        'professeur' => $professeur,
        'eleves' => $eleves,
        'cours' => $cours,
    ]
);