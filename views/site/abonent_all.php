<?php


?>
<a href="#" onclick="history.back();return false;" class="history-back">Вернуться назад</a>
<section class="services">
<h3><?= $message ?? ''; ?></h3>
    <div class="form_auth">
        <span class="form_title-span">Прикрепление номера к абоненту</span>
        <h3>
            <?= $message ?? ''; ?>
        </h3>
        <?php foreach ($subdivisions as $subdivision): ?>
            <?= $subdivision->name . ' - ' . $subdivision->total ?>
        <?php endforeach; ?>

        <?php foreach ($rooms as $room): ?>
            <?= $room->name . ' - ' . $room->total ?>
        <?php endforeach; ?>
    </div>
</section>