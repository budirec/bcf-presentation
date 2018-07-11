<?php
/**
 * Created by PhpStorm.
 * User: rad
 * Date: 7/10/18
 * Time: 9:06 PM
 */

namespace BCF\Library\Utils;


use Throwable;

class HttpException extends \Exception
{
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_INTERNAL_SERVER_ERROR = 500;
    
    const KNOW_RESPONSE_CODE = [
        self::HTTP_BAD_REQUEST,
        self::HTTP_UNAUTHORIZED,
        self::HTTP_FORBIDDEN,
        self::HTTP_NOT_FOUND,
        self::HTTP_INTERNAL_SERVER_ERROR,
    ];
    
    const DEFAULT_ERROR_MESSAGE = [
        self::HTTP_BAD_REQUEST => 'Bad request',
        self::HTTP_UNAUTHORIZED => 'Please login',
        self::HTTP_FORBIDDEN => 'You don\'t have permission',
        self::HTTP_NOT_FOUND => 'Not found',
        self::HTTP_INTERNAL_SERVER_ERROR => 'Sorry, we screw up',
    ];
    
    public function __construct(
        int $httpResponseCode,
        string $userFriendlyMessage,
        string $internalMessage = "",
        int $internalCode = 0,
        Throwable $previous = null
    ) {
        parent::__construct($internalMessage, $internalCode, $previous);
        
        $this->setHttpResponseCode($httpResponseCode);
        $this->setUserFriendlyMessage($userFriendlyMessage);
    }
    
    /**
     * @return int
     */
    public function getHttpResponseCode(): int
    {
        return $this->httpResponseCode;
    }
    
    /**
     * @param int $httpResponseCode
     */
    public function setHttpResponseCode(int $httpResponseCode)
    {
        if (in_array($httpResponseCode, self::KNOW_RESPONSE_CODE)) {
            $this->httpResponseCode = $httpResponseCode;
        } else {
            $this->httpResponseCode = self::HTTP_INTERNAL_SERVER_ERROR;
        }
    }
    
    /**
     * @return string
     */
    public function getUserFriendlyMessage(): string
    {
        return $this->userFriendlyMessage;
    }
    
    /**
     * @param string $userFriendlyMessage
     */
    public function setUserFriendlyMessage(string $userFriendlyMessage)
    {
        $this->userFriendlyMessage = $userFriendlyMessage;
    }
    
    
    /** @var int */
    private $httpResponseCode;
    /** @var string */
    private $userFriendlyMessage;
}
