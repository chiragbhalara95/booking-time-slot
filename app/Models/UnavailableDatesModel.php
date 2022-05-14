<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnavailableDatesModel extends Model
{
    use HasFactory;

    protected $table = 'unavailable_dates';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'unavailable_dates_id';

    protected $fillable = [
        'unavailable_date'
    ];

    protected $casts = [];


}
