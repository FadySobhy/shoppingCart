<?php


namespace App\Repositories\Interfaces;


interface InterfaceProductRepository
{
    public function getAll();

    public function findByID($id);
}
