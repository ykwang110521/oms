<?php
namespace app\admin\model;

use app\common\model\OAuth2;

class MoudleOAuth2 extends OAuth2 {

    public function initialize()
    {
        parent::initialize();
        $this->token_conf = [
            'access_token_lifetime' => config('token.access_token_lifetime'),
            'refresh_token_lifetime'=> config('token.refresh_token_lifetime')
        ];
    }

    public function login($id) {
        $token = $this->setToken($id);
        if (!$token) {
            return false;
        }
        $this->setTokenCookie($id,$token);
        return $token;

    }

    public function logout($id) {
        $this->delToken($id);
        cookie('access_token',null);
        cookie('refresh_token',null);
    }

    public function checkLogin($id) {
        $token = $this->getToken($id);
        if ($token['access_token']) {
            $cookie_access_token = cookie('access_token');
            if ($cookie_access_token == $token['access_token']) {
                return 1;
            } else {
                return -1;
            }
        } elseif($token['refresh_token']) {
            $cookie_refresh_token = cookie('refresh_token');
            if ($cookie_refresh_token == $token['refresh_token']) {
                $new_token = $this->refreshToken($id);
                $this->setTokenCookie($id,$new_token);
                return 2;
            } else {
                return -2;
            }
        } else {
            return 3;
        }
    }

    private function setTokenCookie($id,$token) {
        cookie('aid',$id,['prefix'=>'oms_','expire'=>$this->token_conf['refresh_token_lifetime']]);
        cookie('access_token',$token['access_token'],$token['expires_in']);
        cookie('refresh_token',$token['refresh_token'],$this->token_conf['refresh_token_lifetime']);
    }
}