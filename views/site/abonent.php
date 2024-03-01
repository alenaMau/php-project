<?php

use Src\Route;

?>

<section class="services">
    <div class="form_auth">
    <span class="form_title-span">Добавление абонента</span>
        <form>
            <label>
                <span class="form_title">ФИО</span>
                <input type="text" class="form_input" required placeholder="ФИО">
                <span class="form_title">Дата рождения</span>
                <input type="text" class="form_input" required placeholder="Дата рождения">
                <span class="form_title">Подразделение</span>
                <select id="cities" class="form_input" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <input type="submit" class="form_bth" Добавить>
            </label>
        </form>
    </div>
    <div class="btn_other">
        <button class="btn">Прикрепить номер</button>
    </div>
</section>
