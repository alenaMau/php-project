<section class="services">
    <div class="form_auth">
    <span class="form_title-span">Добавление подразделения</span>
        <form method="post">
            <label>
                <span class="form_title">Номер или название</span>
                <input type="text" class="form_input" required placeholder="Номер или название" name = "name">
                <span class="form_title">Вид</span>
                <select class="form_input" required name = "type_of_unit">
                    <?php foreach($type_of_units as $type_of_unit): ?>
                        <option value="<?= $type_of_unit->id ?>"><?= $type_of_unit->type ?></option>
                    <?php endforeach; ?>
                </select>   
                <input type="submit" class="form_bth" Добавить>
            </label>
        </form>
    </div>
    <div class="btn_other">
        <button class="btn">Выбрать по абоненту</button>
        <button class="btn">Количество абонентов</button>
    </div>
</section>
