<script type="text/javascript">
    function submit_cholesterol() {


        total = $("input[name=total]").val();
        app_id = $("input[name=app_id]").val();
        date = $("input[name=chmydate]").val();
        notes = $("textarea[name=notes]").val();
        hdl = $("input[name=hdl]").val();
        ldl = $("input[name=ldl]").val();
        tg = $("input[name=tg]").val();

        if (total == '' || app_id == '' || date == '' || hdl == '' || ldl == '' || tg == '')
        {
            $('#cherror').html('<font color="red">Please fill in all required fields for adding Cholesterol!</font>');
        }
        else
        {
            $.ajax({
                url: '<?php echo base_url(); ?>myvisit/submit_cholesterol/' + app_id + '/' + total + '/' + hdl + '/' + ldl + '/' + tg + '/' + date + '/' + notes,
                type: 'POST',
                error: function() {
                    $('#cherror').html('<font color="red">Please fill in all required fields for adding Cholesterol!</font>');
                },
                success: function(data) {
                    $('#cherror').html(data);
                }
            });
        }
    }
    function submit_a1c() {

        result = $("input[name=result]").val();
        app_id = $("input[name=app_id]").val();
        date = $("input[name=a1cmydate]").val();
        notes = $("textarea[name=notes]").val();
    
        if (result == '' || app_id == '' || date == '')
        {
            $('#a1cerror').html('<font color="red">Please fill in all required fields for adding A1C!</font>');
        }
        else
        {
            $.ajax({
                url: '<?php echo base_url(); ?>myvisit/submit_a1c/' + app_id + '/' + result + '/' + date + '/' + notes,
                type: 'POST',
                error: function() {
                    $('#a1cerror').html('<font color="red">Please fill in all required fields for adding A1C!</font>');
                },
                success: function(data) {
                    $('#a1cerror').html(data);
                }
            });
        }
    }


    function submit_labs() {
        total = $("input[name=total]").val();
        app_id = $("input[name=app_id]").val();
        date = $("input[name=chmydate]").val();
        notes = $("textarea[name=notes]").val();
        hdl = $("input[name=hdl]").val();
        ldl = $("input[name=ldl]").val();
        tg = $("input[name=tg]").val();
        result = $("input[name=result]").val();
        date1 = $("input[name=a1cmydate]").val();
        flag=0;
        if (result == '' || app_id == '' || date == '')
        {
            
            $('#a1crror').html('<font color="red">Please fill in all required fields for A1C Data!</font>');
        }
        else
        {
            flag=1;
        }
        if( (hdl == '' || ldl == '' || tg == ''  || total == '' || date1 == '') && flag==0 )
        {
            $('#cherror').html('<font color="red">Please fill in all required fields for Cholesterol Data!</font>');
        }
        if(flag==0)
        {
            $('#error').html('<font color="red">Please fill in all required fields for adding Data!</font>');
        }
        else
        {
            $.ajax({
                url: '<?php echo base_url(); ?>myvisit/submit_labs/' + app_id + '/' + result + '/' + date1 + '/' + total + '/' + hdl + '/' + ldl + '/' + tg + '/' + date + '/' + notes,
                type: 'POST',
                error: function() {
                    $('#error').html('<font color="red">Please fill in all required fields for adding Data!</font>');
                },
                success: function(data) {
                   window.location.href = "<?php echo base_url() . 'myvisit/todays_visit/' . $app_id. '/5'; ?>";
                }
            });
        }

    }

</script>