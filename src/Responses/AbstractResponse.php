<?php
/**
 * Desc: 类文件描述
 * Date: 2020-07-09
 */
namespace XingyePayment\Responses;
use phpseclib\Crypt\RSA;

class AbstractResponse
{
    // 请求对象
    protected $request;

    // 响应数据
    protected $response;

    // 响应码 100参数不完整 ；101 签名校验失败； 400无访问权限 ；200响应成功
    protected $respCode;

    // 响应具体信息
    protected $respMsg;

    // 响应数据体
    protected $respData;

    // 数字签名, 签名内容顺序为：respCode、respMsg、respData
    protected $signature;

    public function __construct($Response, $Request)
    {
        $this->response = $Response;
        $this->request = $Request;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getRespCode()
    {
        return $this->response['respCode'];
    }

    /**
     * @return mixed
     */
    public function getRespMsg()
    {
        return $this->response['respMsg'];
    }

    /**
     * @return mixed
     */
    public function getRespData()
    {
        return $this->response['respData'];
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->response['signature'];
    }

    /**
     * @return bool
     */
    public function requestIsSuccess()
    {
        return $this->getRespCode() == 200 ? true : false;
    }

    /**
     * 验证签名
     */
    public function checkSign()
    {
        $rsa = new RSA();
        $rsa->loadKey($this->request->getPrivateKey());
        $rsa->setEncryptionMode(RSA::ENCRYPTION_NONE);
        return $rsa->decrypt(base64_decode($this->getSignature()));
    }
}
