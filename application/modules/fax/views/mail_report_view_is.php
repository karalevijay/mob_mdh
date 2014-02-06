<script type="text/javascript">

  

    function mail() {
     var temp = $('#mailerfrm').serializeArray();
        $.ajax({
            url: '<?php echo base_url(); ?>fax/mailpdf_report',
            type: 'Post',
            data: temp,
            beforeSend: function() {
                $.mobile.loading("show", {
                    text: "Your report is being generated. Please wait.",
                    textVisible: true
                });
            },
            error: function(data) {
                $.mobile.loading("hide");
                $('#error').html('<font color="red">Server Error!</font>' + data);
            },
            success: function(data) {
                $.mobile.loading("hide");
                if (data == 1)
                    $('#error').html('<font color="green">Your report was emailed successfully.</font>');
                else if (data == -1)
                    $('#error').html('<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                else if (data == 2)
                    $('#error').html('<font color="red">Something is Wrong Please Verify Email ID.</font>');
                else if (data == -2)
                    $('#error').html('<font color="red">Please Enter All Required Fields.</font>');
                else
                    $('#error').html(data);

            }
        });
    
    
        
    }
</script>