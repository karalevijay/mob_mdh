<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load('visualization', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
<?php
if (isset($weight))
{
    ?>

    function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
            ['x', 'Weight'],
<?php
foreach ($weight['lab_bp'] as $data)
{
    ?>

                ['<?php echo date('d M y', strtotime($data['weight_date'])) ?>', <?php echo $data['weigh'] ?>],
    <?php
}
?>
        ]);

        // Create and draw the visualization.
        new google.visualization.LineChart(document.getElementById('visualization')).
                draw(data, {
                    fontName: '"Arial"',
                    curveType: "none",
                    height: 200,
                    pointSize: 3,
                    legend: 'bottom',
                    vAxis: {maxValue: 350}, title: 'Weight'}
                );
    }
    google.setOnLoadCallback(drawVisualization);
     $(document).ready(function() {
        drawVisualization();
    });
    $(window).resize(function() {
        drawVisualization();
    });
            
    <?php
}
?>
</script>
