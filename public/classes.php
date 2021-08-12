<?php
require '../vendor/autoload.php';


$container = new \App\Container();
$twig = $container->getTwig();
$classeManager = $container->getClasseManager();
$classes = $classeManager->getList();


echo $twig->render('classes.twig',
    [
        'classes' => $classes,
    ]
);