<div class="panel panel-default">

    <div class="panel-heading">
        Лог загрузок
        <a href="/data/add/"><button type="button" class="navbar-right btn btn-xs btn-primary"><strong> + Добавить</strong></button></a>
    </div>

    <table class="table">
        <tr>
            <th>id</th>
            <th>Тип файла</th>
            <th>Статус</th>
            <th>Загруженные объекты</th>
            <th>Карта</th>
            <th></th>
        </tr>
        <?php foreach ($data['import_log'] as $import) { ?>
            <tr>
                <td><?php echo $import['id']; ?></td>
                <td><?php echo $import['type']; ?></td>
                <td><?php echo $import['status']; ?></td>
                <td><?php echo $import['objects_list']; ?></td>
                <td><?php echo $import['m_title']; ?></td>
                <td style="text-align: center;">
                    <a title="Удалить" href="/data/remove/?id=<?php echo $import['id'];?>"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>