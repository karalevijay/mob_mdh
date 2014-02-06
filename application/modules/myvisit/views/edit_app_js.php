<script type="text/javascript">

    function edit_app(app) {
        
        $.ajax({
            url: '<?php echo base_url(); ?>myvisit/edit_app/'+app,
            type: 'Post',
            error: function() {
                $('#error').html('<font color="red">The site has encountered a server error. Please refresh the page.</font>');
            },
            success: function(data) {
                if (data == '0')
                    window.location = "<?php echo base_url() . 'myvisit/finalize_app/' . $app_id; ?>";
                else
                    $('#goals').append(data).trigger("create");


            }
        });

    }


</script>