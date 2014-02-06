<script type="text/javascript">
<?php
if (isset($count))
{
    ?>
        var count =<?php echo $count ?>;
    <?php
}
else
{
    ?>
        var count = 0;
    <?php
}
?>
    function loadquestion() {
        if ($("input[name=q" + count + "]").val() == '')
        {
            $('#error').html('<font color="red">Please fill in existing question fields before adding a new question.</font>');

        }
        else
        {
            count++;
            $('#error').html('');
            var data = "<div class='mb5 fLeft per100'>\n\
<h4 class='mb5'>Question " + count + "</h4><div class = 'per80 fLeft'>\n\
<input type = 'text' name='q" + count + "' placeholder = 'Enter your question here.'  value = '' /></div>\n\
<input type='hidden' id='qid" + count + "'  name='qid" + count + "' value=''/>\n\
<span class = 'fLeft mt15 ml10'><a href='javascript:void(0);' onclick=loadanswer('a" + count + "')><img src =<?php echo img_url() ?>enterAns.png></a></span></div>\n\
<div class = 'mb5 fLeft per80' >\n\
<textarea cols = '40' class = 'mt0' rows = '8' name = 'a" + count + "' id = 'a" + count + "' style='display:none' placeholder='Enter your answer here.' id = 'textarea-1' >\n\
</textarea>\n\
</div>";
            $('#questions').append(data).trigger("create");
        }
    }


    function loadanswer(tag) {
        $('#' + tag).focus();
        $('#' + tag).css('display', 'block');
    }

    function submit_questions() {
        var temp = $('#quest').serializeArray();
        $.ajax({
        url: '<?php echo base_url(); ?>myvisit/submit_questions/<?php echo $app_id; ?>/' + count,
                type: 'Post',
                data: temp,
                error: function() {
                    $.mobile.loading("hide");
                    $('#error').html('<font color="red">Please fill in existing question fields before adding a new question.</font>');
                },
                beforeSend: function() {
                    $.mobile.loading("show");
                    },
            success: function(data) {
//                console.log(data);
            $.mobile.loading("hide");
            if (data == '0')
                window.location = "<?php echo base_url() . 'myvisit/todays_visit/' . $app_id . '/6'; ?>";
            else
                $('#error').html('<font color="red">The site has encountered a server error. Please refresh the page.</font>');


            }
        });
    }


</script>