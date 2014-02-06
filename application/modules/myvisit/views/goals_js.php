<script type="text/javascript">
<?php
if (isset($count))
{
    ?>
         count =<?php echo $count ?>;
    <?php
}
else
{
    ?>
         count = 0;
    <?php
}
?>
    function loadgoal() {
        if ($("input[name=g" + count + "]").val() == '')
        {
            $('#error').html('<font color="red">Please fill in existing goal fields before adding a new goal.</font>');

        }
        else
        {
            count++;
            $('#error').html('');
            var data = "<div class='mb10 fLeft per100'>\n\
<h4 class='mb5'>Goal " + count + "</h4>\n\
<div class='per80 fLeft'>\n\
<input type='text' name='g" + count + "' placeholder='Enter your goal here.' value='' />\n\
<input type='hidden' id='gid" + count + "' name='gid" + count + "'  value=''/>\n\
</div>\n\
<span class='fLeft mt15 ml10'>\n\
<a href='javascript:void(0);' onclick=editgoal('g" + count + "'); >\n\
<img src='<?php echo img_url(); ?>edit-ico.png' class='per50 '>\n\
</a>\n\
</span>\n\
</div>";

            $('#goals').append(data).trigger("create");
        }
    }
    function editgoal(tag) {
        $('#' + tag).removeAttr('readonly');
        $('#' + tag).focus();
    }
    function submit_goals() {
        var temp = $('#goalform').serializeArray();
        $.ajax({
            url: '<?php echo base_url(); ?>myvisit/submit_goal/<?php echo $app_id; ?>/' + count,
            type: 'Post',
            data: temp,
            beforeSend: function() {
                    $.mobile.loading("show");
                    },
            error: function() {
                $.mobile.loading("hide");
                $('#error').html('<font color="red">Please fill in existing goal fields before adding a new goal.</font>');
            },
            success: function(data) {
                $.mobile.loading("hide");
                if (data == '0')
                    window.location = "<?php echo base_url() . 'myvisit/finalize_app/' . $app_id; ?>";
                else
                    $('#error').html('<font color="red">The site has encountered a server error. Please refresh the page.</font>');


            }
        });

    }


</script>