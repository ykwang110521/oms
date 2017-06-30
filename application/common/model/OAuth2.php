<?php
namespace app\common\model;

use think\Model;

class OAuth2 extends Model {

    use \app\common\traits\Common;
    use \app\common\traits\Redis;

    protected $acc_name = 'access_token';
    protected $ref_name = 'refresh_token';

    protected $token_conf = [
        'access_token_lifetime' => 86400,
        'refresh_token_lifetime' => 604800
    ];

    private function createToken() {
        return $this->randomStr(32);
    }

    protected function setToken($id) {
        $acc_key = $this->getKeyName($this->acc_name,$id);
        $ref_key = $this->getKeyName($this->ref_name,$id);
        $access_token = $this->createToken();
        $refresh_token = $this->createToken();
        self::redis()->setex($acc_key,$this->token_conf['access_token_lifetime'],$access_token);
        self::redis()->setex($ref_key,$this->token_conf['refresh_token_lifetime'],$refresh_token);
        $token['access_token'] = $access_token;
        $token['refresh_token'] = $refresh_token;
        $token['expires_in'] = $this->token_conf['access_token_lifetime'];
        return $token;
    }

    protected function refreshToken($id) {
        return $this->setToken($id);
    }

    protected function delToken($id) {
        $acc_key = $this->getKeyName($this->acc_name,$id);
        $ref_key = $this->getKeyName($this->ref_name,$id);
        self::redis()->del($acc_key);
        self::redis()->del($ref_key);
    }

    protected function getToken($id) {
        $acc_key = $this->getKeyName($this->acc_name,$id);
        $ref_key = $this->getKeyName($this->ref_name,$id);
        $token['access_token'] = self::redis()->get($acc_key);
        $token['refresh_token'] = self::redis()->get($ref_key);
        $token['expires_in'] = self::redis()->ttl($acc_key);
        return $token;
    }
}