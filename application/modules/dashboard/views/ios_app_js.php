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
if (isMobile.Android()) {
    $("#ios_and_app").html('<div>This feature is not available in the beta version of the mobile site—but it’s coming soon! Be sure to check back frequently for updates. </div><div>MedSimple is also available as a standalone app for iOS and Android devices. Click on the app store icons below to download the free app today!</div><a href="https://play.google.com/store/apps/details?id=com.mydiabeteshome.medsimple" data-ajax="false"><img src="<?php echo images_url(); ?>google_play.png" style="margin-top:20px; height:81px;padding-top:0.5em;"/></a>');
    }
    
    else if(isMobile.iOS()){
        $("#ios_and_app").html('<div>This feature is not available in the beta version of the mobile site—but it’s coming soon! Be sure to check back frequently for updates. </div><div>MedSimple is also available as a standalone app for iOS and Android devices. Click on the app store icons below to download the free app today!</div><a href="https://itunes.apple.com/us/app/medsimple/id478600758" data-ajax="false"><img src="<?php echo img_url(); ?>banner.jpg" style=" margin-top:20px;height:70px;padding-top:0.5em;"/></a>');
    }
    else {
        $("#ios_and_app").html('<div>This feature is not available in the beta version of the mobile site—but it’s coming soon! Be sure to check back frequently for updates. </div><div>MedSimple is also available as a standalone app for iOS and Android devices. Click on the app store icons below to download the free app today!</div><a href="https://itunes.apple.com/us/app/medsimple/id478600758" data-ajax="false"><img src="<?php echo img_url(); ?>banner.jpg" style="margin-top:20px; height:70px;padding-top:0.5em;"/></a><a href="https://play.google.com/store/apps/details?id=com.mydiabeteshome.medsimple" data-ajax="false"><img src="<?php echo images_url(); ?>google_play.png" style="margin-top:20px;margin-below:20px;height:81px;padding-top:0.5em;"/></a>');
    }
    });
</script>