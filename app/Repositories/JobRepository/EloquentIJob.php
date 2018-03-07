<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07.03.2018
 * Time: 12:12
 */

namespace App\Repositories\JobRepository;

use App\Models\Jobs;

class EloquentIJob implements IJobRepository
{
    private $model;

    public function __construct(Jobs $model)
    {
        $this->model = $model;
    }

    public function getAll($page)
        {
            return $this->model->paginate($page);
        }

        public function getById($id)
        {
            return $this->model->findOrFail($id);
        }

        public function create(array $data)
        {
            return $this->model->create($data);
        }

        public function update($id, array $data)
        {
            return $this->model->findOrFail($id)->update($data);
        }

        public function delete($id)
        {
            return $this->model->findOrFail($id)->delete();
        }

}