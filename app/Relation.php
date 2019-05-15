<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Relation extends Model
{
    use Notifiable;

    protected $guard = 'relation';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'problems', 'problems_detail', 'report', 'time', 'status', 'patient_id', 'doctor_id',
    ];
}
