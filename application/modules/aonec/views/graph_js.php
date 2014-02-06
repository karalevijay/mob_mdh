
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load('visualization', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
<?php
if (isset($a1c))
{
    ?>
        function drawVisualization() {
            // Create and populate the data table.
            var data = google.visualization.arrayToDataTable([
                ['x', 'Result'],
    <?php
    foreach ($a1c['lab_a1c'] as $data)
    {
        ?>

                    ['<?php echo date('d M y', strtotime($data['a1c_date'])) ?>', <?php echo $data['result'] ?>],
        <?php
    }
    ?>
            ]);

            // Create and draw the visualization.
            new google.visualization.LineChart(document.getElementById('visualization')).
                    draw(data, {
                        fontName: '"Arial"',
                        curveType: "none",
                        backgroundColor: "white",
                        height: 200,
                        legend: 'bottom',
                        pointSize: 3,
                        vAxis: {maxValue: 14}, title: 'A1C'}
                    );
        }
        google.setOnLoadCallback(drawVisualization);
        $(document).ready(function() {
            drawVisualization();
        });
        $(window).resize(function() {
            var svg = document.querySelector('#visualization svg');
            canvg('canvas', svg);
            drawVisualization();
        });
        
//        google.visualization.events.addListener(chart, 'ready', function() {
//            
//        });
    <?php
}
?>
</script>
