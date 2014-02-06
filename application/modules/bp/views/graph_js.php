<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load('visualization', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">

<?php
if (isset($bp))
{
    ?>
    function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
            ['x', 'systolic','diastolic'],
<?php
foreach ($bp['lab_bp'] as $data)
{
    ?>

                ['<?php echo date('d M y', strtotime($data['bp_date'])) ?>', <?php echo $data['systolic'] ?> , <?php echo $data['diastolic'] ?>],
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
                    vAxis: {maxValue: 350}, title: 'Blood Pressure'}
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
