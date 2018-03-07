<?php

namespace App\Repositories\JobRepository;

interface IJobRepository
{
    function getAll($page);

    function getById($id);

    function create(array $data);

    function update($id, array $data);

    function delete($id);


}