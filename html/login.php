<?php
$isPage="login";
include('../partials/header.php');
?>

<main>

    <section class="contact">

        <form class="contact-form">

            <h2>Connexion</h2>

            <div class="label-input">
                <label for="nickName">Pseudo Frog:</label>
                <input type="text" id="nickName" name="nickName" placeholder="Saisissez votre pseudo...">
            </div>

            <div class="label-input">
                <label for="password">Froggy Pass:</label>
                <input type="text" id="password" name="password" placeholder="Saisissez un mot de pass...">
            </div>
            <div class="submit">
                <input type="submit" value="Connexion">
            </div>

        </form>
        <div class="to-register">
            <a href="./register.php">Creer un compte.</a>
        </div>
    </section>




</main>








<?php
include('../partials/footer.php')
?>
