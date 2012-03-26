# reCAPTCHA for the Laravel framework

This is a bundle of the reCAPTCHA library now developed by Google. This bundle will allow you to validate captchas using the reCAPTCHA API. **Please note that this is for the server-side validation only!**

Please see the [reCAPTCHA Introduction](https://developers.google.com/recaptcha/intro) on the Google Developers website for help with getting the client-side
configured as well as any customization you may wish to do.

## Installation
Install reCAPTCHA via Artisan:

~~~~
php artisan bundle:install recaptcha
~~~~

Add the following to your **application/bundles.php** file:

~~~~
'recaptcha' => array('auto' => true);
~~~~

reCATPCHA registers a validation rule (validate_recaptcha) to your custom validators in its **start.php** file.

## Usage
This bundle is designed to be used with Laravels validator but it can just as easily be used as a standalone class.    
Here is an example validation method:

~~~~
$rules = array(
	'recaptcha_response_field' => 'recaptcha:RECAPTCHA_PRIVATE_KEY'
);

$validator = Validator::make($input, $rules);

if($validator->valid())
{
	// reCAPTCHA was entered correctly
}
~~~~

Remember you'll need to get your public and private keys by signing up above.

If you'd prefer to check a captcha without using the Validator you can simply try the following:

~~~~
$recaptcha = Recaptcha\Recaptcha::recaptcha_check_answer('RECAPTCHA_PRIVATE_KEY', Laravel\Request::ip(), Laravel\Input::get('recaptcha_challenge_field'), Laravel\Input::get('recaptcha_response_field'));

if($recaptcha->is_valid)
{
	// reCAPTCHA was entered correctly
}
~~~~

## Further Information
This bundle just uses the PHP class from the reCAPTCHA library. If you have any further questions try looking through the [reCAPTCHA documentation](https://developers.google.com/recaptcha/intro) on the Google Developers website.