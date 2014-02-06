<script type="text/javascript">

    function submit_cholesterol() {
        $('#error').html('');
        var total = $("input[name=total]").val();
        var app_id = $("input[name=app_id]").val();
        var date = $("input[name=chmydate]").val();
        var notes = $("textarea[name=notes]").val();
        var hdl = $("input[name=hdl]").val();
        var ldl = $("input[name=ldl]").val();
        var tg = $("input[name=tg]").val();
        if (date != '')
            date = convertDate(date);
        if (total == '' || app_id == '' || date == '' || hdl == '' || ldl == '' || tg == '')
        {
            $('#error').html('<font class="mt5 fLeft per100" color="red">Please fill in all cholesterol fields.</font>');
            return;
        }
        else if (total > 999 || total < 0 || hdl > 99 || hdl < 0 || ldl > 999 || ldl < 0 || tg > 999 || tg < 0)
        {
            $('#error').html('<font  class="mt5 fLeft per100" color="red">Total cholesterol, LDL, and TG cannot exceed 1000, and HDL cannot exceed 99. </font>');
            return;
        }
        else
        {
            $('#error').html('');
            $.ajax({
                url: '<?php echo base_url(); ?>myvisit/submit_cholesterol/' + app_id + '/' + total + '/' + hdl + '/' + ldl + '/' + tg + '/' + date + '/' + notes,
                type: 'POST',
                beforeSend: function() {
                    $.mobile.loading("show");
                },
                error: function() {
                    $.mobile.loading("hide");
                    $('#error').html('<font class="mt5 fLeft per100" color="red">Please fill in all cholesterol fields.</font>');

                },
                success: function(data) {
                    $.mobile.loading("hide");
                    $('#error').html(data);

                }
            });
        }
    }
    function convertDate(inputFormat) {
        var d = new Date(inputFormat);
        return [d.getDate(), d.getMonth() + 1, d.getFullYear()].join('-');
    }
    function submit_a1c() {
        $('#error').html('');
        var result = $("input[name=result]").val();
        var app_id = $("input[name=app_id]").val();
        var date = $("input[name=a1cmydate]").val();
        if (date != '')
            date = convertDate(date);
        var notes = $("textarea[name=notes]").val();
        console.log(notes);
        if (result == '' || app_id == '' || date == '')
        {
            $('#error').html('<font class="mt5 fLeft per100" color="red">Please fill in the A1C field.</font>');
            return;
        }
        else if (result >= 100 || result <= 0)
        {
            $('#error').html('<font class="mt5 fLeft per100" color="red">Please enter a number less than or equal to 99.9.</font>');
            return;
        }
        else
        {
            $('#error').html('');
            $.ajax({
                url: '<?php echo base_url(); ?>myvisit/submit_a1c/' + app_id + '/' + result + '/' + date + '/' + notes,
                type: 'POST',
                beforeSend: function() {
                    $.mobile.loading("show");
                },
                error: function() {
                    $.mobile.loading("hide");
                    $('#error').html('<font class="mt5 fLeft per100" color="red">Please fill in the A1C field.</font>');

                },
                success: function(data) {
                    $.mobile.loading("hide");
                    $('#error').html(data);

                }
            });
        }
    }


    function submit_labs() {
        $('#error').html('');
        var total = $("input[name=total]").val();
        var app_id = $("input[name=app_id]").val();
        var date = $("input[name=chmydate]").val();
        var notes = $("textarea[name=notes]").val();
        var hdl = $("input[name=hdl]").val();
        var ldl = $("input[name=ldl]").val();
        var tg = $("input[name=tg]").val();
        var result = $("input[name=result]").val();
        var date1 = $("input[name=a1cmydate]").val();
        var flag = 0;
        if (date != '')
            date = convertDate(date);
        if (date1 != '')
            date1 = convertDate(date1);
        if (hdl == '' && ldl == '' && tg == '' && total == '' && result == '' && notes == '')
        {
            window.location.href = "<?php echo base_url() . 'myvisit/todays_visit/' . $app_id . '/5'; ?>";
            return;
        }
        else if ((hdl == '' && ldl == '' && tg == '' && total == '' && result == '') && notes != '')
        {
            $('#error').html('<font class="mt5 fLeft per100" color="red">To add note please fill in A1C field or Cholesterol fields.</font>');
            return;
        }
        if ((result != '' && app_id != '' && date != '') || (hdl != '' && ldl != '' && tg != '' && total != '' && date1 != ''))
        {
            if ((result != '' && app_id != '' && date != ''))
            {
                if (result >= 100)
                {
                    $('#error').html('<font class="mt5 fLeft per100" color="red">Please enter a number less than or equal to 99.9.</font>');
                    return;
                }
            }
            if (hdl != '' && ldl != '' && tg != '' && total != '' && date1 != '')
            {
                if (total > 999 || total < 0 || hdl > 99 || hdl < 0 || ldl > 999 || ldl < 0 || tg > 999 || tg < 0)
                {
                    $('#error').html('<font class="mt5 fLeft per100" color="red">Total cholesterol, LDL, and TG cannot exceed 1000, and HDL cannot exceed 99. </font>');
                    return;
                }

            }

            flag = 1;
        }


        if (flag == 1)
        {
            $('#error').html('');
            $.ajax({
                url: '<?php echo base_url(); ?>myvisit/submit_labs/' + app_id + '/' + result + '/' + date1 + '/' + total + '/' + hdl + '/' + ldl + '/' + tg + '/' + date + '/' + notes,
                type: 'POST',
                beforeSend: function() {
                    $.mobile.loading("show");
                },
                error: function() {
                    $.mobile.loading("hide");
                    $('#error').html('<font color="red">Please fill in all cholesterol fields and A1C field</font>');
                },
                success: function() {
                    $.mobile.loading("hide");
                    window.location.href = "<?php echo base_url() . 'myvisit/todays_visit/' . $app_id . '/5'; ?>";
                }
            });
        }
        else
        {
            $('#error').html('<font color="red">Please fill in all cholesterol fields and A1C field</font>');
            return;
        }

    }

</script>