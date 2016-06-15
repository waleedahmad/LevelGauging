var gaugeOptions = {

    chart: {
        type: 'solidgauge'
    },

    title: null,

    pane: {
        center: ['50%', '85%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#A4BE47',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'arc'
        }
    },

    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {
        stops: [
            [0.1, '#788838'], // green
            [0.5, '#788838'], // yellow
            [0.9, '#788838'] // red
        ],
        lineWidth: 0,
        minorTickInterval: null,
        tickPixelInterval: 400,
        tickWidth: 0,
        title: {
            y: -70
        },
        labels: {
            enabled: false,
        }
    },

    credits: {
        enabled: false
    },

    plotOptions: {
        solidgauge: {
            /*innerRadius: '75%',*/
            dataLabels: {
                y: 5,
                borderWidth: 0,
                useHTML: true,
            }
        }
    }
};

// The speed gauge
$('#cap-chart').highcharts(Highcharts.merge(gaugeOptions, {
    yAxis: {
        min: 0,
        max: 6040,
        title: {
            text: ''
        }
    },

    credits: {
        enabled: false
    },

    exporting: {
        enabled : false
    },

    series: [{
        name: 'Speed',
        data: [2000],
        dataLabels: {
            enabled : false,
            format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                '<span style="font-size:12px;color:silver">Fuel in tanks ( Litres)</span></div>'
        },
        tooltip: {
            valueSuffix: ' km/h'
        }
    }]

}));

$('#gauge').highcharts({

    chart: {
        type: 'solidgauge',
        backgroundColor: 'transparent'
    },

    title: null,

    pane: {
        center: ['50%', '70%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor: 'transparent',
            innerRadius: '90%',
            outerRadius: '100%',
            shape: 'arc',
            borderColor: 'transparent'
        }
    },

    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 100,
        stops: [
            [0.1, '#DFC852'], // red
            [0.5, '#DFC852'], // yellow
            [0.9, '#DFC852'] // green
        ],
        minorTickInterval: null,
        tickPixelInterval: 400,
        tickWidth: 0,
        gridLineWidth: 0,
        gridLineColor: 'transparent',
        labels: {
            enabled: false
        },
        title: {
            enabled: false
        }
    },

    credits: {
        enabled: false
    },

    plotOptions: {
        solidgauge: {
            innerRadius: '90%',
            dataLabels: {
                enabled : false,
                y: -45,
                borderWidth: 0,
                useHTML: true
            }
        }
    },

    series: [{
        data: [83]
    }],

    exporting: {
        enabled : false
    }
});

$('#avg-chart').highcharts({
    chart: {
        type: 'areaspline',
        backgroundColor: '#A4BE47',
        plotBorderWidth: 0
    },
    title: {
        text: ''
    },
    series: {
        dataLabels: {
            color: '#B0B0B3'
        },
        marker: {
            lineColor: '#333'
        }
    },

    legend: {
        enabled: false,
        /*layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 0,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'grey'*/
    },
    xAxis: {
        categories: [
            '23:00',
            '23:00',
            '23:00',
            '23:00',
            '23:00',
            '23:00',
            '23:00',
            '23:00',
            '23:00',
            '23:00',
            '23:00',
            '23:00',
            '23:00'
        ],
        labels: {
            style: {
                color: 'white',
            }
        }
    },
    yAxis: {
        gridLineWidth: 0,
        title: {
            text: ''
        },
        labels: {
            style: {
                color: 'white',

            }
        },
        tickColor: 'yellow'
    },
    tooltip: {
        shared: true,
        valueSuffix: ' units'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 1,
            dashStyle: "Solid",
            color: '#788838',
        }

    },
    exporting: {
        enabled: false
    },
    series: [{
        name: 'JET A1',
        data: [9000, 11000, 10000, 9000, 11000, 12000, 10000,9000, 11000, 12000, 10000, 11000, 9000]
    }]
});
