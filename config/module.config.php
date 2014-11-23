<?php

return array(
    'zf-oauth2' => array(
        'allow_implicit' => true,
        'storage' => 'OAuth2MongoAdapter',
        'storage_settings' => array(
            'client_table' => 'user',// original is 'oauth_clients',
            'access_token_table' => 'oauth_access_tokens',
            'refresh_token_table' => 'oauth_refresh_tokens',
            'code_table' => 'oauth_authorization_codes',
            'user_table' => 'oauth_users',
            'jwt_table' => 'oauth_jwt',
        ),
    ),
    'zfcuser' => array(
        'enable_username' => true,
        'enable_display_name' => false, //Enable Display Name
        'password_cost' => 10,
        'auth_identity_fields' => array( 'email', '' ),
    ),
    'service_manager' => array(
      'factories' => array(
         'WdevZfcuserApigility\Adapter\OAuth2MongoAdapter' => 'ZF\OAuth2\Factory\MongoAdapterFactory',
      ),
    ),
);