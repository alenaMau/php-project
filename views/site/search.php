<?php

use Src\Route;

?>

<section class="services_search">
    <div class="form"> 
    <h3><?= $message ?? ''; ?></h3>
        <form method="post">
            <label>
                <span class="form_title_black">Поиск абонента</span>
                <input  class="form_input" required placeholder="Имя" name="abonent[]">
                <button type="submit" class="form_bth"> Поиск</button>
            </label>
        </form>
        <ol>
            <?php 
            foreach($abonents as $abonent) {
                echo '<p>Имя:' . $abonent->name.'</p>';
                echo '<p>Фамилия:' . $abonent->surname.'</p>';
                echo '<p>Отчество:' . $abonent->	patronymic.'</p>';
                echo '<p>Дата рождения:' . $abonent->	date_of_birth.'</p>';
                echo '<br><br><br>';
            }
            ?>
        </ol>
    </div>
</section>
