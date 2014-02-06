<script>
    function formsubmit()
    {
        if ($('#weight').val() == '' && $('#diastolic').val() == '' && $('#systolic').val() == '')
        {
            window.location.href = '<?php echo base_url() . 'myvisit/todays_visit/' . $app_id . '/2'; ?>';
            return false;
        }
        else if($('#weight').val() == '' || $('#diastolic').val() == '' || $('#systolic').val() == '')
        {
            $('#error').html('<font color="red">Please fill in all fields.</font>');
            return false;
        }
        else if ($('#weight').val() > 1000 || $('#weight').val() < 0)
        {
            $('#error').html('<font color="red">Please enter a number less than or equal to 999.9.</font>');
            return false;
        }
        else if ($('#diastolic').val() > 1000 || $('#diastolic').val() < 0)
        {
            $('#error').html('<font color="red">Diastolic entry cannot exceed 1000.</font>');
            return false;
        }
        else if ($('#systolic').val() > 1000 || $('#systolic').val() < 0)
        {
            $('#error').html('<font color="red">Systolic entry cannot exceed 1000.</font>');
            return false;
        }
        document.getElementById("vitalsform").submit();
    }

    $(document).ready(function() {
        $("#vitalsform").submit(function() {
            $('#error').html('');
            formsubmit();
            return false;  // to prevent default submit
        });
    });
</script>