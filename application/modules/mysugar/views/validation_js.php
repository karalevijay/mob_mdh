<script>
function formsubmit()
{

    if($('#b4b').val()=='' && $('#ab').val()=='' && $('#b41').val()=='' && $('#al').val()=='' && $('#b4s').val()=='' && $('#as').val()=='' && $('#bt').val()=='' && $('#o').val()=='')
    {
        $('#error').html('<font color="red">Please enter at least one sugar number and the date.</font>');
        return false;
    }
    else if( (($('#b4b').val()>700 || $('#b4b').val()<30)&& ($('#b4b').val()!='' && $('#b4b').val()!=0))  || (($('#ab').val()>700 || $('#ab').val()<30)&& ($('#ab').val()!='' && $('#ab').val()!=0)) || (($('#b4l').val()>700 || $('#b4l').val()<30)&& ($('#b4l').val()!='' && $('#b4l').val()!=0)) || (($('#al').val()>700 || $('#al').val()<30)&& ($('#al').val()!='' && $('#al').val()!=0))|| (($('#b4s').val()>700 || $('#b4s').val()<30)&& ($('#b4s').val()!='' && $('#b4s').val()!=0) )|| (($('#as').val()>700 || $('#as').val()<30)&& ($('#as').val()!=''&& $('#as').val()!=0))|| (($('#bt').val()>700 || $('#bt').val()<30)&& ($('#bt').val()!='' && $('#bt').val()!=0))|| (($('#o').val()>700 || $('#o').val()<30)&& ($('#o').val()!='' && $('#o').val()!=0 )))
    {
        $('#error').html('<font color="red">Invalid sugar entered. Please enter a number between 30 and 700.</font>');
        return false;    
    }
    if($('#sugar_date').val()=='')
    {
        $('#error').html('<font color="red">Please Enter A Date!</font>');
        return false;
    }
    
    document.getElementById("sugarform").submit();
}

$(document).ready(function() {
    $("#sugarform").submit(function () {
        $('#error').html('');
        formsubmit();
        return false;  // to prevent default submit
    });
});
</script>