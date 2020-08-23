<?php

namespace App\Http\Models\Notification;

use DB;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table    = 'sys_notification';
    protected $fillable = [
        'user_id',
        'module',
        'message',
        'url',
        'is_read',
        'created_by',
        'deleted',
    ];

    public function add($data){
        $sent   = $this->create($data);
        return $sent;
    }

    public function add_by_roles($data){
        //check if creator has outlet
        $creator_outlets    = DB::table('users')
            ->join(
                'prs_pegawais',
                'prs_pegawais.id',
                '=',
                'users.id_pegawai'
            )
            ->join(
                'rlt_personalia_outlets',
                'rlt_personalia_outlets.id_personalia',
                '=',
                'prs_pegawais.id'
            )
            ->where('users.id', $data['created_by'])
            ->where('prs_pegawais.deleted', 0)
            ->where('rlt_personalia_outlets.deleted', 0)
            ->pluck('rlt_personalia_outlets.id_outlet')
            ->toArray();

        $user_ids   = DB::table('users')
            ->join(
                'prs_pegawais',
                'prs_pegawais.id',
                '=',
                'users.id_pegawai'
            )
            ->whereIn('prs_pegawais.id_jabatan', $data['roles'])
            ->pluck('users.id');
        
        $payload    = [];
        foreach($user_ids as $user_id){
            //get the target outlets
            $target_outlets = DB::table('users')
                ->join(
                    'prs_pegawais',
                    'prs_pegawais.id',
                    '=',
                    'users.id_pegawai'
                )
                ->join(
                    'rlt_personalia_outlets',
                    'rlt_personalia_outlets.id_personalia',
                    '=',
                    'prs_pegawais.id'
                )
                ->where('users.id', $user_id)
                ->where('rlt_personalia_outlets.deleted', 0)
                ->pluck('rlt_personalia_outlets.id_outlet')
                ->toArray();

            if(count($creator_outlets) > 0 and count($target_outlets) > 0){
                foreach($target_outlets as $target_outlet_id){
                    if(in_array($target_outlet_id, $creator_outlets)){
                        array_push($payload, [
                            'user_id'       => $user_id,
                            'module'        => $data['module'],
                            'message'       => $data['message'],
                            'url'           => $data['url'],
                            'created_by'    => $data['created_by'],
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s')
                        ]);

                        break;
                    }
                }
            } else {
                array_push($payload, [
                    'user_id'       => $user_id,
                    'module'        => $data['module'],
                    'message'       => $data['message'],
                    'url'           => $data['url'],
                    'created_by'    => $data['created_by'],
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                ]);
            }
        }

        $sent       = $this->insert($payload);

        return $sent;
    }

    public function add_by_roles_in_outlets($data, $outlet_ids){
        $user_ids   = DB::table('users')
            ->join(
                'prs_pegawais',
                'prs_pegawais.id',
                '=',
                'users.id_pegawai'
            )
            ->whereIn('prs_pegawais.id_jabatan', $data['roles'])
            ->pluck('users.id');
        
        $payload    = [];
        foreach($user_ids as $user_id){
            //get the target outlets
            $target_outlets = DB::table('users')
                ->join(
                    'prs_pegawais',
                    'prs_pegawais.id',
                    '=',
                    'users.id_pegawai'
                )
                ->join(
                    'rlt_personalia_outlets',
                    'rlt_personalia_outlets.id_personalia',
                    '=',
                    'prs_pegawais.id'
                )
                ->where('users.id', $user_id)
                ->where('rlt_personalia_outlets.deleted', 0)
                ->pluck('rlt_personalia_outlets.id_outlet')
                ->toArray();

            if(count($outlet_ids) > 0 and count($target_outlets) > 0){
                foreach($target_outlets as $target_outlet_id){
                    if(in_array($target_outlet_id, $outlet_ids)){
                        array_push($payload, [
                            'user_id'       => $user_id,
                            'module'        => $data['module'],
                            'message'       => $data['message'],
                            'url'           => $data['url'],
                            'created_by'    => $data['created_by'],
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s')
                        ]);

                        break;
                    }
                }
            } else {
                array_push($payload, [
                    'user_id'       => $user_id,
                    'module'        => $data['module'],
                    'message'       => $data['message'],
                    'url'           => $data['url'],
                    'created_by'    => $data['created_by'],
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                ]);
            }
        }

        $sent       = $this->insert($payload);

        return $sent;
    }

    public function get_latest($user_id, $offset, $limit){
        $data = $this
            ->where('user_id', $user_id)
            ->where('created_by', '!=', $user_id)
            ->orderBy('created_at', 'desc')
            ->offset($offset)
            ->limit($limit)
            ->get();

        return $data;
    }

    public function get_all($user_id){
        $data = $this
            ->where('user_id', $user_id)
            ->where('created_by', '!=', $user_id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return $data;
    }

    public function update_all_notification($user_id){
        $data = $this
            ->where('user_id', $user_id)
            ->where('created_by', '!=', $user_id)
            ->update(['is_read' => 1]);

        return $data;
    }
}
