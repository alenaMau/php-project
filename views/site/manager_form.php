<?php


?>
<a href="#" onclick="history.back();return false;" class="history-back">Вернуться назад</a>
<a class="url-logout" href="<?= app()->route->getUrl('logout') ?>">Выйти</a>
<section class="auth">
   <div class="form_auth">
   <span class="form_title-span">Добавление <br>системного администратора</span>
        <form method="post">
            <label>
                <span class="form_title">Email</span>
                <input type="email" class="form_input" name="email">
                <span class="form_title">Пароль</span>
                <input type="password" class="form_input" name="password">
                <button type="submit" class="form_bth">Добавить</button>
            </label>
        </form>
    </div>
</section>  
