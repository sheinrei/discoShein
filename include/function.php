<?php
function nomMusique($nom)
{
    $explo = (explode(':', $nom));
    $result =  $explo[0];
    return $result;
}