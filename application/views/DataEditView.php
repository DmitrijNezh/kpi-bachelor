<form class="form-group" enctype="multipart/form-data" style="width: 500px;" action="/data/add/" method="POST">
    <h2 class="form-horizontal">Добавление файла на обработку</h2>
    <label>Выберите тип файла</label>
    <br>
    <select name="type">
        <option value="csv" selected>.csv (таблица)</option>
        <option value="txt">.txt (текстовый документ)</option>
    </select>
    <br><br>
    <label>Выберите карту</label>
    <br>
    <select name="map">
        <?php foreach($data['maps'] as $map) { ?>
        <option value="<?php echo $map['id']; ?>"><?php echo $map['title']; ?></option>
        <?php } ?>
    </select>
    <br><br>
    <label>Выберите файл </label>
    <br>
    <input type="file" name="imp_file">
    <br>
    <button class="btn btn-primary" type="submit">Добавить</button>
</form>