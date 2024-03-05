<?php


?>

<section class="services">
<h3><?= $message ?? ''; ?></h3>
    <div class="form_auth">
    <span class="form_title-span">Добавление помещения</span>
        <form method="post">
            <label>
                <span class="form_title">Номер или название</span>
                <input type="text" class="form_input" placeholder="Номер или название" name="name">
                <span class="form_title">Вид</span>
                <select class="form_input" name="type_of_room">
                    <?php foreach($type_of_rooms as $type_of_room): ?>
                        <option value="<?= $type_of_room->id ?>"><?= $type_of_room->type?></option>
                    <?php endforeach; ?>
                </select>
                <span class="form_title">Подразделение</span>
                <select class="form_input" name="id_subdivision">
                    <?php foreach($subdivisions as $sub): ?>
                        <option value="<?= $sub->id ?>"><?= $sub->name ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" class="form_bth" Добавить>
            </label>
        </form>
    </div>
    <div class="btn_other">
        <button class="btn">Количество абонентов</button>
    </div>
</section>
