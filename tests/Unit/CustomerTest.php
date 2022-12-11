<?php


class CustomerTest extends \Tests\TestCase
{


    public function test_read_by_id(){
        $service = new \App\Http\Controllers\V1\Api\CustomersController(new \App\Service\Vi\Api\CustomerService());
        $service->read();
    }
}
