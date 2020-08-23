<?php

namespace Modules\API\Http\Controllers\QueryFilters;

use Modules\API\Http\Controllers\QueryFilters\BaseQueryFilter;

class UserQueryFilter extends BaseQueryFilter
{

    private $username;
    private $fullname;
    private $role_code;
    private $instance_id;
    private $email;
    private $address;
    private $password;

    function __construct($request)
    {
        parent::__construct($request);
        $this->username = isset($request['username']) ? $request['username'] : null;
        $this->fullname = isset($request['fullname']) ? $request['fullname'] : null;
        $this->role_code = isset($request['role_code']) ? $request['role_code'] : null;
        $this->instance_id = isset($request['instance_id']) ? $request['instance_id'] : null;
        $this->email = isset($request['email']) ? $request['email'] : null;
        $this->address = isset($request['address']) ? $request['address'] : null;
        $this->password = isset($request['password']) ? $request['password'] : null;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getFullName()
    {
        return $this->fullname;
    }

    public function getRoleCode()
    {
        return $this->role_code;
    }

    public function getInstanceId()
    {
        return $this->instance_id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
