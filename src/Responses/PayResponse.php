<?php
/**
 * Desc: 类文件描述
 * Date: 2020-07-09
 */
namespace XingyePayment\Responses;

class PayResponse extends AbstractResponse
{
    protected $code;
    protected $url;
    protected $Message;

    /**
     * 业务代码
     * @return mixed
     */
    public function getCode()
    {
        return $this->getRespData()['code'];
    }

    /**
     * 业务成功，有返回
     * @return mixed
     */
    public function getUrl()
    {
        return $this->getRespData()['url'];
    }

    /**
     * 业务错误信息
     * @return mixed
     */
    public function getMessage()
    {
        return $this->getRespData()['Message'];
    }

    /**
     * 判断业务是否成功
     * @return bool
     */
    public function processIsSuccess()
    {
        return $this->getCode() == 200 ? true : false;
    }
}
