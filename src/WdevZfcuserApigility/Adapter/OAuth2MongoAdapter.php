<?php
namespace WdevZfcuserApigility\Adapter;

use ZF\OAuth2\Adapter\MongoAdapter;

class OAuth2MongoAdapter extends MongoAdapter
{

    protected $config;
    
    public function __construct($connection, $config = array())
    {
        

        $this->config = array_merge(array(
            'client_table'  => 'oauth_clients',
            'access_token_table' => 'oauth_access_tokens',
            'refresh_token_table' => 'oauth_refresh_tokens',
            'code_table' => 'oauth_authorization_codes',
            'user_table' => 'oauth_users',
            'jwt_table' => 'oauth_jwt'
        ), $config);
    }

}
