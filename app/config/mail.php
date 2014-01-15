<?php

return array(
	'driver' => 'smtp',
	'host' => 'mail.numixproject.org',
	'port' => 26,
	'from' => array('address' => 'mailer@numixproject.org', 'name' => 'mailer'),
	'encryption' => 'tls',
	'username' => "mailer@numixproject.org",
	'password' => '!techromium!',
	'sendmail' => '/usr/sbin/sendmail -bs',
	'pretend' => false,
	/*'host' => 'smtp.gmail.com',
	'port' => 587,
	'from' => array('address' => 'numixmailer@gmail.com', 'name' => 'numix mailer'),
	'encryption' => 'tls',
	'username' => "numixmailer@gmail.com",
	'password' => 'poundflesh!~',
	'sendmail' => '/usr/sbin/sendmail -bs',
	'pretend' => false,*/

);