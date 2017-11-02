<?php
if (strlen($billet->getContenu()) <= 200)
{
    $contenu = $billet->getContenu();
}

else
{
    $contenu = substr($billet->getContenu(), 0, 100);
}
echo nl2br($contenu), '...';
?>

