<script>
function formsubmit()
{
    if($('#total').val()>999 || $('#hdl').val()>99 || $('#ldl').val()>999 || $('#tri').val()>999 || $('#total').val()<0 || $('#hdl').val()<0 || $('#ldl').val()<0 || $('#tri').val()<0)
    {
        $('#error').html('<font color="red">Total cholesterol, LDL, and TG cannot exceed 1000, and HDL cannot exceed 99. </font>');
        return false;
    }
    if($('#mydate').val()=='')
    {
        $('#error').html('<font color="red">Please Enter A Date!</font>');
        return false;
    }
    document.getElementById("cholfrm").submit();
}

$(document).ready(function() {
    $("#cholfrm").submit(function () {
        $('#error').html('');
        formsubmit();
        return false;  // to prevent default submit
    });
});
</script>