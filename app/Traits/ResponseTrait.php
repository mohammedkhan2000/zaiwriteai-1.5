<?php

namespace App\Traits;


trait ResponseTrait
{
    public $success = 200;
    public $error = 500;
    public $fail = 500;
    public $validationFaild = 422;
    public $unauthorized = 401;
    public $response = ['status' => false, 'data' => [], 'message' => ''];

    public function success($data = [], $message = DATA_FETCH_SUCCESSFULLY)
    {
        $this->response['status'] = true;
        $this->response['data'] = $data;
        $this->response['message'] = $message;
        return response()->json($this->response, $this->success);
    }

    public function error($data = [], $message = SOMETHING_WENT_WRONG)
    {
        $this->response['data'] = $data;
        $this->response['message'] = $message;
        return response()->json($this->response, $this->error);
    }
}
