<script>
function formsubmit()
{
    if($('#weight').val()>1000 || $('#weight').val() < 0 || $('#goal').val() > 1000 || $('#goal').val() < 0 )
    {
        $('#error').html('<font color="red">Please enter a number less than or equal to 999.9.</font>');
        return false;
    }
    if($('#mydate').val()=='')
    {
        $('#error').html('<font color="red">Please Enter A Date!</font>');
        return false;
    }
    document.getElementById("wtfrm").submit();
}

$(document).ready(function() {
    $("#wtfrm").submit(function () {
        $('#error').html('');
        formsubmit();
        return false;  // to prevent default submit
    });
});
</script>