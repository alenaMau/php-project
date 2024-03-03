<?php

use Src\Route;

?>

<section class="services">
<h3><?= $message ?? ''; ?></h3>
    <div class="form_auth">
        <span class="form_title-span">Прикрепление номера к абоненту</span>
        <form method="post">
            <label>
                <span class="form_title">абонент</span>
                <select class="form_input" required placeholder="Имя" name="abonent">
                    <?php foreach ($abonents as $abonent): ?>
                        <option value="<?= $abonent->id ?>">
                            <?= $abonent->name . ' ' . $abonent->surname . ' ' . $abonent->patronymic ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <span class="form_title">Номер телефона</span>
                <select class="form_input" required name="telephone">
                    <?php foreach ($telephones as $telephone): ?>
                        <option value="<?= $telephone->id ?>">
                            <?= $telephone->number_telephone ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" class="form_bth" Добавить>
            </label>
        </form>
    </div>
</section>