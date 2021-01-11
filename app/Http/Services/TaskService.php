<?php

namespace App\Http\Services;

use App\Task;
use Illuminate\Http\Request;

class TaskService extends Service {
    // QUERY
    public function findAll() {
        $query = Task::all();
        if (!$query) {
            return $this->responsef();
        }
        return $this->responset($query);
    }

    public function findManyPagination($payload) {
        $query = Task::where('isDelete', false)->simplePaginate($payload);
        if (!$query) {
            return $this->responsef();
        }
        return $this->responset($query);
    }

    public function findById($payload) {
        $query = Task::find($payload);
        if (!$query) {
            return $this->responsef();
        }
        return $this->responset($query);
    }

    public function findByEmail($payload) {
        $query = Task::where('email' ,$payload)->first();
        if (!$query) {
            return $this->responsef();
        }
        return $this->responset($query);
    }

    public function countData() {
        $query = Task::where('isDelete', false)->count();
        if (!$query) {
            return $this->responsef();
        }
        return $this->responset($query);
    }

    // COMMAND
    public function insertOne($payload) {
        try {
            $query = Task::create($payload);
        } catch (\Exception $e) {
            return $this->responsef($e->errorInfo[1]);
        }
        return $this->responset($query);
    }

    public function upsertOne($payload) {
        try {
            $query = Task::find($payload->id);
            $query->update($payload->data);
        } catch (\Throwable $e) {
            dd($e);
            return $this->responsef();
        }
        return $this->responset($query);
    }

    public function isDeleteOne($payload) {
        try {
            $query = Task::find($payload);
            $query->isDelete = true;
            $query->save();
        } catch (\Throwable $e) {
            return $this->responsef();
        }
        return $this->responset($query);
    }
}
