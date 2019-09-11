<?php

//try {
//    throw new Exception('你好');
//}catch (Exception $e) {
//    echo $e->getMessage();
//}

set_exception_handler(function ($e) {
    if ($e instanceof ApiException && method_exists($e, 'render')) {
        echo $e->render('接口异常', 334);
    }
});

class ApiException extends Exception
{
    public function render($message, $code)
    {
//        parent::__construct($message, $code);
        return json_encode([
            'error' => $code,
            'message' => $message,
        ]);
    }
}

throw new ApiException('api异常');
//throw new Exception('hello');

register_shutdown_function(function () {
    if ($error = error_get_last()) {
        echo "<pre>";
        print_r($error);
        echo "</pre>";
    }
});


//set_error_handler(function ($errno, $errMsg, $errFile, $errLine) {
//    throw new Exception('hello world');
//});

try {
    echo 1 / 0;
} catch (Exception $e) {
    echo $e->getMessage();
}



