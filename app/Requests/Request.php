<?php

namespace App\Requests;


class Request
{
    public function setCustomers()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' =>'required'
        ]);
    }


}
