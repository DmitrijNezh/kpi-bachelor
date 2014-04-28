<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCxD74Js31TNVMg_iEnsIqmnNZpjKJugcI&sensor=false">
</script>
<script type="text/javascript" src="/js/map.js"></script>

<h2><?php echo $data['map']['title']; ?></h2>
<p><?php echo $data['map']['description']; ?></p>

<div id="g-map"></div>

<script type="text/javascript">
    var lines = [];
    var points = [];

    <?php foreach ($data['objects'] as $object) { ?>
        <?php if ($object['type'] == 'line') { ?>
    lines.push(<?php echo $object['data']; ?>);
        <?php } else { ?>
    points.push(<?php echo $object['data']; ?>);
        <?php } ?>
    <?php } ?>

    function initLines() {
        $.each(lines, function(i, line) {
           map.drawLine(line, "<b>OGO!</b>");
        });
    }

    function initPoints() {
        $.each(points, function(i, point) {
            map.drawPoint(point, "<b>OGO! Point</b>");
        });
    }

    $(document).ready(function() {
        function initPosition() {
            map.setPosition(<?php echo $data['map']['lat'];?>, <?php echo $data['map']['lng'];?>, <?php echo $data['map']['zoom'];?>);
        }
        google.maps.event.addDomListener(window, 'load', initPosition);
        google.maps.event.addDomListener(window, 'load', initLines);
        google.maps.event.addDomListener(window, 'load', initPoints);
    });
</script>

