<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Status_helper
{
	/**
	 * @param int $status
	 * @return string
	 */
	static function isBuy(int $status): string
	{
		if (!$status)
			return 'need to buy';

		return 'bought';
	}

	/**
	 * @param int $category_id
	 * @return string
	 */
	static function whichCategory(int $category_id) : string
	{
		if (!$category_id)
			return 'non category';

		return 'dodelay';
	}

	/**
	 * @param int $timeCode
	 * @return string
	 */
	static function whichTime(int $timeCode) : string
	{
		if (!$timeCode)
			return 'non time';

		return 'dodelay';
	}

	/**
	 * @param int $status
	 * @return string
	 */
	static function isActive(int $status): string
	{
		if (!$status)
			return 'inactive';

		return 'active';
	}
}
