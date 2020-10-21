<?php
require_once __DIR__.'../../boostrap.php';
use App\Manager\CommentaireManager;

$signalManager = new CommentaireManager();
$signalManager->signal($_GET['id']);

header('location: ../vue/public/homepage.php');
