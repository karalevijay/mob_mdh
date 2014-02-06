<script type="text/javascript">

    $(document).ready(function() {


    });
    function passme(app_id)
    {
        $.ajax({
            url: '<?php echo base_url(); ?>myvisit/edit/' + app_id,
            type: 'POST',
            beforeSend:
                    function()
                    {
                        $("#loading-image").show();
                    },
            success:
                    function(data)
                    {
                        var object = $.parseJSON(data);
                        var reasons = new Array();
                        var providers = new Array();
                        var reasons = object['reason']['reasons'];
                        var reason = object['appointment']['reason'];
                        var provider = object['appointment']['prescriber_name'];
                        document.getElementById('app_idEdit').value = object['appointment']['app_id'];
                        $('#app_idEdit').val(object['appointment']['app_id']);
                        $('#mydateEdit').val(object['appointment']['date']);
                        $('#hourEdit').val(object['appointment']['hour']);
                        $('#minuteEdit').val(object['appointment']['minute']);
                        for (i = 0; i < reasons.length; i++)
                        {
                            if (reason == reasons[i]['text'])
                            {
                                $('#reasonEdit').val(reasons[i]['res_id']);
                            }
                        }
                        for (i = 0; i < providers.length; i++)
                        {
                            if (provider == providers[i]['prescriber_name'])
                            {
                                $('#providerEdit').val(providers[i]['prescriber_id']);
                            }
                        }
                        if (object['appointment']['reminder'] == null)
                        {
                            $('#mydateEdit').val("0");
                        }
                        else
                        {
                            $('#mydateEdit').val("1");
                        }

                        console.log(data.reason);
                        $("#edit").show();
                        $( "#edit" ).popup();
                        $("#loading-image").hide();
                        $('#triggerEdit').trigger('click');
                    },
            error:
                    function(html)
                    {
                        alert('Server Error!');
                        $("#loading-image").hide();
                    }
        });
    }


</script>