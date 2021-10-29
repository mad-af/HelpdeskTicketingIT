<?php

namespace App\Http\Controllers;

use App\Helpers\Massage;
use App\Helpers\ErrorCode;
use App\Helpers\HttpError;
use App\Schema\UserSchema;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

use App\Http\Services\TaskService;

class TaskController extends Controller {
    public function __construct() {
        $this->task = new TaskService();
    }
}
