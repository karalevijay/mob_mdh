<script>
    function formsubmit()
    {
         if ($('#prescriberName').val() =='')
        {
            $('#error').html('<font color="red">Enter Provider Name.</font>');
            return false;
        }
        document.getElementById("profrm").submit();
    }

    $(document).ready(function() {
        $("#profrm").submit(function() {
            $('#error').html('');
            formsubmit();
            return false;  // to prevent default submit
        });
    });
</script>