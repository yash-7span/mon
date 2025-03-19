$(document).ready(function(e) {
     $("#subscribe-form").on('submit', (function(e) {
          e.preventDefault();
          $("#mail-status-subscriber-form").html("");
          $("#newsletterEmail-info").html("");
          var validjoin;
          validjoin = validjoinform();
          if (validjoin) {

               $.ajax({
                    url: "letstalk.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                         $("#mail-status-subscriber-form").html(data);
                    },
                    error: function() {}
               });
          }
          //$('#loader-icon-subscriber-form').hide();
     }));

     function validjoinform() {
          var validjoinform = true;
          // $(".form-controls").css('background-color','');
          // $(".info").html('');


          if (!$("#newsletterEmail").val()) {
               $("#newsletterEmail-info").html("Required");
               validjoinform = false;
               // $('#loader-icon-subscriber-form').hide();
          }

          return validjoinform;
     }
});