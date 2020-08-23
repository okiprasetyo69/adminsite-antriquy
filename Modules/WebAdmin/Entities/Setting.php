<?php

namespace Modules\WebAdmin\Entities;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'with_max_queue', 'max_queue',
        'start_time', 'end_time', 'is_close_queue',
    ];

    protected $table = 'trx_instance_settings';
}
