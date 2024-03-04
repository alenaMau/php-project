<?php

use Src\Route;

?>

<section class="services">
    <div class="form_auth">
    <h3><?= $message ?? ''; ?></h3>
    <span class="form_title-span">Добавление абонента</span>
        <form method="post">
            <label>
                <span class="form_title">Имя</span>
                <input type="text" class="form_input" placeholder="Имя" name="name">
                <span class="form_title">Фамилия</span>
                <input type="text" class="form_input" placeholder="Фамилия" name="surname">
                <span class="form_title">Отчество</span>
                <input type="text" class="form_input" placeholder="Отчество" name="patronymic">
                <span class="form_title">Дата рождения</span>
                <input type="text" class="form_input" placeholder="Дата рождения" name="date_of_birth">
                <span class="form_title">Подразделение</span>
                <select id="cities" class="form_input" name="id_subdivision">
                    <?php foreach($subdivisions as $sub): ?>
                        <option value="<?= $sub->id ?>"><?= $sub->name ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" class="form_bth" Добавить>
            </label>
        </form>
    </div>
    <div class="btn_other">
    <a class="btn" method="post" href="<?= Route::getUri('attach_number') ?>">Прикрепить номер</a>
    </div>
</section>
