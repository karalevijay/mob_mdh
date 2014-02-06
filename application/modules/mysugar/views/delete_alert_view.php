<script type="text/javascript">
    $(document).delegate('#opendialog', 'click', function() {
        // NOTE: The selector can be whatever you like, so long as it is an HTML element.
        //       If you prefer, it can be a member of the current page, or an anonymous div
        //       like shown.
        $('<div>').simpledialog2({
            mode: 'blank',
            headerText: 'Some Stuff',
            headerClose: true,
            dialogAllow: true,
            dialogForce: true,
            blankContent : 
                "Are You Sure You Want to Delete Sugar?<br/>"+
            "<a rel='close' data-role='button' href='<?php echo base_url(); ?>mysugar/delete/<?php echo $content_data[0]['sugar_date'].'/'.$content_data['tab']; ?>' data-ajax='false' class='delete smallFont3' data-theme='red' data-role='button'>Delete</a><a rel='close' data-role='button' href='#'>Cancel</a>"
        })
    })
    $('#simpleraw').simpledialog('refresh');
</script>