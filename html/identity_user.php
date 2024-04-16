<?php
$isPage = "identityUser";
include('../partials/header.php');
?>
<link rel="stylesheet" href="../styles/identity_login.css" />

<div class="main-identity">

    <div class="carte-identity">

        <div class="top-identity">
            <img src="../assets/images/logo-text-noir.png">
            <h1 class="identity">FROGGY QUIZ IDENTITE</h1>
        </div>
        <div class="midle-top-identity">
            <h2>CARTE IDENTITE N° : "PHP - N° ID USER"</h2>
            <h3 class="h3identity">FROGGY QUIZ</h3>

        </div>
        <div class="midle-identity">
            <div class="avatar-identity">
                <img class="photo-identity" src="../assets/photos/user_male_portrait.png" alt="photo_avatar">
            </div>
            <div class="info-identity">
                <p>Pseudo : "$userNickname"</p>
                <p>Nom : "$userName"</p>
                <p>Prénom : "$userFirstName"</p>
                <p>Date d'inscription : "$userDateTime"</p>
                <p>Classement : "$userClassement" </p>

            </div>


        </div>
        <div class="bottom-identity">
            <a class="ahref" href="#"><<<<<<<<<<<--modifier mon profil-->>>>>>>>>>>>></a>

        </div>

    </div>


</div>




<?php
include('../partials/footer.php');
?>