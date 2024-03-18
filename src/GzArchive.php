<?php

namespace SyberIsle\Laravel\Cast\Archive;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * Uses the gzip deflate functions to compress & decompress the data
 *
 * @implements  CastsAttributes<mixed, mixed>
 */
class GzArchive
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
		return gzinflate($value);
	}

	/**
	 * @param Model   $model
	 * @param string  $key
	 * @param mixed   $value
	 * @param mixed[] $attributes
	 *
	 * @return false|string|null
	 */
	public function set($model, string $key, $value, array $attributes): mixed
	{
		return gzdeflate($value);
	}
}