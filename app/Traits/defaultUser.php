<?php

namespace App\Traits;

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid as Generator;

trait defaultUser {
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->userId = Generator::uuid4()->toString();
                $model->isDelete = false;
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }
}