<?php
require '../vendor/autoload.php';


$container = new \App\Container();

$professeurManager = $container->getProfesseurManager();
$monprof = $professeurManager->getProf($_GET["id"]);
$mesclasses = $professeurManager->getClasse($_GET["id"]);
$mesmatieres = $professeurManager->getMatiere($_GET["id"]);

$twig = $container->getTwig();


echo $twig->render('infosprof.twig',
    [
       'professeur' => $monprof,
        'classe' => $mesclasses,
        'matiere' => $mesmatieres,
    ]
);