<?php
ob_start();
?>

<section class="homepage">
    <h1>TOUDOU list</h1>
    <p>Todolist est la pour vous-aidez à vous souvenir de certaine chose.</p>
    <p>Avec Todilst vous pourrez créer des listes et leurs ajouter des taches.</p>
</section>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';
