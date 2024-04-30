<?php

namespace App\Classes;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApiResponseClass
{
    public function __construct()
    {
        //
    }
    public static function rollback($e, $message ="Algo deu errado! Processo não concluído"){
        DB::rollBack();
      return  self::throw($e, $message);
    }

    public static function throw($e, $message ="Algo deu errado! Processo não concluído"){
        Log::info($e);
        throw new HttpResponseException(response()->json(["message"=> $message], 500));
    }

    public static function sendResponse($result , $message ,$code=200){
        $response=[
            'success' => true,
            'data'    => $result
        ];
        if(!empty($message)){
            $response['message'] = $message;
        }
        return response()->json($response, $code);
    }
}
