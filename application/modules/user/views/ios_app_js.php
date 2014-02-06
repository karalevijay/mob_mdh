<script>
$( document ).ready(function() {

    var isMobile = {
                    Android: function() {
                        return navigator.userAgent.match(/Android/i);
                    },
                    BlackBerry: function() {
                        return navigator.userAgent.match(/BlackBerry/i);
                    },
                    iOS: function() {
                        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
                    },
                    Opera: function() {
                        return navigator.userAgent.match(/Opera Mini/i);
                    },
                    Windows: function() {
                        return navigator.userAgent.match(/IEMobile/i);
                    },
                    any: function() {
                        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
                    }
                };
//if (isMobile.Android()) {
//    $("#ios_and_app").html('<a href="https://play.google.com/store/apps/details?id=com.mydiabeteshome.medsimple" data-ajax="false"><img src="<?php // echo images_url(); ?>google_play.png" style="height:70px;width:95%;padding-top:0.5em;"/></a>');
//    }
//    
//    else if(isMobile.iOS()){
//        $("#ios_and_app").html('<a href="https://itunes.apple.com/us/app/medsimple/id478600758" data-ajax="false"><img src="<?php // echo img_url(); ?>banner.jpg" style=" height:70px;width:95%;padding-top:0.5em;"/></a>');
//    }
//    else {
//        $("#ios_and_app").html('<a href="https://itunes.apple.com/us/app/medsimple/id478600758" data-ajax="false"><img src="<?php // echo img_url(); ?>banner.jpg" style=" height:70px;width:95%;padding-top:0.5em;"/></a>');
//    }
//    
    });
</script>