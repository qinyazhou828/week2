<?php

namespace app\api\validate;

use think\Validate;

class Api extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
	    'name' => 'require',
        'email' => 'require',
        'phone' => 'number|length:11',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'name|requre' => '用户名不能为空',
        'email|require' => '邮箱必填',
        'phone|number' => '手机号必须为数字',
    ];
}
