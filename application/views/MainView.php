<div class="panel panel-default">

    <div class="panel-heading">
        Ваши карты
        <a href="/main/add/"><button type="button" class="navbar-right btn btn-xs btn-primary"><strong> + Добавить</strong></button></a>
    </div>

    <table class="table">
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Широта</th>
            <th>Долгота</th>
            <th>Зум</th>
            <th></th>
        </tr>
        <?php foreach ($data['maps'] as $map) { ?>
            <tr>
                <td><?php echo $map['id']; ?></td>
                <td><?php echo $map['title']; ?></td>
                <td><?php echo $map['description']; ?></td>
                <td><?php echo $map['lat']; ?></td>
                <td><?php echo $map['lng']; ?></td>
                <td><?php echo $map['zoom']; ?></td>
                <td style="text-align: center;">
                    <?php if ($map['is_public'] == 1) { ?>
                    <a title="Публичная ссылка" href="<?php echo "/public/maps/?id=".$map['id'];?>"><span class="glyphicon glyphicon-globe"></span></a>
                    &nbsp;
                    <?php } ?>
                    <a title="Редактировать" href="/main/edit/?id=<?php echo $map['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a>
                    &nbsp;
                    <a title="Удалить" href="/main/remove/?id=<?php echo $map['id'];?>"><span class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>