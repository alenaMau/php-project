<section class="auth">
<h3><?= $message ?? ''; ?></h3>
<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php

//var_dump(app()->settings->path['root']);

if (!app()->auth::check()):
   ?>
   <div class="form_auth">
        <form method="post">
            <label>
                <span class="form_title">Email</span>
                <input type="email" class="form_input" name="email">
                <span class="form_title">Пароль</span>
                <input type="password" class="form_input" name="password">
                <button class="form_bth" type="submit">Войти</button>
            </label>
        </form>
    </div>
</section>  
<?php endif;

