<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxBookQueue extends Model
{
    protected $table = "trx_book_queues";
    protected $fillable = [
        'id',
        'instance_id',
        'user_mobile_id',
        'queue_no',
        'queue',
        'status',
        'date',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function instance_data(){
        return $this->belongsTo(MstInstances::class, 'instance_id', 'id');
    }
}
