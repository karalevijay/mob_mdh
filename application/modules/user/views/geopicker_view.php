<script>
    $(window).ready(function() {
        navigator.geolocation.getCurrentPosition(success, error);
    });
    function success(pos)
    {
        var lat = pos.coords.latitude;
        var lng = pos.coords.longitude;
        //var data = pos.coords.postal_code;
        var urls = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng + "&sensor=true";
        $.ajax({
            dataType: "json",
            url: urls,
            success: function(response) {
                var jsonData = JSON.stringify(response);
                $.each(response.results, function(key, value) {
                    $.each(response.results[key], function(key, value) {
                        if (key == 'address_components')
                        {
                            for (var i = 0; i < value.length; i++)
                            {
                                if (value[i]['types'][0] == 'postal_code')
                                {
                                    console.log(value[i]['types'], value[i]['long_name']);
                                    $("#zip").val(value[i]['long_name']);

                                }
                            }
                        }

                    });
                });
            }
        });
    }

    function error(details) {
        
    }
</script>
<script>
    function formsubmit()
    {
        var e = document.getElementById("diabetestype");
        var strUser = e.options[e.selectedIndex].value;
        if ($('#email').val() == '' || $('#firstname').val() == '' || $('#password').val() == '' || $('#repassword').val() == '' || $('#zip').val() == '')
        {
            $('#error').html('<font color="red">Please fill in all required fields for registration.</font>');
            return false;
        }
        if ($('#password').val().length < 6)
        {
            $('#error').html('<font color="red">Password should be greater than 6 letters.</font>');
            return false;
        }
        if (strUser == '')
        {
            $('#error').html('<font color="red">Please select Diabetes Type.</font>');
            return false;
        }
        if ($('#tac:checked').val() != '1')
        {
            $('#error').html('<font color="red">Please accept Terms & Condition.</font>');
            return false;
        }
        if (validateEmail($('#email').val()) == false)
        {
            $('#error').html('<font color="red">Please enter valid email.</font>');
            return false;
        }
        if ($('#password').val() != $('#repassword').val())
        {
            $('#error').html('<font color="red">The password fields do not match.</font>');
            return false;
        }
        document.getElementById("registerform").submit();
    }
    function validateEmail(emailText) {
        var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
        if (pattern.test(emailText)) {
            return true;
        } else {
            return false;
        }
    }
    $(document).ready(function() {
        $("#registerform").submit(function() {
            $('#error').html('');
            formsubmit();
            return false;  // to prevent default submit
        });
    });
</script>
