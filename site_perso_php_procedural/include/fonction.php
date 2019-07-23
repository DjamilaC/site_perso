<?php
// -------------FONCTION MEMBRE-------------------//
function internauteEstConnecte()// cette fonction indique si le membre est connecté
{
    if(!isset($_SESSION['membre']))// si l'indice membre n'est pas définit dans la session, cela veut dire que l'internaute n'est pas passé par la page connexion, donc n'est pas connecté
    {
        return false;
    }
    else// sinon l'indice 'membre est d"finit, on retourne true
    {
        return true;
    }
}

//----------FUNCTION ADMIN---------------
function internauteEstConnecteEstAdmin()
{
    if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1)
    {
        return true;
    }
    else
    { 
        
        return false;
    }

}
?>