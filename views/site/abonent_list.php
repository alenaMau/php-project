<?php

?>

<section class="services">
    <div class="form_auth">
    <ol>
            <?php 
            foreach($abonents as $abonent) {
                echo '<p>Имя:' . $abonent->id_abonent .'</p>';
                echo '<p>Фамилия:' . $abonent->id_telephone.'</p>';
                echo '<br><br><br>';
            }
            ?>
        </ol>
    </div>
</section>
