<?php
require '../vendor/autoload.php';


$container = new \App\Container();
$twig = $container->getTwig();
$matiereManager = $container->getMatiereManager();
$matiere = $matiereManager->getMatiere($_GET['id']);
$cours = $matiereManager->getCours($_GET['id']);
$idProfs = $matiereManager->getProf($_GET['id']);


echo $twig->render('infosmatiere.twig',
    [
        'matiere' => $matiere,
        'cours' => $cours,
        'profs' => $idProfs,


    ]
);
