<script type="text/javascript" src="/js/jscolor/jscolor.js"></script>
<form class="form-group" style="width: 500px;" action="/ground/<?php echo empty($data['type']) ? 'add/' : 'edit/?id='.$data['type']['id']; ?>" method="POST">
    <h2 class="form-horizontal"><?php echo empty($data['type']) ? "Добавление нового типа грунта" : "Редактирование типа грунта";?></h2>
    <label>Введите название грунта</label>
    <input name="name" class="form-control" placeholder="Название" required autofocus <?php echo empty($data['type']) ? '' : "value='".$data['type']['name']."'"; ?>>
    <label>Описание (краткое)</label>
    <textarea name="description" rows="6" class="form-control" required><?php echo empty($data['type']) ? '' : $data['type']['description']; ?></textarea>
    <label>Цвет</label>
    <input name="color" class="form-control color" required <?php echo empty($data['type']) ? '' : "value='".$data['type']['color']."'"; ?>>
    <br>
    <button class="btn btn-primary" type="submit">Сохранить</button>
</form>