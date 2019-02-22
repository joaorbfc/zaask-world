<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 21 Feb 2019 16:05:20 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Country
 * 
 * @property string $Code
 * @property string $Name
 * @property string $Continent
 * @property string $Region
 * @property float $SurfaceArea
 * @property int $IndepYear
 * @property int $Population
 * @property float $LifeExpectancy
 * @property float $GNP
 * @property float $GNPOld
 * @property string $LocalName
 * @property string $GovernmentForm
 * @property string $HeadOfState
 * @property int $Capital
 * @property string $Code2
 * 
 * @property \Illuminate\Database\Eloquent\Collection $cities
 * @property \Illuminate\Database\Eloquent\Collection $countrylanguages
 *
 * @package App\Models
 */
class Country extends Eloquent
{
	protected $table = 'country';
	protected $primaryKey = 'Code';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SurfaceArea' => 'float',
		'IndepYear' => 'int',
		'Population' => 'int',
		'LifeExpectancy' => 'float',
		'GNP' => 'float',
		'GNPOld' => 'float',
		'Capital' => 'int'
	];

	protected $fillable = [
		'Name',
		'Continent',
		'Region',
		'SurfaceArea',
		'IndepYear',
		'Population',
		'LifeExpectancy',
		'GNP',
		'GNPOld',
		'LocalName',
		'GovernmentForm',
		'HeadOfState',
		'Capital',
		'Code2'
	];

	public function cities()
	{
		return $this->hasMany(\App\Models\City::class, 'CountryCode');
	}

	public function countrylanguages()
	{
		return $this->hasMany(\App\Models\Countrylanguage::class, 'CountryCode');
	}
}
