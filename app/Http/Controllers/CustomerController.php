<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Requests\Request as RequestClass;

class CustomerController extends Controller
{
    public function __construct(Customer $customer, RequestClass $request)
    {
        $this->customer = $customer;
        $this->request = $request;
    }
    public function index()
    {

            $customers = $this->customer->all();
            return $customers;



    }
    public function store()
    {

        $this->customer->create($this->request->setCustomers());

    }
    public function edit($id)
    {

        $customer = $this->customer->find($id);

        return $customer;
    }
    public function update($id)
    {
        $this->customer->where('id', $id)->update($this->request->setCustomers());

        return $this->refresh();
    }
    public function delete($id)
    {

        $customer = $this->customer->find($id);
        if ($customer->delete()) {

        } else {
            return response()->json(['error' => 'failed'], 425);
        }
    }
    public function refresh()
    {
        $customers = $this->customer->paginate(10);

        return $customers;
    }
}
