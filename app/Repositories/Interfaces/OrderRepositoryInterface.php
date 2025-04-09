<?php


namespace App\Repositories\Interfaces;


interface OrderRepositoryInterface
{
    public function createOrder (array $items, $user_id);

    public function getUserorder ($user_id);
}
