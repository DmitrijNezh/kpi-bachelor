var chart = {
    dataId: null,
    containerId: "",
    chartJS: null,
    data: [],

    init: function() {
        chart.chartJS = new CanvasJS.Chart(chart.containerId,
            {
                title: {
                    text: "Данные георадиолокационного зондирования"
                },

                legend: {
                    verticalAlign: "center",
                    horizontalAlign: "right"
                },
                toolTip: {
                    content: function(e) {
                        var  str1 = e.entries[0].dataPoint.y;
                        return str1
                    }
                },

                data: chart.data[chart.dataId]
            });

        chart.chartJS.render();
    },

    addAreaChartData: function(id, name, color, data) {
        var obj = {
            name: name,
            showInLegend: true,
            legendMarkerType: "square",
            type: "area",
            color: color,
            markerSize: 0,
            dataPoints: data
        };

        if (chart.data[id] === undefined) {
            chart.data[id] = [obj];
        }
        else {
            chart.data[id].push(obj);
        }
    }
};