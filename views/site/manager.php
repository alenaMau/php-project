<?php

?>

<a class="url-logout" href="<?= app()->route->getUrl('logout') ?>">Выйти</a>

<section class="auth">
    <a class="btn" href="<?= app()->route->getUrl('manager_form') ?>">Добавление системного администратора</a>
</section>