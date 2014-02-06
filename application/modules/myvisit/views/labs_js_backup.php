<script type="text/javascript">

    function submit_cholesterol() {
        var total = $("input[name=total]").val();
        var app_id = $("input[name=app_id]").val();
        var date = $("input[name=chmydate]").val();
        var notes = $("textarea[name=notes]").val();
        var hdl = $("input[name=hdl]").val();
        var ldl = $("input[name=ldl]").val();
        var tg = $("input[name=tg]").val();

        if (total == '' || app_id == '' || date == '' || hdl == '' || ldl == '' || tg == '')
        {
            $('#error').html('<font color="red">Please fill in all required fields for adding Cholesterol!</font>');
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
                    $('#error').html('<font color="red">Please fill in all required fields for adding Cholesterol!</font>');
                },
                success: function(data) {
                    $.mobile.loading("hide");
                    $('#error').html(data);
                }
            });
        }
    }
    function submit_a1c() {

        var result = $("input[name=result]").val();
        var app_id = $("input[name=app_id]").val();
        var date = $("input[name=a1cmydate]").val();
        var notes = $("textarea[name=notes]").val();
        console.log(notes);
        if (result == '' || app_id == '' || date == '')
        {
            $('#error').html('<font color="red">Please fill in all required fields for adding A1C!</font>');
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
                    $('#error').html('<font color="red">Please fill in all required fields for adding A1C!</font>');
                },
                success: function(data) {
                    $.mobile.loading("hide");
                    $('#error').html(data);
                }
            });
        }
    }


    function submit_labs() {
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
        if (result == '' || app_id == '' || date == '')
        {

            $('#error').html('<font color="red">Please fill in all required fields for A1C Data!</font>');
        }
        else
        {
            flag = 1;
        }
        if ((hdl == '' || ldl == '' || tg == '' || total == '' || date1 == '') && flag == 0)
        {
            $('#error').html('<font color="red">Please fill in all required fields for Cholesterol Data!</font>');
        }
        if (flag == 0)
        {
            $('#error').html('<font color="red">Please fill in all required fields for adding Data!</font>');
        }
        else
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
                    $('#error').html('<font color="red">Please fill in all required fields for adding Data!</font>');
                },
                success: function() {
                    $.mobile.loading("hide");
                    window.location.href = "<?php echo base_url() . 'myvisit/todays_visit/' . $app_id . '/5'; ?>";
                }
            });
        }

    }

</script>