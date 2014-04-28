<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCxD74Js31TNVMg_iEnsIqmnNZpjKJugcI&sensor=false">
</script>
<script type="text/javascript" src="/js/map.js"></script>

<div id="g-map"></div>

<form class="form-group" id="map-form" style="width: 500px;" action="/main/<?php echo empty($data['map']) ? 'add/' : 'edit/?id='.$data['map']['id']; ?>" method="POST">
    <h2 class="form-horizontal"><?php echo empty($data['map']) ? "Добавление новой карты" : "Редактирование карты";?></h2>
    <label>Введите название карты</label>
    <input name="title" class="form-control" placeholder="Название" required <?php echo empty($data['map']) ? '' : "value='".$data['map']['title']."'"; ?>>
    <label>Описание (краткое)</label>
    <textarea name="description" rows="6" class="form-control" required><?php echo empty($data['map']) ? '' : $data['map']['description']; ?></textarea>
    <label>
        <input name="is_public" type="checkbox" <?php echo !empty($data['map']) && $data['map']['is_public'] == 1 ? 'checked' : '';?>> Публичная
    </label>
    <br>
    <button class="btn btn-primary" type="submit">Сохранить</button>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('#map-form').submit(function() {
            map.currentPosition();

            var params = [
                { name: "lat",  value: map.lat },
                { name: "lng",  value: map.lng },
                { name: "zoom", value: map.zoom }
            ];

            $.each(params, function(i, param) {
                $('<input />').attr('type', 'hidden')
                    .attr('name', param.name)
                    .attr('value', param.value)
                    .appendTo('#map-form');
            });

            return true;
        });

        <?php if (!empty($data['map'])) { ?>
        function initPosition() {
            map.setPosition(<?php echo $data['map']['lat'];?>, <?php echo $data['map']['lng'];?>, <?php echo $data['map']['zoom'];?>);
        }

        google.maps.event.addDomListener(window, 'load', initPosition);
        <?php } ?>
    });
</script>