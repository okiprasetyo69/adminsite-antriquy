<?php

namespace App;

use App\Helpers\DateHelper;
use Illuminate\Database\Eloquent\Model;
use Modules\WebAdmin\Entities\Setting;
use Illuminate\Database\Eloquent\SoftDeletes;

class MstInstances extends Model
{

    //    use SoftDeletes;
    protected $table = "mst_instances";
    protected $fillable = [
        'id',
        'name',
        'address',
        'long',
        'lat',
        'queue_front_format',
        'queue_back_format',
        'created_at',
        'updated_at',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    //    protected $dates = ['deleted_at'];

    protected $appends = ['last_queue', 'total_queue'];

    public function setting_data()
    {
        return $this->belongsTo(Setting::class, 'id', 'instance_id');
    }

    public function getLastQueueAttribute(){
        $last_queue = 0;
        $instance_history_queue_data = TrxInstanceHistoryQueue::where('instance_id', $this->id)->where('date', DateHelper::now_without_hours())->first();
        if ($instance_history_queue_data != null){
            $last_queue = $instance_history_queue_data->last_queue;
        }

        return $last_queue;
    }

    public function getTotalQueueAttribute(){
        $total_queue = 0;
        $instance_history_queue_data = TrxInstanceHistoryQueue::where('instance_id', $this->id)->where('date', DateHelper::now_without_hours())->first();
        if ($instance_history_queue_data != null){
            $total_queue = $instance_history_queue_data->total_queue;
        }

        return $total_queue;
    }
}
