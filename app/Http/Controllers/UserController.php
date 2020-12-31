<?php

namespace App\Http\Controllers;

use App\User;
use App\Helpers\Massage;
use App\Helpers\ErrorCode;
use App\Helpers\HttpError;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\Http\Services\UserService;

class UserController extends Controller{
    public function __construct() {
        $this->user = new UserService();
    }

    // QUERY
    public function index() {
        $userData = $this->user->findAll()->getData();
        if ($userData->err) {
            return $this->responsef(Massage::USER_NOT_FOUND, HttpError::NOT_FOUND);
        }
        $result = Arr::where($userData->data, function ($value) {
            return $value->isDelete === 0;
        });

        return $this->responset($result);
    }

    public function show($request) {
        $userData = $this->user->findById($request)->getData();
        if ($userData->err) {
            return $this->responsef(Massage::USER_NOT_FOUND, HttpError::NOT_FOUND);
        }
        return $this->responset($userData->data);
    }

    // COMMAND
    public function store(Request $request) {
        $query = $this->user->insertOne($request)->getData();
        if ($query->err) {
            return $this->responsef(Massage::EMAIL_REGISTERED, HttpError::CONFLICT);
        }
        
        $result = $this->user->findByEmail($query->data->email)->getData();
        if ($result->err) {
            return $this->responsef(Massage::USER_NOT_FOUND, HttpError::NOT_FOUND);
        }
    
        return $this->responset($result->data);
    }

    public function update(Request $request, $id) {
        $userData = $this->user->findById($id)->getData();
        if ($userData->err) {
            return $this->responsef(Massage::USER_NOT_FOUND, HttpError::NOT_FOUND);
        }

        $payload = (object) [
            "id"=> $userData->data->id,
            "request" => $request
        ];
        $result = $this->user->upsertOne($payload)->getData();
        if ($result->err) {
            return $this->responsef(Massage::UPDATE_FAILED, HttpError::CONFLICT);
        }

        return $this->responset($result->data);
    }

    public function destroy($id) {
        $query = $this->user->isDeleteOne($id)->getData();
        if ($query->err) {
            return $this->responsef(Massage::DELETED_FAILED, HttpError::CONFLICT);
        }

        return $this->responset($query->data);
    }
}
