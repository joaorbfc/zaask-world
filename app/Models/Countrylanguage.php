<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 21 Feb 2019 16:05:20 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Countrylanguage
 * 
 * @property string $CountryCode
 * @property string $Language
 * @property string $IsOfficial
 * @property float $Percentage
 * 
 * @property \App\Models\Country $country
 *
 * @package App\Models
 */
class Countrylanguage extends Eloquent
{
	protected $table = 'countrylanguage';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Percentage' => 'float'
	];

	protected $fillable = [
		'IsOfficial',
		'Percentage'
	];

	public function country()
	{
		return $this->belongsTo(\App\Models\Country::class, 'CountryCode');
	}
}
