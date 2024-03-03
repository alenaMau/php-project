<?php

use Src\Route;

?>

<a class="url-logout" href="<?= Route::getUri('logout') ?>">Выйти с Учётной записи</a>
<section class="auth">
    <a class="btn" href="<?= Route::getUri('abonent') ?>">Добавление абонента</a>
    <a class="btn" href="<?= Route::getUri('rooms') ?>">Добавление помещения</a>
    <a class="btn" href="<?= Route::getUri('subdivision') ?>">Добавление подразделения</a>
    <a class="btn" href="<?= Route::getUri('phone') ?>">Добавление телефона</a>
    <a class="btn" method="post" href="<?= Route::getUri('') ?>">Выбрать все абоненты</a>
    <h3><?= $message ?? ''; ?></h3>
    <!-- <?php foreach($abonents as $abonent): ?>
                        <p value="<?= $abonent->id ?>"><?= $abonent->name ?></p>
                        <p value="<?= $abonent->id ?>"><?= $abonent->surname ?></p>
                        <p value="<?= $abonent->id ?>"><?= $abonent->patronymic ?></p>
                        <p value="<?= $abonent->id ?>"><?= $abonent->date_of_birth ?></p>
                        <p value="<?= $abonent->id ?>"><?= $abonent->id_subdivision ?></p>
                        <pre>
    <?php endforeach; ?> -->
</section>