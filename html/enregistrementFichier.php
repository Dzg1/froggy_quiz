<?php
//Dossier où est déplacé le fichier
$dossier ='doc/';
$nom_temporaire =$_FILES['fichier']['tmp_name'];
if( ! is_umploaded_file($nom_temporaire)) {
    exit("Le fichier est introuvable");
}
$nom_fichier = $_FILES['fichier']['name'];
if(move_uploaded_file($nom_temporaire, $dossier.$nom_fichier))
{
    header("location:http://localhost/fichier/doc/");
} else {
    exit("impossible de copier le fichier dans $dossier");
}
