<?php
/**
 * Desc: 类文件描述
 * Date: 2020-07-09
 */

namespace GuangdaPayment\Requests;
use phpseclib\Crypt\RSA;
use Exception;

class AbstractRequest
{
    /**
     * 生成签名
     * @return string
     * @throws Exception
     */
    protected function makeSign()
    {
        if (empty($this->getSiteCode())) throw new Exception('The SiteCode is invalid');
        if (empty($this->getVersion())) throw new Exception('The Version is invalid');
        if (empty($this->getTransacCode())) throw new Exception('The TransacCode is invalid');
        if (empty($this->getReqdata())) throw new Exception('The Reqdata is invalid');
        if (empty($this->getXingyepublicKey())) throw new Exception('The PrivateKey is invalid');
        // 拼接需要加密的字符串
        $signatureStr = $this->getSiteCode() . $this->getVersion() . $this->getTransacCode() . $this->getReqdata();
        $rsa = new RSA();
        $rsa->loadKey($this->getXingyepublicKey());
        // 选择加密的模式
        $rsa->setEncryptionMode(RSA::ENCRYPTION_NONE);
        // 需要对结果进行base64转码
        return base64_encode($rsa->encrypt($signatureStr));
    }

    /**
     * 发送请求
     */
    public function send()
    {
        // 请求数据
        $requestData = [];
        $requestData['siteCode']    = $this->getSiteCode();
        $requestData['version']     = $this->getVersion();
        $requestData['deviceType']  = $this->getDeviceType();
        $requestData['transacCode'] = $this->getTransacCode();
        $requestData['reqdata']     = $this->getReqdata();
        $requestData['signature']   = $this->getSignature();
        $requestData['charset']     = $this->getCharset();
        // 发起请求
        $response = \Requests::post($this->getUri(), [], $requestData, ['timeout'=>20]);
        // 检查请求结果
        if ($response->status_code != 200) Throw new Exception("Http Error " . $response->getStatusCode());
        // 返回数据
        return json_decode($response->body, true);
    }
}
