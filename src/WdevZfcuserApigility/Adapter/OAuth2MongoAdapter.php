<?php
namespace WdevZfcuserApigility\Adapter;

use ZF\OAuth2\Adapter\MongoAdapter;

class OAuth2MongoAdapter extends MongoAdapter
{
    
    protected $mapper;

    public function setUsersMapper(Users\MapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    public function checkUserCredentials($username, $password)
    {
        return $this->mapper->validate($username, $password);
    }

    public function getUser($username)
    {
        $user = $this->mapper->fetch($username, $asArray = true);
        if (! $user) {
            return false;
        }

        unset(
            $user['activated'],
            $user['activated_date'],
            $user['activation_key'],
            $user['password']
        );

        return array_merge(array(
            'user_id' => $username,
        ), $user->getArrayCopy());
    }

    public function setUser($username, $password, $firstName = null, $lastName = null)
    {
        $user = $this->mapper->create(
            $username,
            $password,
            sprintf('%s %s', $firstName, $lastName),
            $asArray = true
        );

        if (false === $user) {
            return false;
        }

        return true;
    }
    
    
    public function __construct($connection, $config = array())
    {
        parent::__construct($connection, $config);
        
        //  $this->config['user_table'] = (USER TABLE GOES HERE);
    }

}