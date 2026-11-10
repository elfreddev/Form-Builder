<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formAnswerModel extends Model
{
    public $table       = 'form_answer';
	public $timestamps  = TRUE;
	protected $fillable = [
		'form_id',
        'questionaire_answers',
        'status',
	];
}
