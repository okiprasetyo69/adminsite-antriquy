<?php

namespace Modules\Api\Http\Controllers;

use App\Helpers\DateHelper;
use Modules\API\Http\Controllers\BaseApiController;

use App\MstInstances;
use Illuminate\Http\Request;
use Modules\API\Http\Controllers\QueryFilters\InstanceQueryFilter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class InstanceApiController extends BaseApiController
{

    public function find(Request $request)
    {
        $instance_query_filter = new InstanceQueryFilter($request);

        $query = MstInstances::whereRaw('deleted = 0');
        $query_for_count = MstInstances::whereRaw('deleted = 0');

        if ($instance_query_filter->get_for_web() == null) {
            $query = $query->has('setting_data');
            $query_for_count = $query->has('setting_data');
        }

        if ($instance_query_filter->get_search_text() != null) {
            $query = $query->whereRaw("(name like '%{$instance_query_filter->get_search_text()}%')");
            $query_for_count = $query_for_count->whereRaw("(name like '%{$instance_query_filter->get_search_text()}%')");
        }

        if ($instance_query_filter->get_id() != null) {
            $query = $query->where("id", $instance_query_filter->get_id());
            $query_for_count = $query_for_count->where("id", $instance_query_filter->get_id());
        }

        $query = $query->orderByRaw("updated_at DESC");

        $results = $query->limit($instance_query_filter->get_length())->offset($instance_query_filter->get_start());

        $this->set_datatable_response($instance_query_filter->get_draw(), $query_for_count->count(), $results->get());

        return $this->success_response_datatable();
    }

    public function datatable(Request $request)
    {
        $instance_query_filter = new InstanceQueryFilter($request->all());
        $query = MstInstances::whereRaw('deleted = 0');
        $query_for_count = MstInstances::whereRaw('deleted = 0');

        if ($instance_query_filter->get_search_text() != null) {
            $query = $query->whereRaw("(name like '%{$instance_query_filter->get_search_text()}%')");
            $query_for_count = $query_for_count->whereRaw("(name like '%{$instance_query_filter->get_search_text()}%')");
        }
        $query = $query->orderByRaw("updated_at DESC");

        $count = (clone $query)->count();

        $result = $query->limit($instance_query_filter->get_length())->offset($instance_query_filter->get_start());

        $this->set_datatable_response($instance_query_filter->get_draw(), $query_for_count->count(), $result->get());
        return $this->success_response_datatable();
    }

    public function nearby(Request $request)
    {
        $instance_query_filter = new InstanceQueryFilter($request);

        if ($instance_query_filter->getLat() != null && $instance_query_filter->getLong() != null) {
            $query = MstInstances::selectRaw("*, ROUND((6371 * ATAN2(SQRT(
                                (SIN(('" . $instance_query_filter->getLat() . "' - lat)  * (3.14159/180))/2) * (SIN(('" . $instance_query_filter->getLat() . "' - lat)  * (3.14159/180))/2)
                                + COS(lat * ((3.14159/180))) * COS('" . $instance_query_filter->getLat() . "' * ((3.14159/180)))
                                * (SIN(('" . $instance_query_filter->getLong() . "' - `long`)  * (3.14159/180))/2) * (SIN(('" . $instance_query_filter->getLong() . "' - `long`)  * (3.14159/180))/2)
                        ), SQRT(1 -
                                ((SIN(('" . $instance_query_filter->getLat() . "' - `long`)  * (3.14159/180))/2) * (SIN(('" . $instance_query_filter->getLat() . "' - `long`)  * (3.14159/180))/2)
                                + COS(lat * ((3.14159/180))) * COS('{$instance_query_filter->getLat()}' * ((3.14159/180)))
                                * (SIN(('" . $instance_query_filter->getLong() . "' - `long`)  * (3.14159/180))/2) * (SIN(('" . $instance_query_filter->getLong() . "' - `long`)  * (3.14159/180))/2))
                        ))), 2) AS distance")
                ->whereRaw("(ROUND((6371 * ATAN2(SQRT(
							(SIN(('" . $instance_query_filter->getLat() . "' - lat)  * (3.14159/180))/2) * (SIN(('" . $instance_query_filter->getLat() . "' - lat)  * (3.14159/180))/2)
							+ COS(lat * ((3.14159/180))) * COS('" . $instance_query_filter->getLat() . "' * ((3.14159/180)))
							* (SIN(('" . $instance_query_filter->getLong() . "' - `long`)  * (3.14159/180))/2) * (SIN(('" . $instance_query_filter->getLong() . "' - `long`)  * (3.14159/180))/2)
                            ), SQRT(1 -
                                    ((SIN(('" . $instance_query_filter->getLat() . "' - lat)  * (3.14159/180))/2) * (SIN(('" . $instance_query_filter->getLat() . "' - lat)  * (3.14159/180))/2)
                                    + COS(lat * ((3.14159/180))) * COS('" . $instance_query_filter->getLat() . "' * ((3.14159/180)))
                                    * (SIN(('" . $instance_query_filter->getLong() . "' - `long`)  * (3.14159/180))/2) * (SIN(('" . $instance_query_filter->getLong() . "' - `long`)  * (3.14159/180))/2))
                            ))), 2)) < 20")
                ->orderByRaw("-distance DESC")->with(['setting_data'])->has('setting_data');
        } else {
            $query = MstInstances::whereRaw("1=0");
        }

        $results = $query->limit($instance_query_filter->get_length())->offset($instance_query_filter->get_start());

        $data = $results->get();
        $this->set_datatable_response($instance_query_filter->get_draw(), $data->count(), $data);

        return $this->success_response_datatable();
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'long' => 'required',
            'lat' => 'required',
            //'queue_front_format' => 'nullable',
            //'queue_back_format' => 'nullable',
        ];
        $instances_create = $request->all();
        $uuid = (string) Str::uuid();
        if ($request->id == null) {
            $instances_create['id'] = $uuid;
            $instances_create['long'] = $request->lng;
            $instances_create['updated_at'] = date('Y-m-d H:i:s');
            $instances_create['created_at'] = date('Y-m-d H:i:s');
            $instancesCreate = MstInstances::create($instances_create);
        } else {
            $instancesCreate = MstInstances::find($request->input('id'));
            $instancesCreate->update($request->all());
        }
        return $this->success_response($instancesCreate);
    }

    public function detail($id, Request $request)
    {
        $instances = MstInstances::where("id", $id)->first();
        $data['instansi'] = $instances;
        return $this->success_response($instances);
    }

    public function delete(Request $request)
    {
        //$data_field = $request->all();
        //$instances = MstInstances::where('id', $data_field['id']);
        // if ($instances->first() == null) {
        //     return $this->error_response('instansi dengan id ' . $data_field['id'] . ' tidak ditemukan!');
        // }
        //$instances->delete();
        $instancesUpdate = MstInstances::find($request->input('id'));
        $instancesUpdate['deleted'] = 1;
        $instancesUpdate->update($request->all());
        return $this->success_response();
    }
}
