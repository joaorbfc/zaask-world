<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 21 Feb 2019 16:05:20 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class City
 * 
 * @property int $ID
 * @property string $Name
 * @property string $CountryCode
 * @property string $District
 * @property int $Population
 * 
 * @property \App\Models\Country $country
 *
 * @package App\Models
 */
class City extends Eloquent
{
	protected $table = 'city';
	protected $primaryKey = 'ID';
	public $timestamps = false;

	protected $casts = [
		'Population' => 'int'
	];

	protected $fillable = [
		'Name',
		'CountryCode',
		'District',
		'Population'
	];

	public function country()
	{
		return $this->belongsTo(\App\Models\Country::class, 'CountryCode');
	}
}
