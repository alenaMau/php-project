<?php

use Src\Route;

?>

<a class="url-logout" href="<?= Route::getUri('logout') ?>">Выйти с Учётной записи</a>
<section class="auth">
    <a class="btn" href="<?= Route::getUri('abonent') ?>">Добавление абонента</a>
    <a class="btn" href="<?= Route::getUri('rooms') ?>">Добавление помещения</a>
    <a class="btn" href="<?= Route::getUri('subdivision') ?>">Добавление подразделения</a>
    <a class="btn" href="<?= Route::getUri('phone') ?>">Добавление телефона</a>
    <a class="btn" method="post" href="<?= Route::getUri('attach_number') ?>">Выбрать все абоненты</a>
</section>