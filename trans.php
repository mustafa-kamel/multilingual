<?php
/* EXAMPLE TO SET THE SESSION FOR THE CURRENT LOCALE */
session_start();
$_SESSION['lang'] = 'ar';

/**
 * This function retrieves the data string from the file
 * @param  array  $data   the file which contains the required string
 * @param  array  $params the keys to retrieve the string from the array
 * @return [type]         the required string if found or null if not found
 */
function trans(array $data, array $params) :? string {
	foreach ($params as $k) {
		if (!isset($data[$k])) {
			break;
		}

		if (!is_array($data[$k])) {
			return $data[$k];
		}

		$data = $data[$k];
	}

	return null;
}

/**
 * This function finds the file that contains the required string if found then call the trans function to retrieve teh string
 * @param  string $string the key segment to the required string
 * @return [type]         the required string if found and null if not found
 */
function __(string $string) :? string {
	$params = explode('.', $string);
	$path = $_SESSION['lang'] . '/';

	foreach ($params as $k => $segment) {
		unset($params[$k]);
		if (is_file($path . $segment . '.php')) {
			$path .= $segment . '.php';
			break;
		}

		$path .= $segment . '/';
	}

	if (!is_file($path)) {
		return null;
	}

	return trans(include($path), $params);
}


/* EXAMPLE FOR TESTRING */
echo __('blog.divs.post.hello');

session_destroy();