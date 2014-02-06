<script type="text/javascript">

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

    $(document).ready(function() {
        $('.rad').prop('checked', false);
    });

    function edit_notes(tag)
    {
        $('#notesform textarea').attr('readonly', 'readonly');
        $('#' + tag).removeAttr('readonly');
        //$('#' + tag).addAttr('checked');

        $("label[for='" + tag + "']").trigger("click");

    }
    function deletenotes()
    {
        selectedVal = $("input[name=radio-choice]:checked").val();
        app_id = $("input[name=app_id]").val();
        $('#errorPopUp').html('');
        if (selectedVal == 'medsnotes')
        {
            $.ajax({
                url: '<?php echo base_url(); ?>myvisit/delete_notes/' + app_id + '/' + selectedVal,
                type: 'POST',
                beforeSend: function() {
                    $.mobile.loading("show");
                },
                error: function(data) {
                    $.mobile.loading("hide");
                    $('#errorPopUp').html('Server Error' + data);

                },
                success: function(data) {
                    $.mobile.loading("hide");
                    if (data == 0)
                        $('#' + selectedVal).val('');
                    else
                        $('#errorPopUp').html('Server Error');
                }
            });
        }
        else if (selectedVal == 'vitalsnotes')
        {
            vitals_id = $("input[name=vitals]").val();
            $.ajax({
                url: '<?php echo base_url(); ?>myvisit/delete_notes/' + app_id + '/' + selectedVal + '/' + vitals_id,
                type: 'POST',
                beforeSend: function() {
                    $.mobile.loading("show");
                },
                error: function(data) {
                    $.mobile.loading("hide");
                    $('#errorPopUp').html('Server Error' + data);
                },
                success: function(data) {
                    $.mobile.loading("hide");
                    if (data == 0)
                        $('#' + selectedVal).val('');
                    else
                        $('#errorPopUp').html('Server Error');
                }
            });
        }
        else if (selectedVal == 'labsnotes')
        {
            cholesterol_id = $("input[name=cholesterol]").val();
            a1c_id = $("input[name=a1c]").val();

            $.ajax({
                url: '<?php echo base_url(); ?>myvisit/delete_notes/' + app_id + '/' + selectedVal + '/' + cholesterol_id + '/' + a1c_id,
                type: 'POST',
                beforeSend: function() {
                    $.mobile.loading("show");
                },
                error: function(data) {
                    $.mobile.loading("hide");
                    $('#errorPopUp').html('Server Error' + data);
                },
                success: function(data) {
                    $.mobile.loading("hide");
                    if (data == 0)
                        $('#' + selectedVal).val('');
                    else
                        $('#errorPopUp').html(data + 'Server Error');
                }
            });
        }
    }

    function disp_note(app) {
        $.mobile.loading('show');
        $.ajax({
            url: '<?php echo base_url(); ?>myvisit/open_display_note/' + app,
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
                    $('#popupBasic1').html('');
                    $('#popupBasic1').append(data).trigger("create");
                    $("#displayNoteAnch").trigger('click');
                }
                $.mobile.loading('hide');

            }
        });

    }

    function open_add_app_final(app) {
        $.mobile.loading('show');
        $.ajax({
            url: '<?php echo base_url(); ?>myvisit/open_add_app_final/' + app,
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
                    $("#addAppTrigger").trigger('click');
                }
                $.mobile.loading('hide');

            }
        });

    }

</script>