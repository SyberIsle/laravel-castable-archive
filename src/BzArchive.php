<?php

namespace SyberIsle\Laravel\Cast\Archive;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * Uses the bzip functions to compress & decompress the data
 *
 * @implements  CastsAttributes<mixed, mixed>
 */
class BzArchive
	implements CastsAttributes
{
	/**
	 * @param Model   $model
	 * @param string  $key
	 * @param mixed   $value
	 * @param mixed[] $attributes
	 *
	 * @return false|string|null
	 */
	public function get($model, string $key, $value, array $attributes): mixed
	{
		return bzdecompress($value);
	}

	/**
	 * @param Model   $model
	 * @param string  $key
	 * @param mixed   $value
	 * @param mixed[] $attributes
	 *
	 * @return false|string|null
	 */
	public function set($model, string $key, $value, array $attributes)
	{
		return bzcompress($value);
	}
}