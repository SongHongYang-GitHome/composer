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
    protected $privateKey = "MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAJ7pGGqaT8DsbBZAKh/CPFIvtQVjDByCf0Wew3E8GiygEzmG/ZKPycFppEMbWL8XkZ3PMJb28y4NlvcRDD+z+PCakPTftfATnllJHdgv4K+YMLWrs4eYTbygpaXOv772DT7Y2g4Yyfk0UaRW9ex2Xv3NJ4p8kF3Gq1Y+lrOiaL5DAgMBAAECgYEAlJ4Tg7+FzzxNahHgU4totsR/W+ZiMVeqiAYPaxt2rz2WPTsOc7+eRRDz2v78ZNs6CIj5PHcAv5VeFvsOpZU/vuxPJ6uTvtZOYtM8YAeUbD2DXbP2CVC2DcDCQ7421hUbIlT0lqsCS4YaZgBsSt41GRd2fE8GlA4Aehs77qv+EUECQQDUK4S4wSctXblr6o6A+Vsj//kZWCUFc1DvmqNehsIQaKjWb15ehMlIirtYuWsEtJmkK4hMpuS2ih5qSjLFrTRZAkEAv7z7fjxMBf2O5lelJ1vLZiQ59bsTsFfyNDEzDbDxOBpnzDlaPXLrjf457SK2j8E/zbMZvNKfJv/SDU+enhhj+wJASu0zaauMklDO8nVa7eEhdo0nAvRF3q7injsWBoPAdNsBBPk/clGiY6PalXKlgHvm5jsZXzhw/KW6J/8b/wMzwQJAVOz75/oFIlIgzV3cxQYfnWpGUdU+70jE+uEf39yTu2nWt9pfYgBY3VfRiHtrqVjLTe0aZUxVOgztmP+/Hf9nqQJAME7Wjyu7hMkEiOnc3Ozgpd8rS2W4wXMOCdDkPtBvFf8bsvL/7+hejawc17NVR+/lCWrUQ3PDzpGUkgaxAu+PoA==";
    // 公钥
    protected $publicKey = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCe6Rhqmk/A7GwWQCofwjxSL7UFYwwcgn9FnsNxPBosoBM5hv2Sj8nBaaRDG1i/F5GdzzCW9vMuDZb3EQw/s/jwmpD037XwE55ZSR3YL+CvmDC1q7OHmE28oKWlzr++9g0+2NoOGMn5NFGkVvXsdl79zSeKfJBdxqtWPpazomi+QwIDAQAB";
    // 兴业公钥
    protected $XingyepublicKey = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCe6Rhqmk/A7GwWQCofwjxSL7UFYwwcgn9FnsNxPBosoBM5hv2Sj8nBaaRDG1i/F5GdzzCW9vMuDZb3EQw/s/jwmpD037XwE55ZSR3YL+CvmDC1q7OHmE28oKWlzr++9g0+2NoOGMn5NFGkVvXsdl79zSeKfJBdxqtWPpazomi+QwIDAQAB";

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
