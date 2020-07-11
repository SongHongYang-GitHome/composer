<?php
/**
 * Desc: 类文件描述
 * Date: 2020-07-09
 */
namespace XingyePayment\Requests;

class PayRequest extends AbstractRequest
{
    // 请求地址
    protected $uri = "https://yaoyaotest.cebbank.com/LifePayment/getReqData.json"; // 测试环境
    // protected $uri = "https://yaoyao.cebbank.com/LifePayment/getReqData.json"; // 生产环境
    // 云缴费客户端平台分配给对方的接入渠道标识
    protected $siteCode = "";
    // 云缴费接口版本号
    protected $version = "";
    // 默认2-手机终端
    protected $deviceType = 2;

    // 交易名
    protected $transacCode = 'TMRI_ORDER_GETURL'; // 获取缴费链接
    // 请求数据报文，json格式，采用base64编码，具体请参考5中reqData的json参数说明
    protected $reqdata = "";
    // 数字签名，采用Base64编码和MD5withRSA算法实现，签名内容顺序为：siteCode、version、transacCode和reqdata。
    protected $signature = "";
    // reqdata编码字符集，数字签名和base64编码中使用的字符集，仅支持 utf-8
    protected $charset = "utf-8";
    // 私钥
    protected $privateKey = "";
    // 公钥
    protected $publicKey = "";
    // 兴业公钥
    protected $XingyepublicKey = "";

    /**
     * @return string
     */
    public function getSiteCode()
    {
        return $this->siteCode;
    }

    /**
     * @param string $siteCode
     * @return PayRequest
     */
    public function setSiteCode($siteCode)
    {
        $this->siteCode = $siteCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getReqdata()
    {
        return $this->reqdata;
    }

    /**
     * @param string $reqdata
     * @return PayRequest
     */
    public function setReqdata($reqdata)
    {
        $this->reqdata = $reqdata;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * @param string $privateKey
     * @return PayRequest
     */
    public function setPrivateKey($privateKey)
    {
        $this->privateKey = $privateKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param $Version
     * @return string
     */
    public function setVersion($Version)
    {
         $this->version = $Version;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransacCode()
    {
        return $this->transacCode;
    }

    /**
     * @return string
     */
    public function getXingyepublicKey()
    {
        return $this->XingyepublicKey;
    }

    /**
     * @param string $XingyepublicKey
     * @return PayRequest
     */
    public function setXingyepublicKey($XingyepublicKey)
    {
        $this->XingyepublicKey = $XingyepublicKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @return PayRequest
     * @throws \Exception
     */
    public function setSignature()
    {
        $this->signature = parent::makeSign();
        return $this;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return int
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * @return string
     */
    public function getCharset()
    {
        return $this->charset;
    }


}
