<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxInstanceHistoryQueue extends Model
{
    protected $table = "trx_instance_history_queues";
    protected $fillable = [
        'id',
        'instance_id',
        'date',
        'last_queue',
        'total_queue',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function instance_data(){
        return $this->belongsTo(MstInstances::class, 'instance_id', 'id');
    }
}
