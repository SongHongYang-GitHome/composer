<?php
/**
 * Desc: 请求数据
 * Date: 2020-07-09
 */
namespace GuangdaPayment\Requests;

class ReqData
{
    // 输出平台类型 第三方客户端app-31
    protected $outputType = 31;
    // 交易类型 01-查询缴费 02-查询缴费记录
    protected $transType;
    // 合作商户类型 12-列表版 13-指定项目版
    protected $canalType;
    // 用户标识 商户端的唯一用户标识
    protected $userId;
    // 以下参数canalType=13时需要上送
    // 业务代码 云缴费9位项目编号
    protected $itemCode;
    // 用户编号 如：用户电表号
    protected $billKey;
    // 备用字段
    protected $filed1;
    // 备用字段
    protected $filed2;
    // 备用字段
    protected $filed3;
    // 备用字段
    protected $filed4;
    // 商户缴费订单号 商户缴费订单号的唯一标示 商户需要推送缴费结果时，该字段必输
    protected $merOrderNo;

    /**
     * @return int
     */
    public function getOutputType()
    {
        return $this->outputType;
    }

    /**
     * @param int $outputType
     * @return ReqData
     */
    public function setOutputType($outputType)
    {
        $this->outputType = $outputType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransType()
    {
        return $this->transType;
    }

    /**
     * @param mixed $transType
     * @return ReqData
     */
    public function setTransType($transType)
    {
        $this->transType = $transType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCanalType()
    {
        return $this->canalType;
    }

    /**
     * @param mixed $canalType
     * @return ReqData
     */
    public function setCanalType($canalType)
    {
        $this->canalType = $canalType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     * @return ReqData
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getItemCode()
    {
        return $this->itemCode;
    }

    /**
     * @param mixed $itemCode
     * @return ReqData
     */
    public function setItemCode($itemCode)
    {
        $this->itemCode = $itemCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBillKey()
    {
        return $this->billKey;
    }

    /**
     * @param mixed $billKey
     * @return ReqData
     */
    public function setBillKey($billKey)
    {
        $this->billKey = $billKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFiled1()
    {
        return $this->filed1;
    }

    /**
     * @param mixed $filed1
     * @return ReqData
     */
    public function setFiled1($filed1)
    {
        $this->filed1 = $filed1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFiled2()
    {
        return $this->filed2;
    }

    /**
     * @param mixed $filed2
     * @return ReqData
     */
    public function setFiled2($filed2)
    {
        $this->filed2 = $filed2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFiled3()
    {
        return $this->filed3;
    }

    /**
     * @param mixed $filed3
     * @return ReqData
     */
    public function setFiled3($filed3)
    {
        $this->filed3 = $filed3;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFiled4()
    {
        return $this->filed4;
    }

    /**
     * @param mixed $filed4
     * @return ReqData
     */
    public function setFiled4($filed4)
    {
        $this->filed4 = $filed4;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMerOrderNo()
    {
        return $this->merOrderNo;
    }

    /**
     * @param mixed $merOrderNo
     * @return ReqData
     */
    public function setMerOrderNo($merOrderNo)
    {
        $this->merOrderNo = $merOrderNo;
        return $this;
    }

    /**
     * base64 && json
     */
    public function toJson()
    {
        $reqdata = [];
        $reqdata['outputType']  =   $this->outputType;
        $reqdata['transType']   =   $this->transType;
        $reqdata['canalType']   =   $this->canalType;
        $reqdata['userId']      =   $this->userId;
        $reqdata['itemCode']    =   $this->itemCode;
        $reqdata['billKey']     =   $this->billKey;
        $reqdata['filed1']      =   $this->filed1;
        $reqdata['filed2']      =   $this->filed2;
        $reqdata['filed3']      =   $this->filed3;
        $reqdata['filed4']      =   $this->filed4;
        $reqdata['merOrderNo']  =   $this->merOrderNo;
        return base64_encode(json_encode($reqdata, true));
    }
}
