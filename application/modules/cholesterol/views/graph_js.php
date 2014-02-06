<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load('visualization', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
<?php
if (isset($cholesterol))
{
    ?>


    function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
            ['x', 'HDL', 'LDL', 'TG', 'Total'],
<?php
foreach ($cholesterol['lab_cholesterol'] as $data)
{
    ?>

                ['<?php echo date('d M y', strtotime($data['cholesterol_date'])) ?>', <?php echo $data['hdl'] ?>, <?php echo $data['ldl'] ?>, <?php echo $data['tri'] ?>, <?php echo $data['total'] ?>],
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
                    legend: 'bottom',
                    pointSize: 3,
                    vAxis: {maxValue: 350}, title: 'Cholesterol'}
                );
    }


    google.setOnLoadCallback(drawVisualization);
    $(window).resize(function() {
        drawVisualization();
    });
    $(document).ready(function() {
        drawVisualization();
    });
            
    <?php
}
?>
</script>
