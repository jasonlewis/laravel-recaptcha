<?php

Autoloader::map(array(
	'Recaptcha\\Recaptcha' =>  __DIR__ . DS . 'recaptcha' . EXT
));

Laravel\Validator::register('recaptcha', function($attribute, $value, $parameters)
{
	$recaptcha = Recaptcha\Recaptcha::recaptcha_check_answer($parameters[0], Laravel\Request::ip(), Laravel\Input::get('recaptcha_challenge_field'), $value);

	return $recaptcha->is_valid;
});