<?php
session_start();
$_SESSION['lang'] = 'ar';

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
session_destroy();

echo __('blog.divs.post.hello');