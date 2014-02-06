<script type="text/javascript">
    function fax() {
        var number = $("input[name=number]").val();
        $('#error').html('');
        $.ajax({
            url: '<?php echo base_url(); ?>fax/mailpdf_report/'+number,
            beforeSend: function() {

                $.mobile.loading("show", {
                    text: "Your report is being generated. Please wait.",
                    textVisible: true
                });
            },
            error: function() {
                $.mobile.loading("hide");
                $('#error').html('<font color="red">Server Error!</font>');
            },
            success: function(data) {
                $.mobile.loading("hide");
                if (data == 1)
                    $('#error').html('<font color="green">Your fax will be sent shortly.</font>');
                else if (data == -1)
                    $('#error').html('<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                else if (data == 2)
                    $('#error').html('<font color="red">Something is Wrong Please Verify Fax Number.</font>');
                 else if (data == -2)
                    $('#error').html('<font color="red">Please Enter A fax Number.</font>');
                else
                    $('#error').html(data);

            }
        });
    }
</script>
