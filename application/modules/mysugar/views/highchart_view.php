<script src="<?php echo js_url(); ?>highchart/highcharts.js"></script>
<script type="text/javascript" src="<?php echo js_url(); ?>highchart/highcharts-more.js"></script>
<script type="text/javascript" src="<?php echo js_url(); ?>highchart/grouped-categories.js"></script>
<style type="text/css">
    @media screen and (orientation:landscape)
    {
        header 
        { 
            height: 0px;
            display: none;
        }

        footer
        {
            height: 0px;
            display: none;
        }

    }

    @media screen and (min-width: 480px)
    {
        header 
        { 
            height: 0px;
            display: none;
        }

        footer
        {
            height: 0px;
            display: none;
        }
    }
</style>
<script type="text/javascript">
            function navigate(select) {
            top.location.href = "<?php echo base_url(); ?>mysugar/graph/" + select.options[select.selectedIndex].value;
            }
</script>
<script type="text/javascript">
    $(function() {
    $('#pie').highcharts({// highcharts for pie
    chart: {
    plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            height: 250

    },
            credits: {
            enabled: false
            },
            legend: {
            width: 30,
                    floating: true,
                    align: 'left',
                    x: 2,
                    y:10, // = marginLeft - default spacingLeft
                    itemWidth: 30,
                    borderWidth: 0
            },
            title: {
            text: ''
            },
            tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
            pie: {
            dataLabels: {
            enabled: true,
                    distance: - 22,
                    formatter: function() {
                    return this.y + "%"
                    },
                    style: {
                    fontWeight: 'bold',
                            color: 'white',
                            fontSize: '12px',
                            textShadow: '0px 1px 2px black'
                    }
            },
                    events: {
                    legendItemClick: function() {
                    return false;
                    }
                    },
                    point: {
                    events: {
                    legendItemClick: function() {
                    return false; // <== returning false will cancel the default action
                    }
                    }
                    },
                    showInLegend: true,
                    startAngle: 0,
                    endAngle: 360,
                    center:  ["66%", "55%"],
                    allowPointSelect: false
            }
            },
            series: [{
            type: 'pie',
                    name: 'Share',
                    size:'90%',
                    innerSize: '40%',
                    data: [
                    {name: 'Above', y: <?php
if (isset($data['pieData']['above']))
    echo $data['pieData']['above']; else echo 0;
?>, color: '#e68e13'}, {name: 'Within', y: <?php
if (isset($data['pieData']['exact']))
    echo $data['pieData']['exact']; else echo 0;
?>, color: '#6f9a15'}, {name: 'Below', y: <?php
if (isset($data['pieData']['below']))
    echo $data['pieData']['below']; else echo 0;
?>, color: '#c15644'}]
            }]
    });
            $("#trends").highcharts({//highcharts for trends
    chart: {
    borderColor: 'black',
            borderWidth: 1,
            borderRadius: 6
    },
            credits: {
            enabled: false
            },
            tooltip: {
            formatter: function() {

            if (this.series.name == 'range' || this.series.name == 'Target Range') {
            return false;
            } else {
            return this.y;
            }
            },
                    style: {
                    color: '#fff',
                            float: 'right'
                    },
                    backgroundColor: '#0783b6'
            },
            xAxis: {
            title: {
            text: 'Testing Times',
                    x: 5,
                    style: {
                    color: 'Black',
                            fontWeight: 'bold',
                            fontSize: '10px',
                            fontFamily: 'Museo300'
                    }
            },
                    labels: {
                    style: {
                    color: 'Black',
                            fontSize: '9px'
                    },
                            useHTML: true
                    },
                    min: 0,
                    max: 7,
                    plotLines: [{
                    color: '#000',
                            width: 1,
                            value: [ - 0.5]
                    }, {
                    color: '#000',
                            width: 1,
                            value: [0.5]
                    },
                    {
                    color: '#000',
                            width: 1,
                            value: [1.5]
                    }, {
                    color: '#000',
                            width: 1,
                            value: [2.5]
                    }, {
                    color: '#000',
                            width: 1,
                            value: [3.5]
                    }, {
                    color: '#000',
                            width: 1,
                            value: [4.5]
                    }, {
                    color: '#000',
                            width: 1,
                            value: [5.5]
                    }, {
                    color: '#000',
                            width: 1,
                            value: [6.5]
                    }, {
                    color: '#000',
                            width: 1,
                            value: [7.5]
                    }, {
                    color: '#000',
                            width: 1,
                            value: [8]
                    }],
                    categories: [{
                    name: "<b style='font-family: Museo300;'>Breakfast</b>",
                            categories: ["Before", "After"]
                    }, {
                    name: "<b style='font-family: Museo300;'>Lunch</b>",
                            categories: ["Before", "After"]
                    }, {
                    name: "<b style='font-family: Museo300;'>Supper</b>",
                            categories: ["Before", "After"]
                    }, {
                    name: "<b style='font-family: Museo300;'>Bedtime</b>",
                            categories: ["&nbsp;"]
                    },
                    {
                    name: "<b style='font-family: Museo300;'>Night</b>",
                            categories: ["&nbsp;"]
                    }]
            },
            yAxis: {
            title: {
            text: 'Blood Glucose Level (mg/dL)',
                    x: - 5,
                    style: {
                    color: 'Black',
                            fontWeight: 'bold',
                            fontSize: '10px',
                            fontFamily: 'Museo300'
                    }

            },
                    labels: {
                    style: {
                    color: 'Black',
                            fontSize: '10px'
                    },
                            useHTML: true
                    },
                    min: 0
            },
            title: {
            text: ''
            },
            series: [
            {
            type: 'arearange',
                    name: 'Target Range',
                    //showInLegend: false,
                    data: [
                            [ - 0.5,<?php echo $data['targets']['bm_min']; ?>, <?php echo $data['targets']['bm_max']; ?>],
                            [0.5, <?php echo $data['targets']['bm_min']; ?>, <?php echo $data['targets']['bm_max']; ?>]],
                    color: '#88b32e'
            },
            {
            type: 'arearange',
                    name: 'range',
                    showInLegend: false,
                    data: [
                            [0.5, <?php echo $data['targets']['am_min']; ?>, <?php echo $data['targets']['am_max']; ?>],
                            [1.5, <?php echo $data['targets']['am_min']; ?>, <?php echo $data['targets']['am_max']; ?>]],
                    color: '#88b32e'
            },
            {
            type: 'arearange',
                    name: 'range',
                    showInLegend: false,
                    data: [
                            [1.5, <?php echo $data['targets']['bm_min']; ?>, <?php echo $data['targets']['bm_max']; ?>],
                            [2.5, <?php echo $data['targets']['bm_min']; ?>, <?php echo $data['targets']['bm_max']; ?>]],
                    color: '#88b32e'
            },
            {
            type: 'arearange',
                    name: 'range',
                    showInLegend: false,
                    data: [
                            [2.5, <?php echo $data['targets']['am_min']; ?>, <?php echo $data['targets']['am_max']; ?>],
                            [3.5, <?php echo $data['targets']['am_min']; ?>, <?php echo $data['targets']['am_max']; ?>]],
                    color: '#88b32e'
            },
            {
            type: 'arearange',
                    name: 'range',
                    showInLegend: false,
                    data: [
                            [3.5, <?php echo $data['targets']['bm_min']; ?>, <?php echo $data['targets']['bm_max']; ?>],
                            [4.5, <?php echo $data['targets']['bm_min']; ?>, <?php echo $data['targets']['bm_max']; ?>]],
                    color: '#88b32e'
            },
            {
            type: 'arearange',
                    name: 'range',
                    showInLegend: false,
                    data: [
                            [4.5, <?php echo $data['targets']['bm_min']; ?>, <?php echo $data['targets']['bm_max']; ?>],
                            [5.5, <?php echo $data['targets']['bm_min']; ?>, <?php echo $data['targets']['bm_max']; ?>]],
                    color: '#88b32e'
            },
            {
            type: 'arearange',
                    name: 'range',
                    showInLegend: false,
                    data: [
                            [5.5, <?php echo $data['targets']['bt_min']; ?>, <?php echo $data['targets']['bt_max']; ?>],
                            [6.5, <?php echo $data['targets']['bt_min']; ?>, <?php echo $data['targets']['bt_max']; ?>]],
                    color: '#88b32e'
            },
            {
            type: 'arearange',
                    name: 'range',
                    showInLegend: false,
                    data: [
                            [6.5, <?php echo $data['targets']['bt_min']; ?>, <?php echo $data['targets']['bt_max']; ?>],
                            [7.5, <?php echo $data['targets']['bt_min']; ?>, <?php echo $data['targets']['bt_max']; ?>]],
                    color: '#88b32e'
            }, {
            type: 'line',
                    name: 'Regression Line',
                    color: '#000',
                    showInLegend: false,
                    //data: [[0, 1.11], [5, 4.51]],
                    data: [

<?php
foreach ($data['medians'] as $key => $med)
{
    if ($med)
    {
        if ($key == "bb_med")
            echo '[0,' . $med . '],';
        if ($key == "ab_med")
            echo '[1,' . $med . '],';
        if ($key == "bl_med")
            echo '[2,' . $med . '],';
        if ($key == "al_med")
            echo '[3,' . $med . '],';
        if ($key == "bs_med")
            echo '[4,' . $med . '],';
        if ($key == "as_med")
            echo '[5,' . $med . '],';
        if ($key == "bt_med")
            echo '[6,' . $med . '],';
        if ($key == "nt_med")
            echo '[7,' . $med . '],';
    }
}
?>
                    ],
                    marker: {
                    enabled: false
                    },
                    states: {
                    hover: {
                    lineWidth: 0
                    }
                    },
                    enableMouseTracking: false
            },
            {
            type: 'scatter',
                    name: 'Above',
                    marker: {
                    symbol: 'circle',
                            fillColor: '#ffba48',
                            radius: 3
                    },
                    //data: [7.0, {x: 5, y: 15}, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, {y: 26.5}]
                    //data: [{x: 0, y: 200}, {x: 0, y: 120}, {x: 5, y: 160}, {x: 5, y: 200}, {x: 6, y: 300}]
                    data: [

<?php
if (is_array($data['aboveRange']))
{

    foreach ($data['aboveRange'] as $arr)
    {
        echo '{' . $arr . '},';
    }
}
else
{
    ?>
                        {}
<?php } ?>

                    ]
            }, {
            type: 'scatter',
                    name: 'Below',
                    marker: {
                    symbol: 'circle',
                            fillColor: '#ea3a1c',
                            radius: 3
                    },
                    //data: [{y: 3.9}, 4.2, {x: 5, y: 25},{x: 5, y: 15}, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6]
                    //data: [{x: 0, y: 150}, {x: 0, y: 100}, {x: 5, y: 140}, {x: 5, y: 160}, {x: 6, y: 200}]
                    data: [
<?php
if (is_array($data['belowRange']))
{

    foreach ($data['belowRange'] as $arr)
    {
        echo '{' . $arr . '},';
    }
}
else
{
    ?>
                        {}
<?php } ?>
                    ]
            }, {
            type: 'scatter',
                    name: 'Within',
                    marker: {
                    symbol: 'circle',
                            fillColor: '#000',
                            radius: 3
                    },
                    //data: [{y: 3.9}, 4.2, {x: 5, y: 25},{x: 5, y: 15}, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6]
                    //data: [{x: 0, y: 160}, {x: 0, y: 110}, {x: 5, y: 155}, {x: 5, y: 170}, {x: 6, y: 220}]
                    data: [

<?php
if (is_array($data['inRange']))
{

    foreach ($data['inRange'] as $arr)
    {
        echo '{' . $arr . '},';
    }
}
else
{
    ?>
                        {}
<?php } ?>

                    ]
            }
            ],
            legend: {
            itemMarginTop: - 1,
                    width: 240,
                    floating: true,
                    align: 'left',
                    x: 10, // = marginLeft - default spacingLeft
                    y: 10,
                    itemWidth: 120,
                    borderWidth: 0,
                    style: {
                    color: 'Black',
                            fontSize: '7px'


                    },
            },
            plotOptions: {
            arearange: {
            events: {
            legendItemClick: function() {
            return false;
                    // <== returning false will cancel the default action
            }
            }
            }
            }
    });
    });


</script>
