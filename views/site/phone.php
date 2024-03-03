<section class="services">
<h3><?= $message ?? ''; ?></h3>
    <div class="form_auth">
    <span class="form_title-span">Добавление телефона</span>
        <form method="post">
            <label>
                <span class="form_title">Номер </span>
                <input type="tel" class="form_input" required placeholder="Номер " name="number_telephone">
                <span class="form_title">Помещение</span>
                <select type="text" class="form_input" required name="room">
                    <?php foreach($rooms as $room): ?>
                        <option value="<?= $room->id ?>"><?= $room->name ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="form_title">Подразделение</span>
                <select type="text" class="form_input" required name="subdivision">
                <?php foreach($subdivisions as $sub): ?>
                    <option value="<?= $sub->id ?>"><?= $sub->name ?></option>
                <?php endforeach; ?>
                </select>
                <input type="submit" class="form_bth" Добавить>
            </label>
        </form>
    </div>
</section>