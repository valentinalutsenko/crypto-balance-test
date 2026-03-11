<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Valentina Lutsenko
 */
class BaseRepository
{
    public function save(Model $model): Model
    {
        $model->save();

        return $model;
    }
}
