<?php

/**
 *
 */
class Request
{
    /**
     * @var false|string
     */
    private $body;

    /**
     * @return false|string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param false|string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    public function __construct()
    {
        $this->body = json_decode(file_get_contents("php://input"), true);
    }


    /**
     * @param $code
     * @param $success
     * @param $data
     * @param $error
     */
    public function send($code, $success, $data, $error = false)
    {
        $this->code = $code;
        $this->success = $success;
        $this->data = $data;
        $this->error = $error;

        foreach ($this->headers as $header){
            header($header);
        }

        http_response_code($this->code);



        echo json_encode([
            'success' => $this->success,
            'data' => $this->data,
            'error' => $this->error,
        ], JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess( $success)
    {
        $this->success = $success;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string[]
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string[] $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @param $code
     * @param $error
     * @return $this
     */
    public function sendError($code, $error)
    {
        $this->error = $error;
        return $this->send($code, false, [], $error);
    }


}