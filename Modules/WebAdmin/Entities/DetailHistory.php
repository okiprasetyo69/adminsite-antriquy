<?php

namespace Modules\WebAdmin\Entities;

use Illuminate\Database\Eloquent\Model;

class DetailHistory extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [];
    protected $dates = ['date'];
    protected $table = 'trx_instance_history_queue_details';
}
