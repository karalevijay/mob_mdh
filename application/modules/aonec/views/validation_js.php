<script>
function formsubmit()
{
    if($('#result').val()>100 || $('#result').val()<0)
    {
        $('#error').html('<font color="red">Please enter a number less than or equal to 99.9.</font>');
        return false;
    }   
    if($('#mydate').val()=='')
    {
        $('#error').html('<font color="red">Please Enter A Date!</font>');
        return false;
    }
    if(!isNumber($('#result').val()))
    {
        $('#error').html('<font color="red">Please enter a number.</font>');
        return false;
    }
    document.getElementById("a1cfrm").submit();
}
function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
$(document).ready(function() {
    $("#a1cfrm").submit(function () {
        $('#error').html('');
        formsubmit();
        return false;  // to prevent default submit
    });
});
</script>