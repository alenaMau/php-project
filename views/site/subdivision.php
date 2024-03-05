<?php

?>
<a href="#" onclick="history.back();return false;" class="history-back">Вернуться назад</a>

<section class="services">
    <div class="form_auth">
    <h3><?= $message ?? ''; ?></h3>
        <span class="form_title-span">Добавление подразделения</span>
        <form method="post">
            <label>
                <span class="form_title">Номер или название</span>
                <input type="text" class="form_input" placeholder="Номер или название" name="name">
                <span class="form_title">Вид</span>
                <select class="form_input" name="type_of_unit">
                    <?php foreach ($type_of_units as $type_of_unit): ?>
                        <option value="<?= $type_of_unit->id ?>">
                            <?= $type_of_unit->type ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" class="form_bth" Добавить>
            </label>
        </form>
    </div>
    <div class="btn_other">
        <a class="btn" href="<?= app()->route->getUrl('abonent_all') ?>">Количество абонентов по подразделению</a>
        <!-- <h3>
            <?= $message ?? ''; ?>
        </h3>
        <?php foreach ($subdivisions as $subdivision): ?>
            <?= $subdivision->name . ' - ' . $subdivision->total ?>
        <?php endforeach; ?>

        <?php foreach ($rooms as $room): ?>
            <?= $room->name . ' - ' . $room->total ?>
        <?php endforeach; ?> -->
    </div>
</section>