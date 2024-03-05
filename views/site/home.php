<?php

?>

<a class="url-logout" href="<?= app()->route->getUrl('logout') ?>">Выйти с Учётной записи</a>
<section class="auth">
    <a class="btn" href="<?= app()->route->getUrl('abonent') ?>">Добавление абонента</a>
    <a class="btn" href="<?= app()->route->getUrl('rooms') ?>">Добавление помещения</a>
    <a class="btn" href="<?= app()->route->getUrl('subdivision') ?>">Добавление подразделения</a>
    <a class="btn" href="<?= app()->route->getUrl('phone') ?>">Добавление телефона</a>
    <a class="btn" href="<?= app()->route->getUrl('abonent_list') ?>">Все абоненты</a>
    <a class="btn" href="<?= app()->route->getUrl('attach_number') ?>">Прикрепить номер</a>
    <a class="btn" href="<?= app()->route->getUrl('search') ?>">Поиск абонента по имени</a>
</section>