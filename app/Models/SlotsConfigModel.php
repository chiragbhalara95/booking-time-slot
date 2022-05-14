<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotsConfigModel extends Model
{
    use HasFactory;

    protected $table = 'slots_config';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'slots_config_id';

    protected $fillable = [
        'no_of_day',
        'available_start_time',
        'available_end_time',
        'unavailable_start_time',
        'unavailable_end_time'
    ];

    protected $casts = [];

}
