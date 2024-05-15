window.addEventListener('DOMContentLoaded', (event) => {
    jQuery(function () {
        //JQuery start below.

        // Launch MWF by clicking on the mwf-trigger start.
        function mwfTrigger() {
            jQuery('.mwf-trigger').click(function () {
                jQuery('#mwf-overlay').removeClass('mwf-hide').addClass('mwf-show');
                jQuery('.mwf-trigger').slideUp(500);
                setTimeout(function () {
                    jQuery('#mwf').removeClass('mwf-hide').addClass('mwf-show');
                }, 500);
            });
        }
        mwfTrigger();
        // Launch MWF by clicking on the mwf-trigger end.

        // Close MWF by clicking on the mwf-close start.
        function mwfClose() {
            jQuery('.mwf-close').click(function () {
                jQuery('#mwf').removeClass('mwf-show').addClass('mwf-hide');
                setTimeout(function () {
                    jQuery('#mwf-overlay').removeClass('mwf-show').addClass('mwf-hide');
                    jQuery('.mwf-trigger').slideDown(500);
                }, 500);
            });
        }
        mwfClose();
        // Close MWF by clicking on the mwf-close end.




        //GET FORM START
        var $mwfNameValid = false;
        var $mwfPhoneValid = false;
        var $mwfEmailValid = false;
        var $mwfDeptValid = false;
        var $mwfMessageValid = false;
        var $mwfCaptchaValid = false;
        var $mwfPhoneNumber = '';
        var $mwfDept = '';

        function validateForm() {
            if ($mwfNameValid && $mwfPhoneValid && $mwfEmailValid && $mwfDeptValid && $mwfMessageValid && $mwfCaptchaValid) {
                jQuery('.mwf-form.mwf-hide').addClass('mwf-show').removeClass('mwf-hide');
                jQuery('button#mwf-submit').addClass('mwf-show').removeClass('mwf-hide');
            } else {
                jQuery('.mwf-form.mwf-show').addClass('mwf-hide').removeClass('mwf-show');
                jQuery('button#mwf-submit').addClass('mwf-hide').removeClass('mwf-show');
            }
        }

        // Validate Name
        jQuery('#mwf-name').keyup(function () {
            var mwfName = jQuery(this).val();
            mwfName = mwfName.replace(/[^a-zA-Z\s]/g, '');
            jQuery(this).val(mwfName);

            if (mwfName.replace(/\s/g, '').length > 2) {
                $mwfNameValid = true;
                jQuery('#mwf-name').addClass('mwf-correct').removeClass('mwf-wrong');
                jQuery('#mwf-name-field').find('small').addClass('mwf-correct').removeClass('mwf-wrong').text('Valid');
            } else {
                $mwfNameValid = false;
                jQuery('#mwf-name').addClass('mwf-wrong').removeClass('mwf-correct');
                jQuery('#mwf-name-field').find('small').addClass('mwf-wrong').removeClass('mwf-correct').text('Name must be letter only');
            }

            validateForm();
        });

        // Validate Phone
        jQuery('#mwf-phone').keyup(function () {
            var mwfPhone = jQuery(this).val();

            if (mwfPhone.length >= 11) {
                $mwfPhoneValid = true;
                jQuery('#mwf-phone').addClass('mwf-correct').removeClass('mwf-wrong');
                jQuery('#mwf-phone-field').find('small').addClass('mwf-correct').removeClass('mwf-wrong').text('Valid');
            } else {
                $mwfPhoneValid = false;
                jQuery('#mwf-phone').addClass('mwf-wrong').removeClass('mwf-correct');
                jQuery('#mwf-phone-field').find('small').addClass('mwf-wrong').removeClass('mwf-correct').text('Phone must be valid');
            }

            validateForm();
        });

        // Validate Email
        jQuery('#mwf-email').keyup(function () {
            var mwfEmail = jQuery(this).val();
            var mwfEmailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (mwfEmailPattern.test(mwfEmail)) {
                $mwfEmailValid = true;
                jQuery('#mwf-email').addClass('mwf-correct').removeClass('mwf-wrong');
                jQuery('#mwf-email-field').find('small').addClass('mwf-correct').removeClass('mwf-wrong').text('Valid');
            } else {
                $mwfEmailValid = false;
                jQuery('#mwf-email').addClass('mwf-wrong').removeClass('mwf-correct');
                jQuery('#mwf-email-field').find('small').addClass('mwf-wrong').removeClass('mwf-correct').text('Email must be valid');
            }

            validateForm();
        });

        // Validate Dept
        jQuery('#mwf-dept').change(function () {
            var mwfDept = jQuery(this).val();

            if (mwfDept !== 'choose') {
                $mwfDeptValid = true;
                $mwfPhoneNumber = jQuery(this).find('option:selected').data('mwf-phone');
                $mwfDept = mwfDept;
            } else {
                $mwfDeptValid = false;
            }

            validateForm();
        });

        // Validate Message
        jQuery('#mwf-message').keyup(function () {
            var mwfMessage = jQuery(this).val();

            if (mwfMessage.replace(/\s/g, '').length >= 5) {
                $mwfMessageValid = true;
                jQuery('#mwf-message').addClass('mwf-correct').removeClass('mwf-wrong');
                jQuery('#mwf-message-field').find('small').addClass('mwf-correct').removeClass('mwf-wrong').text('Valid');
            } else {
                $mwfMessageValid = false;
                jQuery('#mwf-message').addClass('mwf-wrong').removeClass('mwf-correct');
                jQuery('#mwf-message-field').find('small').addClass('mwf-wrong').removeClass('mwf-correct').text('Message must be at least 5 characters');
            }

            validateForm();
        });

        // Validate Captcha
        jQuery('#mwf-captcha').keyup(function () {
            var mwfCaptcha = jQuery(this).val();
            var mwfCaptchaAnswer = jQuery('.mwf-captcha-ask').data('answer');

            if (mwfCaptcha === String(mwfCaptchaAnswer)) {
                $mwfCaptchaValid = true;
                jQuery('#mwf-captcha').addClass('mwf-correct').removeClass('mwf-wrong');
            } else {
                $mwfCaptchaValid = false;
                jQuery('#mwf-captcha').addClass('mwf-wrong').removeClass('mwf-correct');
            }

            validateForm();
        });

        // Submit Button
        jQuery('#mwf-submit').click(function (e) {
            e.preventDefault();
            if ($mwfNameValid && $mwfPhoneValid && $mwfEmailValid && $mwfDeptValid && $mwfMessageValid && $mwfCaptchaValid) {
                var mwfName = jQuery('#mwf-name').val().replace(/\s/g, '%20');
                var mwfPhone = jQuery('#mwf-phone').val().replace(/\s/g, '%20');
                var mwfEmail = jQuery('#mwf-email').val().replace(/\s/g, '%20');
                var mwfMessage = jQuery('#mwf-message').val().replace(/\s/g, '%20');
                var mwfUrl = `//api.whatsapp.com/send?phone=${$mwfPhoneNumber}&text=hello*%20${$mwfDept}*%20nama%20saya%20*${mwfName}*%20email%20saya%20*${mwfEmail}*%20nomor%20telepon%20saya%20*${mwfPhone}*%20pesan%20*${mwfMessage}*`;
                window.location.href = mwfUrl;
            }
        });
    });


    //GET FORM END



    //JQuery end above.
});