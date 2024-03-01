<?php

use Src\Route;

?>

<a class="url-logout" href="<?= Route::getUri('logout') ?>">Выйти</a>

<section class="auth">
    <a class="btn" href="<?= Route::getUri('manager_form') ?>">Добавление абонента</a>
</section>