<?php

?>
<a href="#" onclick="history.back();return false;" class="history-back">Вернуться назад</a>

<section class="services_rooms">
        <ol>
            <?php foreach($rooms as $room) : ?>
                <p>Имя: <?= $room->name ?> </p>
                <img src="<?= $room->image ?>">
                <br><br>
            <?php endforeach; ?>
        </ol>
</section>