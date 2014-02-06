<script>
     function add_app_start() {
        $.mobile.loading('show');
        $.ajax({
            url: '<?php echo base_url(); ?>myvisit/open_add_app_start',
            type: 'Post',
            error: function() {
                $('#error').html('<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                $.mobile.loading('hide');
            },
            success: function(data) {
                if (data == '-1')
                    $('#error').html('<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                else
                {
//                    alert(#triggerEdit"+app);
                    $('#popupBasicstart').html('');
                    $('#popupBasicstart').append(data).trigger("create");
                    $("#addTriggerStart").trigger('click');
                }
                $.mobile.loading('hide');

            }
        });

    }
    
    function add_app() {
        $.mobile.loading('show');
        $.ajax({
            url: '<?php echo base_url(); ?>myvisit/open_add_app',
            type: 'Post',
            error: function() {
                $('#error').html('<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                $.mobile.loading('hide');
            },
            success: function(data) {
                if (data == '-1')
                    $('#error').html('<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                else
                {
//                    alert(#triggerEdit"+app);
                    $('#popupBasic').html('');
                    $('#popupBasic').append(data).trigger("create");
                    $("#addTrigger").trigger('click');
                }
                $.mobile.loading('hide');

            }
        });

    }
    
        function edit_app(app) {
        $.mobile.loading('show');
        $.ajax({
            url: '<?php echo base_url(); ?>myvisit/edit_app/'+app,
            type: 'Post',
            error: function() {
                $('#error').html('<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                $.mobile.loading('hide');
            },
            success: function(data) {
                if (data == '-1')
                    $('#error').html('<font color="red">Please select a existing appointment.</font>');
                else
                {
//                    alert(#triggerEdit"+app);
                    $('#editApp').html('');
                    $('#editApp').append(data).trigger("create");
                    $("#triggerEdit"+app).trigger('click');
                }
                $.mobile.loading('hide');

            }
        });

    }
    
    function reasonChange(val) {
     if (val == 'other')
            {
                $('.other').show();

            }
            else
            {
                $('.other').hide();
            }

}
    
    function formsubmit()
    {
        $('.error1').html('');
        if ($('#add_app_prescriber').children('option:selected').val() == '')
        {
            $('.error1').html('<font color="red">Please add Provider first to add appointment.</font>');
            return false;
        }
        if ($("select#add_app_reason option:selected").val() == 'other')
        {
            if ($('#add_app_other_val').val() == '')
            {
                $('.error1').html('<font color="red">Add other reason.</font>');
                return false;
            }
        }
        document.getElementById("add_app_frm").submit();
    }
    
    
    function formsubmit_start()
    {
        if ($('#add_app_prescriber_start').children('option:selected').val() == '')
        {
            $('.error1').html('<font color="red">Please add Provider first to add appointment.</font>');
            return false;
        }
        if ($("select#add_app_reason_start option:selected").val() == 'other')
        {
            if ($('#add_app_other_val_start').val() == '')
            {
                $('.error1').html('<font color="red">Add other reason.</font>');
                return false;
            }
        }
        document.getElementById("add_app_frm_start").submit();
    }



function edit_submit()
    {
        $('.error1').html('');
        if ($('#Editprescriber').children('option:selected').val() == '')
        {
            $('.error1').html('<font color="red">Please add Provider first to add appointment.</font>');
            return false;
        }
        if ($("select#Editreason option:selected").val() == 'other')
        {
            if ($('#Editother').val() == '')
            {
                $('.error1').html('<font color="red">Add other reason.</font>');
                return false;
            }
        }
        document.getElementById("add_app_frm").submit();
    }

    $(document).ready(function() {

        $("#add_app_reason_start").on('change', function() {
            val = $(this).children('option:selected').val();
            if (val == 'other')
            {
                $('.other').show();
            }
            else
            {
                $('.other').hide();
            }
        });

    });
    
    
    
    


</script>