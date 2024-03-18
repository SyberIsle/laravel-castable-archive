<?php

namespace SyberIsle\Laravel\Cast\Archive\Test;

use Illuminate\Database\Eloquent\Model;
use Orchestra\Testbench\TestCase;
use SyberIsle\Laravel\Cast\Archive\GzArchive;

class GzArchiveTest
	extends TestCase
{
	protected function buildModel()
	{
		return new class extends Model {
			protected $fillable = ['test'];
			protected $casts = [
				'test' => GzArchive::class
			];

			public function getRawAttribute(string $key): mixed
			{
				return $this->attributes[$key];
			}
		};
	}

	public function testGetDecompresses()
	{
		$model = $this->buildModel();
		$model->setRawAttributes(['test' => gzdeflate('kakaw')]);

		self::assertEquals('kakaw', $model->test);
	}

	public function testSetCompresses()
	{
		$model = $this->buildModel();
		$model->test = 'kakaw';

		self::assertEquals($model->getRawAttribute('test'), gzdeflate('kakaw'));
	}
}