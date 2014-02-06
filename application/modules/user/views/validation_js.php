<script>
    function formsubmit()
    {
        if ($('#email').val() == '' || $('#password').val() == '')
        {
            $('#error').html('<font color="red">Both fields are required.</font>');
            return false;
        }
        if (validateEmail($('#email').val())==false)
        {
            $('#error').html('<font color="red">Please enter valid email.</font>');
            return false;
        }
        
        document.getElementById("loginform").submit();
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
        $("#loginform").submit(function() {
            $('#error').html('');
            formsubmit();
            return false;  // to prevent default submit
        });
    });
</script>