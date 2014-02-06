<script>
function formsubmit()
{
    if($('#systolic').val()>999 || $('#systolic').val()<0)
    {
        $('#error').html('<font color="red">Systolic entry cannot exceed 1000.</font>');
        return false;
    }
    if($('#diastolic').val()>999 || $('#diastolic').val()<0)
    {
        $('#error').html('<font color="red">Diastolic entry cannot exceed 1000.</font>');
        return false;
    }
    if($('#mydate').val()=='')
    {
        $('#error').html('<font color="red">Please Enter A Date!</font>');
        return false;
    }
    document.getElementById("bpfrm").submit();

}

$(document).ready(function() {
    $("#bpfrm").submit(function () {
        $('#error').html('');
        formsubmit();
        return false;  // to prevent default submit
    });
});
</script>