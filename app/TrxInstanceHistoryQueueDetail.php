<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxInstanceHistoryQueueDetail extends Model
{
    protected $table = "trx_instance_history_queue_details";
    protected $fillable = [
        'id',
        'instance_history_queue_id',
        'name',
        'date',
        'queue_no',
        'queue',
        'book_time',
        'process_time',
        'finish_time',
        'status',
        'instance_id',
        'user_mobile_id',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function instance_history_queue_data()
    {
        return $this->belongsTo(TrxInstanceHistoryQueue::class, 'instance_history_queue_id', 'id');
    }

    public function instance_data()
    {
        return $this->belongsTo(MstInstances::class, 'instance_id', 'id');
    }
}
