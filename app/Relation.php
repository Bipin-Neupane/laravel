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
        'patient_email', 'doctor_email', 'problems', 'problems_detail', 'report', 'time', 'status',
    ];
}
