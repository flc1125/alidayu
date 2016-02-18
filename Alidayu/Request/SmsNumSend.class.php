<?php
/**
 * 短信发送
 *
 * @author Flc <2016-02-18 21:18:19>
 * @link http://flc.ren 叶子坑
 * 
 * @link http://open.taobao.com/doc2/apiDetail.htm?spm=0.0.0.0.tjoIzd&apiId=25450 开发文档
 */
namespace Alidayu\Request;

class SmsNumSend
{

    /**
     * API请求参数
     * @var array
     */
    protected $params = array(
        'method' => 'alibaba.aliqin.fc.sms.num.send',
    ); 

    /**
     * [可选]设置公共回传参数，在“消息返回”中会透传回该参数；举例：用户可以传入自己下级的会员ID，在消息返回时，该会员ID会包含在内，用户可以根据该会员ID识别是哪位会员使用了你的应用
     * 
     * @param string $value 
     */
    public function setExtend($value)
    {
        $this->params['extend'] = $value;
        return $this;
    }

    /**
     * [必须]设置短信类型，传入值请填写normal
     * 
     * @param string $value 
     */
    public function setSmsType($value)
    {
        $this->params['sms_type'] = $value;
        return $this;
    }

    /**
     * [必须]设置短信签名，传入的短信签名必须是在阿里大鱼“管理中心-短信签名管理”中的可用签名。如“阿里大鱼”已在短信签名管理中通过审核，则可传入”阿里大鱼“（传参时去掉引号）作为短信签名。短信效果示例：【阿里大鱼】欢迎使用阿里大鱼服务。
     * 
     * @param string $value 
     */
    public function setSmsFreeSignName($value)
    {
        $this->params['sms_free_sign_name'] = $value;
        return $this;
    }

    /**
     * [可选]设置短信模板变量，传参规则{"key":"value"}，key的名字须和申请模板中的变量名一致，多个变量之间以逗号隔开。示例：针对模板“验证码${code}，您正在进行${product}身份验证，打死不要告诉别人哦！”，传参时需传入{"code":"1234","product":"alidayu"}
     * 
     * @param json $value 
     */
    public function setSmsParam($value)
    {
        $this->params['sms_param'] = $value;
        return $this;
    }

    /**
     * [必须]设置短信接收号码。支持单个或多个手机号码，传入号码为11位手机号码，不能加0或+86。群发短信需传入多个号码，以英文逗号分隔，一次调用最多传入200个号码。示例：18600000000,13911111111,13322222222
     * 
     * @param string $value 
     */
    public function setRecNum($value)
    {
        $this->params['rec_num'] = $value;
        return $this;
    }

    /**
     * [必须]设置短信模板ID，传入的模板必须是在阿里大鱼“管理中心-短信模板管理”中的可用模板。示例：SMS_585014
     * 
     * @param string $value 
     */
    public function setSmsTemplateCode($value)
    {
        $this->params['sms_template_code'] = $value;
        return $this;
    }

    /**
     * 返回所有参数
     * @return [type] [description]
     */
    public function getParams()
    {
        return $this->params;
    }
}