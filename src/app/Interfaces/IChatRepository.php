<?php

namespace App\Interfaces;

interface IChatRepository
{
    public function create();

    public function update();

    public function delete();

    public function find(int $id);

    public function get();

}
