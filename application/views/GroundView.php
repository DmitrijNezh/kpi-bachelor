<div class="panel panel-default">

    <div class="panel-heading">
        Доступные типы грунтов
        <a href="/ground/add/"><button type="button" class="navbar-right btn btn-xs btn-primary"><strong> + Добавить</strong></button></a>
    </div>

    <table class="table">
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Цвет</th>
            <th></th>
        </tr>
        <?php foreach ($data['types'] as $type) { ?>
        <tr>
            <td><?php echo $type['id']; ?></td>
            <td><?php echo $type['name']; ?></td>
            <td><?php echo $type['description']; ?></td>
            <td style="background-color: #<?php echo $type['color'];?>">#<?php echo $type['color'];?></td>
            <td style="text-align: center;">
                <a title="Редактировать" href="/ground/edit/?id=<?php echo $type['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a>
                &nbsp;
                <a title="Удалить" href="/ground/remove/?id=<?php echo $type['id'];?>"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>