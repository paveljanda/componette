<?php

namespace App\Model\Templating;

final class GithubAvatar
{

	const URL1 = 'https://avatars.githubusercontent.com/%s';
	const URL2 = 'https://github.com/%s.png';

	/**
	 * @param string $user
	 * @param array $opts
	 * @return string
	 */
	public static function generate($user, array $opts = []): string
	{
		$url = self::URL1;

		if (isset($opts['s'])) {
			$url .= '?s=' . intval($opts['s']);
		} else {
			$url .= '?s=60';
		}

		return sprintf($url, $user);
	}

}
