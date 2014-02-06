<script>
function formsubmit()
{
    if ($('#FN').val() != '' && $('#LN').val() != '' && $('#SA').val() != '' && $('#ZC').val() != '' && $('#ct').val() != '' && $('#state').val() != '' && $('#G').val() != '' && $('#race').val() != '' && $('#INL').val() != '' && $('#in').val() != '' && $('#De').val() != '')
    {
        $('#error').html('<font color="red">Please enter all fields.</font>');
        return false;
    }   
    if($('#mydate').val()=='')
    {
        $('#error').html('<font color="red">Please Enter A Date!</font>');
        return false;
    }/*
    if(!isNumber($('#phone').val()))
    {
        $('#error').html('<font color="red">Please enter a number.</font>');
        return false;
    }*/
    document.getElementById("abt_me").submit();
}
function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
$(document).ready(function() {
    $("#abt_me").submit(function () {
        $('#error').html('');
        formsubmit();
        return false;  // to prevent default submit
    });
});
</script>