<?php

/** 
 * @link http://www.yiiframework.com/ 
 * @copyright Copyright (c) 2008 Yii Software LLC 
 * @license http://www.yiiframework.com/license/ 
 */

namespace yii\web;

interface IdentityInterface 
{
    /** 
     * Finds an identity by the given ID. 
     * @param string|integer $id the ID to be looked for 
     * @return IdentityInterface the identity object that 
     * matches the given ID. 
     * Null should be returned if such an identity cannot be found 
     * or the identity is not in an active state *(disabled, deleted, etc.) 
     */

    public static function findIdentity($id);

    /** 
     * Finds an identity by the given secrete token. 
     * @param string $token the secrete token * @param mixed $type the type of the token. 
     * The value of this parameter depends on the implementation. * For example, [[\yii\filters\auth\HttpBearerAuth]] will 
     * set this parameter to be `yii\filters\auth\HttpBearerAuth`. * @return IdentityInterface the identity object that matches 
     * the given token. 
     * Null should be returned if such an identity cannot be found 
     * or the identity is not in an active state 
     * (disabled, deleted, etc.) 
     */

    public static function findIdentityByAccessToken($token, $type = null);

    /** 
     * Returns an ID that can uniquely identify a user identity. 
     * @return string|integer an ID that uniquely identifies a user identity. 
     */

    public function getId();

    /**
    * Returns a key that can be used to check the validity of a given identity ID. 
     *
     * The key should be unique for each individual user, and should be persistent 
     * so that it can be used to check the validity of the user identity. 
     * 
     * The space of such keys should be big enough to defeat potential identity atta\ cks. 
     * 
     * This is required if [[User::enableAutoLogin]] is enabled. 
     * @return string a key that is used to check the validity of a given identity I\ D. 
     * @see validateAuthKey() 
     */

    public function getAuthKey();

    /**
     * Validates the given auth key. 
     * 
     * This is required if [[User::enableAutoLogin]] is enabled. 
     * @param string $authKey the given auth key 
     * @return boolean whether the given auth key is valid. 
     * @see getAuthKey() 
     */

    public function validateAuthKey($authKey);

}