<?php

Autoloader::map(array(
	'Recaptcha\\Recaptcha' =>  __DIR__ . DS . 'recaptcha' . EXT
));

Laravel\Validator::register('recaptcha', function($attribute, $value, $parameters)
{
	$recaptcha = Recaptcha\Recaptcha::recaptcha_check_answer($parameters[0], Laravel\Request::ip(), Laravel\Input::get('recaptcha_challenge_field'), $value);

	return $recaptcha->is_valid;
});

Laravel\Form::macro('recaptcha', function($publicKey, $captchaError = null, $recaptchaOptions = array())
{
	$html = "";
	if(count($recaptchaOptions) > 0)
	{
		$html .= '<script>var RecaptchaOptions = '. json_encode($recaptchaOptions) .'</script>';
	}
	$html .= Recaptcha\Recaptcha::recaptcha_get_html($publicKey, $captchaError);

	return $html;
});