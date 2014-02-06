<script>
function add_medform()
{

    if($('#sdf1').val()=='' && $('#sds1').val()=='' && $('#hm1').val()=='' && $('#wmtf1').val()=='' && $('#si1').val()=='')
    {
        $('#error').html('<font color="red">Please enter at least one doses and how offen you take.</font>');
        return false;
    }
    else if( (($('#sdf1').val()>700 || $('#sdf1').val()<30)&& ($('#sdf1').val()!='' && $('#sdf1').val()!=0))  || (($('#sds1').val()>700 || $('#sds1').val()<30)&& ($('#sds1').val()!='' && $('#sds1').val()!=0)) || (($('#hm1').val()>700 || $('#hm1').val()<30)&& ($('#hm1').val()!='' && $('#hm1').val()!=0)) || (($('#wmtf1').val()>700 || $('#wmtf1').val()<30)&& ($('#wmtf1').val()!='' && $('#wmtf1').val()!=0))|| (($('#si1').val()>700 || $('#si1').val()<30)&& ($('#si1').val()!='' && $('#si1').val()!=0) ))
    {
        $('#error').html('<font color="red">Invalid sugar entered. Please enter a number between 30 and 700.</font>');
        return false;    
    }
    
$(document).ready(function() {
    $("#add_med").submit(function () {
        $('#error').html('');
        add_medform();
        return false;  // to prevent default submit
    });
});
</script>