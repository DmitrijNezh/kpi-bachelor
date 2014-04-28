<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCxD74Js31TNVMg_iEnsIqmnNZpjKJugcI&sensor=false">
</script>
<script type="text/javascript" src="/js/map.js"></script>
<script type="text/javascript" src="/js/canvasjs.min.js"></script>
<script type="text/javascript" src="/js/chart.js"></script>

<h2><?php echo $data['map']['title']; ?></h2>
<p><?php echo $data['map']['description']; ?></p>

<div id="g-map"></div>

<script type="text/javascript">
    var lines = [];
    var points = [];
    var chartData = [];
    var obj;

    <?php foreach ($data['objects'] as $object) { ?>
        <?php if ($object['type'] == 'line') { ?>
    obj = {id: <?php echo $object['id']; ?>, data: <?php echo $object['data']; ?>};
    lines.push(obj);
        <?php } else { ?>
    obj = {id: <?php echo $object['id']; ?>, data: <?php echo $object['data']; ?>};
    points.push(obj);
        <?php } ?>
    <?php } ?>

    <?php foreach ($data['chart_data'] as $object) { ?>
    obj = {
        id: <?php echo $object['id']; ?>,
        name: '<?php echo $object['name']; ?>',
        color: '<?php echo $object['color']; ?>',
        data: <?php echo $object['data']; ?>
    };
    chartData.push(obj);
    <?php } ?>

    function initLines() {
        $.each(lines, function(i, line) {
           map.drawLine(line['id'], line['data'], '<div class="chart-window" id="chartContainer' + line['id'] + '"></div>');
        });
    }

    function initPoints() {
        $.each(points, function(i, point) {
            map.drawPoint(point['id'], point['data'], '<div class="chart-window" id="chartContainer' + point['id'] + '"></div>');
        });
    }

    function initChartData() {
        $.each(chartData, function(i, data) {
            chart.addAreaChartData(data['id'], data['name'], "#" + data['color'], data['data']);
        });
    }

    $(document).ready(function() {
        function initPosition() {
            map.setPosition(<?php echo $data['map']['lat'];?>, <?php echo $data['map']['lng'];?>, <?php echo $data['map']['zoom'];?>);
        }
        google.maps.event.addDomListener(window, 'load', initPosition);
        google.maps.event.addDomListener(window, 'load', initLines);
        google.maps.event.addDomListener(window, 'load', initPoints);
        google.maps.event.addDomListener(window, 'load', initChartData);
    });
</script>

