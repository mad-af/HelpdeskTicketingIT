<?php

namespace App\Http\Controllers;

use App\Helpers\Massage;
use App\Helpers\ErrorCode;
use App\Helpers\HttpError;
use App\Schema\UserSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

use App\Http\Services\UserService;

class UserController extends Controller{
    public function __construct() {
        $this->user = new UserService();
    }

    // QUERY
    public function getUserList() {
        $quantity = 10;
        $userData = $this->user->findManyPagination($quantity)->getData();
        if ($userData->err) {
            return $this->responsef(Massage::USER_NOT_FOUND, HttpError::NOT_FOUND);
        }

        $countData = $this->user->countData()->getData();
        if ($countData->err) {
            $countData = null;
        }

        $result = $userData->data->data;
        $totalPage = ceil($countData->data / $quantity);
        $meta = (object) [
            "page" => $userData->data->current_page,
            "quantity" => count($result),
            "totalData" => $countData->data,
            "totalPage" => $totalPage
        ];

        return $this->responsetp($result, $meta);
    }

    public function getUserById($param) {
        $userData = $this->user->findById($param)->getData();
        if ($userData->err) {
            return $this->responsef(Massage::USER_NOT_FOUND, HttpError::NOT_FOUND);
        }

        return $this->responset($userData->data);
    }

    // COMMAND
    public function insertUser(Request $request) {
        $payload = UserSchema::schemaInsert($request);
        $query = $this->user->insertOne($payload)->getData();
        if ($query->err) {
            return $this->responsef(Massage::EMAIL_REGISTERED, HttpError::CONFLICT);
        }
        
        $userData = $this->user->findByEmail($query->data->email)->getData();
        if ($userData->err) {
            return $this->responsef(Massage::USER_NOT_FOUND, HttpError::NOT_FOUND);
        }

        $result = $userData->data;
        return $this->responset($result);
    }

    public function updateUserById(Request $request, $param) {
        $userData = $this->user->findById($param)->getData();
        if ($userData->err) {
            return $this->responsef(Massage::USER_NOT_FOUND, HttpError::NOT_FOUND);
        }
        
        $payload = UserSchema::schemaUpdate([$request, $param]);
        $query = $this->user->upsertOne($payload)->getData();
        if ($query->err) {
            return $this->responsef(Massage::UPDATE_FAILED, HttpError::CONFLICT);
        }

        $result = $query->data;
        return $this->responset($result);
    }

    public function deleteUserById($param) {
        $query = $this->user->isDeleteOne($param)->getData();
        if ($query->err) {
            return $this->responsef(Massage::DELETED_FAILED, HttpError::CONFLICT);
        }

        $result = $query->data;
        return $this->responset($result);
    }
}
