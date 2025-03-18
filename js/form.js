$(document).ready(function(e) {
     $(".inquiry-form").on('submit', (function(e) {
          e.preventDefault();
          var validjoin;
          validjoin = validjoinform();
          if (validjoin) {
               // $('#loader-icon-contact-form').show();
               $.ajax({
                    url: "contact-form-email.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                         $("#mail-status-contact-form").html(data);
                         // $('#loader-icon-contact-form').hide();
                    },
                    error: function() {}

               });
          }
     }));

     $(".form-control").on("keyup", function() {
          $(this).next(".info").html("");
     });

     function validjoinform() {
          var validjoinform = true;
          $('.info').html('');
          if (!$("#fname").val()) {
               $("#fname-info").html("Required");
               validjoinform = false;
          }
          if (!$("#lname").val()) {
               $("#lname-info").html("Required");
               validjoinform = false;
          }
          if (!$("#email").val()) {
               $("#email-info").html("Required");
               validjoinform = false;
          }
          if (!$("#phone").val()) {
               $("#phone-info").html("Required");
               validjoinform = false;
          }
          if (!$("#purpose").val()) {
               $("#purpose-info").html("Required");
               validjoinform = false;
          }
           if (!$("#segment").val()) {
               $("#segment-info").html("Required");
               validjoinform = false;
          }
          if (!$("#products").val()) {
               $("#products-info").html("Required");
               validjoinform = false;
          }
          if (!$("#message").val()) {
               $("#message-info").html("Required");
               validjoinform = false;
          }
           if (!$("#subject").val()) {
               $("#subject-info").html("Required");
               validjoinform = false;
          }
          if (!$("#company").val()) {
               $("#company-info").html("Required");
               validjoinform = false;
          }
          return validjoinform;
     }
});