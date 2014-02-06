//count=0;
//window.onresize=function(){window.location.href = window.location.href;};


$(document).on('pagebeforecreate', '#index', function() {
    var interval = setInterval(function() {
        $.mobile.loading('show');
        clearInterval(interval);
    }, 1);
});

$(document).on('pageshow', '#index', function() {
    var interval = setInterval(function() {
        $.mobile.loading('hide');
        clearInterval(interval);
    }, 1);
});

$(window).on('load', function() {


    $("#reason1").click(function() {
        val = $("select#reason1 option:selected").val();
        if (val == 'other')
        {
            $('.other1').show();

        }
        else
        {
            $('.other1').hide();
        }
    });


    $("#reason").click(function() {
        val = $("select#reason option:selected").val();

        if (val == 'other')
        {
            $('.other').show();

        }
        else
        {
            $('.other').hide();
        }
    });


    $("#popupBasic").popup({
        afterclose: function() {
            $('.other').hide();
        }
    });

    $(".editBasicPopup").popup({
        afterclose: function( ) {
            $('.other1').hide();
        }
    });


});

$(document).on('pagebeforecreate', '#index', function() {
    var interval = setInterval(function() {
        $.mobile.loading('show');
        clearInterval(interval);
    }, 1);
});

$(document).on('pageshow', '#index', function() {
    var interval = setInterval(function() {
        $.mobile.loading('hide');
        clearInterval(interval);
    }, 1);
});



//visit goal

//img_url='http://localhost/mob_mdh/assets/img/';
//base_url='http://localhost/mob_mdh/';
//count=0;
//    function loadgoal(cnt) {
//        if(count==0)
//        {
//            count=cnt;
//        }
//        if ($("input[name=g" + count + "]").val() == '')
//        {
//            
//            $('#error').html('<font color="red">Please fill up old goals to set more goals!</font>');
//
//        }
//        else
//        {
//            count++;
//            $('#error').html('');
//            var data = "<div class='mb5 fLeft per100'>\n\
//<h4>Goal "+count+"</h4>\n\
//<div class='per80 fLeft'>\n\
//<input type='text' name='g"+count+"' placeholder='Loose your 5Kg in 6 months' value='' />\n\
//<input type='hidden' id='gid"+count+"' name='gid"+count+"'  value=''/>\n\
//</div>\n\
//<span class='fLeft mt15 ml10'>\n\
//<a href='javascript:void(0);' onclick=editgoal('g"+count+"'); >\n\
//<img src='"+img_url+"edit-ico.png' class='per50'>\n\
//</a>\n\
//</span>\n\
//</div>";
//    
//            $('#goals').append(data).trigger("create");
//        }
//    }
//function editgoal(tag) {
//
//        $('#' + tag).removeAttr('readonly');
//    }
//    function submit_goals() {
//        var temp = $('#goalform').serializeArray();
//        $.ajax({
//            url: '<?php echo base_url(); ?>myvisit/submit_goal/<?php echo $app_id; ?>/' + count,
//            type: 'Post',
//            data: temp,
//            error: function() {
//                $('#error').html('<font color="red">Please fill in all required fields for adding Data!</font>');
//            },
//            success: function(data) {
//                if (data == '0' )
//                    window.location ="'"+base_url+"myvisit/finalize_app/"+app_id+"'";
//                else
//                    $('#error').html('<font color="red">The site has encountered a server error. Please refresh the page.</font>');
//
//
//            }
//        });
//
//    }
//    
//    
//    //visit meds
//    function visit_meds_edit(app_id) {
//        $.ajax({
//            url: base_url+'myvisit/edit_meds/' + app_id,
//            type: 'POST',
//            error: function() {
//                document.title = 'error';
//            },
//            success: function(data) {
//                $("#popupBasic").html("");
//               $(data).appendTo( "#popupBasic" ).trigger( "create" );
//                $("#triggerEdit").trigger('click');
//            }
//        });
//        
//    }
//    
//    
//   //visits questions 
//    
//    
//    function loadquestion() {
//        if ($("input[name=q" + count + "]").val() == '')
//        {
//            $('#error').html('<font color="red">Please fill up old questions to add more question!</font>');
//
//        }
//        else
//        {
//            count++;
//            $('#error').html('');
//            var data = "<div class='mb5 fLeft per100'>\n\
//<h4>Question " + count + "</h4><div class = 'per80 fLeft'>\n\
//<input type = 'text' name='q" + count + "' placeholder = 'Loose your 5Kg in 6 months'  value = '' /></div>\n\
//<input type='hidden' id='qid" + count + "' name='qid" + count + "' value=''/>\n\
//<span class = 'fLeft mt15 ml10'><a href='javascript:void(0);' onclick=loadanswer('a" + count + "')><img src ='"+img_url+"enterAns.png' ></a></span></div>\n\
//<div class = 'mb5 fLeft per80' >\n\
//<textarea cols = '40' class = 'mt0' rows = '8' name = 'a" + count + "' id = 'a" + count + "' style='display:none' placeholder = 'Enter your Answer' id = 'textarea-1' >\n\
//</textarea>\n\
//</div>";
//            $('#questions').append(data).trigger("create");
//        }
//    }
//
//
//    function loadanswer(tag) {
//
//        $('#' + tag).css('display', 'block');
//    }
//
//    function submit_questions(app_id) {
//        var temp = $('#quest').serializeArray();
//        $.ajax({
//            url: base_url+'myvisit/submit_questions/'+app_id+'/' + count,
//            type: 'Post',
//            data: temp,
//            error: function() {
//                $('#error').html('<font color="red">Please fill in all required fields for adding Data!</font>');
//            },
//            success: function(data) {
////                console.log(data);
//                if (data == '0' )
//                    window.location = base_url+"myvisit/todays_visit/"+app_id+"/6";
//                else
//                    $('#error').html('<font color="red">The site has encountered a server error. Please refresh the page.</font>');
//
//
//            }
//        });
//
//    }


// document.addEventListener('load', function() {
//                $.mobile.loading("show");
//            }, true);

$('*[data-ajax="false"]').click(function() {
    $.mobile.loading("show");
});
//$(document).ready(function(){     
//      $.mobile.loading("hide");
//});
