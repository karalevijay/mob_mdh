<script type="text/javascript">
    function visit_meds_edit(app_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>myvisit/edit_meds/' + app_id,
            type: 'POST',
            error: function() {
                document.title = 'error';
            },
            success: function(data) {
                $("#popupBasic").html("");
               $(data).appendTo( "#popupBasic" ).trigger( "create" );
                $("#triggerEdit").trigger('click');
            }
        });
        
    }
</script>