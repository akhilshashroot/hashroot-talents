//contact form js
(function($) {
    'use strict';


        // validations start here
        $('#contact_form').validate({

            rules: {

                con_fname: {
                    required: true
                },
                con_cname: {
                    required: true
                },
                
                con_message: {
                    required: true
                },
                con_email: {
                    required: true,
                    email: true
                }
            },

            messages: {

                con_fname: {
                    required: 'First name must be filled out.'
                },
                con_cname: {
                    required: 'Last name must be filled out.'
                },
                
                con_message: {
                    required: 'Message must be filled out.'
                },

                con_email: {
                    required: 'Email must be filled out.',
                    email: 'Your email must be valid.'
                }
            },

            submitHandler: function() {
                var con_fname = $('#con_fname').val();
                var con_lname = $('#con_cname').val();
                var con_message = $('#con_message').val();
                var con_email = $('#con_email').val();

                var xurl = 'php/send_email.php?type=CONTACT_US&con_email=' + con_email + '&con_fname=' + con_fname + '&con_cname=' + con_lname + '&con_message=' + con_message;

                $('#btn_sent').val('Sending...');
                $('#error_message').html('');
                $('#btn_sent').attr('disabled', true);
 grecaptcha.ready(function () {
               grecaptcha.execute('6LclZpccAAAAAKwoCySfICyu7RkiM3jxrCpEKIaq', { action: 'submit' }).then(function (token) {
                //   var recaptchaResponse = document.getElementById('recaptchaResponse');
                //   recaptchaResponse.value = token;
                   xurl=xurl+"&recaptcha_response="+token;
                $.ajax({
                    type: 'POST',
                    url: xurl,
                    dataType: 'json',
                    success: function(result) {
                        console.log(result);
                        // result=JSON.parse(result);
                        $('#btn_sent').prop('disabled', false);
                        $('#btn_sent').val('Send enquiry');
                        if (result.response == 'success') {
                            $('#contact_form')[0].reset();
                            $('#error_message').html(result.message);
                            $('#error_message').addClass('contact-confirmation');
                            var selectedEffect = 'blind';

                            var options = {};

                            $('#error_message').hide(selectedEffect, options, 2000);
                            return false;
                        } else if (result.response == 'error') {
                            $('#error_message').html(result.message);
                            $('#error_message').addClass('contact-confirmation');
                        }
                    },
                    error: function (error) { // error callback 
                          console.log("error");
                          console.log(error);
                         
                          $('#error_message').html("Failed to send server error");
                    }
                });
                });
                });
            }
        });
}(jQuery));