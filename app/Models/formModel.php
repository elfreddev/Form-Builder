<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formModel extends Model
{
    public $table       = 'form';
	public $timestamps  = TRUE;
	protected $fillable = [
		'name',
        'code',
		'effective_date_from',
        'effective_date_to',
        'project_id',
        'contributors',
        'author_id',
        'questionaire',
        'status',
	];
}
