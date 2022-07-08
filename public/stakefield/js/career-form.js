//contact form js
(function($) {
    'use strict';


        // validations start here
        $('#career_form').validate({

            rules: {

                con_fname: {
                    required: true
                },
                con_etc: {
                    required: true
                },
                con_file: {
                    required: true
                },
                con_ctc: {
                    required: true
                },
                con_phone: {
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
                con_phone: {
                    required: 'Phone must be filled out.'
                },
                con_file: {
                    required: 'Resume File must be filled out.'
                },
                con_etc: {
                    required: 'Phone must be filled out.'
                },
                con_ctc: {
                    required: 'Phone must be filled out.'
                },

                con_email: {
                    required: 'Email must be filled out.',
                    email: 'Your email must be valid.'
                }
            },

            submitHandler: function() {

                var form = $('#career_form')[0]; // You need to use standard javascript object here
                var formData = new FormData(form);
                formData.append("type", "CAREER_CONTACT");

                var xurl = 'php/send_email.php';
                $('#btn_sent').val('Sending...');
                $('#error_message').html('');
                $('#btn_sent').attr('disabled', true);
                console.log(formData.get('con_file'));
                 alert();
           grecaptcha.ready(function () {
               grecaptcha.execute('6LclZpccAAAAAKwoCySfICyu7RkiM3jxrCpEKIaq', { action: 'submit' }).then(function (token) {
                //   var recaptchaResponse = document.getElementById('recaptchaResponse');
                //   recaptchaResponse.value = token;
                    formData.append("recaptcha_response", token);
                $.ajax({
                    url: xurl,
                    data: formData,
                    type: 'POST',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(result) {
                        result=JSON.parse(result);
                        console.log("result");
                        console.log(result);
                        console.log(result.response);
                        console.log("-end");
                        $('#btn_sent').prop('disabled', false);
                        $('#btn_sent').val('Send enquiry');
                        if (result.response == 'success') {
                            $('#career_form')[0].reset();
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
                    }
                });
                });
                });
            }
        });
}(jQuery));