<?php
class Akaria
{
    /**
     * Akaria Status Codes
     * 
     * Stores the Akaria special shorhand of the status codes.
     * 
     * @var array
     */
     
    static private $akariaStatusCodes = [100 => 'CONTINUE',
                                         101 => 'SWITCHING',
                                         102 => 'PROCESSING',
                                         200 => 'OK',
                                         201 => 'CREATED',
                                         202 => 'ACCEPTED',
                                         203 => 'NON_AUTH',
                                         204 => 'NO_CONTENT',
                                         205 => 'RESET_CONTENT',
                                         206 => 'PARTIAL_CONTENT',
                                         207 => 'MULTI_STATUS',
                                         208 => 'ALREADY_REPORTED',
                                         226 => 'IM_USED',
                                         300 => 'CHOICES',
                                         301 => 'MOVED',
                                         302 => 'FOUND',
                                         303 => 'OTHER',
                                         304 => 'NOT_MODIFIED',
                                         305 => 'PROXY',
                                         307 => 'TEMP_REDIRECT',
                                         308 => 'PERM_REDIRECT',
                                         400 => 'BAD',
                                         401 => 'UNAUTHORIZED',
                                         402 => 'PAYMENT_REQUIRED',
                                         403 => 'FORBIDDEN',
                                         404 => 'NOT_FOUND',
                                         405 => 'METHOD_NOT_ALLOWED',
                                         406 => 'NOT_ACCEPTABLE',
                                         407 => 'PROXY_AUTH_REQUIRED',
                                         408 => 'REQUEST_TIMEOUT',
                                         409 => 'CONFLICT',
                                         410 => 'GONE',
                                         411 => 'LENGTH_RQUIRED',
                                         412 => 'PRECONDITION_FAILED',
                                         413 => 'ENTITY_TOO_LARGE',
                                         414 => 'URI_TOO_LONG',
                                         415 => 'UNSUPPORTED',
                                         416 => 'REQUESTED_RANGE',
                                         417 => 'EXPECTATION_FAILED',
                                         418 => 'TEAPOT',
                                         420 => 'ENHANCE',
                                         422 => 'UNPROCESSABLE',
                                         423 => 'LOCKED',
                                         424 => 'FAILED_DEPENDENCY',
                                         425 => 'RESERVED',
                                         426 => 'UPGRADE_REQUIRED',
                                         428 => 'PRECONDITION_REQUIRED',
                                         429 => 'TOO_MANY',
                                         431 => 'FIELDS_TOO_LARGE',
                                         444 => 'NO_RESPONSE',
                                         449 => 'RETRY_WITH',
                                         450 => 'BLOCKED_WPC',
                                         499 => 'CLIENT_CLOSED',
                                         500 => 'ERROR',
                                         501 => 'NOT_IMPLEMENTED',
                                         502 => 'BAD_GATEWAY',
                                         503 => 'UNABALIABLE',
                                         504 => 'GATEWAY_TIMEOUT',
                                         505 => 'HTTP_NOT_SUPPORTED',
                                         506 => 'VAN',
                                         507 => 'INSUFFICIENT_STORAGE',
                                         508 => 'LOOP',
                                         509 => 'BANDWIDTH',
                                         510 => 'NOT_EXTENDED',
                                         511 => 'NETWORK_AUTH_REQUIRED',
                                         598 => 'NETWORK_READ_TIMEOUT',
                                         599 => 'NETWORK_CONNECT_TIMEOUT'];
    
    /**
     * Status Codes
     * 
     * Stores the standard status codes.
     * 
     * @var array
     */
     
    static private $statusCodes = [100 => 'Continue',
                                   101 => 'Switching Protocols',
                                   102 => 'Processing',
                                   200 => 'OK',
                                   201 => 'Created',
                                   202 => 'Accepted',
                                   203 => 'Non-Authoritative Information',
                                   204 => 'No Content',
                                   205 => 'Reset Content',
                                   206 => 'Partial Content',
                                   207 => 'Multi-Status',
                                   208 => 'Already Reported',
                                   226 => 'IM Used',
                                   300 => 'Multiple Choices',
                                   301 => 'Moved Permanently',
                                   302 => 'Found',
                                   303 => 'See Other',
                                   304 => 'Not Modified',
                                   305 => 'Use Proxy',
                                   307 => 'Temporary Redirect',
                                   308 => 'Permanent Redirect',
                                   400 => 'Bad Request',
                                   401 => 'Unauthorized',
                                   402 => 'Payment Required',
                                   403 => 'Forbidden',
                                   404 => 'Not Found',
                                   405 => 'Method Not Allowed',
                                   406 => 'Not Acceptable',
                                   407 => 'Proxy Authentication Required',
                                   408 => 'Request Timeout',
                                   409 => 'Conflict',
                                   410 => 'Gone',
                                   411 => 'Length Required',
                                   412 => 'Precondition Failed',
                                   413 => 'Request Entity Too Large',
                                   414 => 'Request-URI Too Long',
                                   415 => 'Unsupported Media Type',
                                   416 => 'Requested Range Not Satisfiable',
                                   417 => 'Expectation Failed',
                                   418 => 'I\'m a teapot',
                                   420 => 'Enhance Your Calm',
                                   422 => 'Unprocessable Entity',
                                   423 => 'Locked',
                                   424 => 'Failed Dependency',
                                   425 => 'Reserved for WebDAV',
                                   426 => 'Upgrade Required',
                                   428 => 'Precondition Required',
                                   429 => 'Too Many Requests',
                                   431 => 'Request Header Fields Too Large',
                                   444 => 'No Response',
                                   449 => 'Retry With',
                                   450 => 'Blocked by Windows Parental Controls',
                                   499 => 'Client Closed Request',
                                   500 => 'Internal Server Error',
                                   501 => 'Not Implemented',
                                   502 => 'Bad Gateway',
                                   503 => 'Service Unavailable',
                                   504 => 'Gateway Timeout',
                                   505 => 'HTTP Version Not Supported',
                                   506 => 'Variant Also Negotiates',
                                   507 => 'Insufficient Storage',
                                   508 => 'Loop Detected',
                                   509 => 'Bandwidth Limit Exceeded',
                                   510 => 'Not Extended',
                                   511 => 'Network Authentication Required',
                                   598 => 'Network read timeout error',
                                   599 => 'Network connect timeout error'];
    
    
    
    
    /**
     * CALL STATIC
     * 
     * @param string $name   The function name.
     * @param mixed  $args   The arguments.
     */
     
    function __callStatic($name, $args)
    {
        switch($name)
        {
            case 'ok'          : http_response_code(200); break;
            case 'created'     : http_response_code(201); break;
            case 'noContent'   : http_response_code(204); break;
            case 'notModified' : http_response_code(304); break;
            case 'bad'         : http_response_code(400); break;
            case 'unauthorized': http_response_code(401); break;
            case 'forbidden'   : http_response_code(403); break;
            case 'notFound'    : http_response_code(404); break;
            case 'conflict'    : http_response_code(409); break;
            case 'error'       : http_response_code(500); break;
        }
    }
    
    
    
    
    /**
     * To Status Code
     * 
     * Convert what-ever to the status code.
     * 
     * @param string|int $status   The string or the code to code (yeah.).
     * 
     * @return int|bool
     */
     
    static function toStatusCode($status)
    {
        if(is_int($status))
            return $status;
        elseif(strtoupper($status) === $status)
            return array_search($status, self::$akariaStatusCodes);
        else
            return array_search($status, self::$statusCodes);
    }
    
    
    
    
    /**
     * Positive
     * 
     * Returns true when the status code is lesser than 400.
     * 
     * @param string|int $status   The status code to test.
     * 
     * @return bool
     */
     
    static function positive($status)
    {
        return self::toStatusCode($status) < 400;
    }
    
    
    
    
    /**
     * Negative
     * 
     * Returns true when the status code is greater than 400.
     * 
     * @param string|int $status   The status code to test.
     * 
     * @return bool
     */
     
    static function negative($status)
    {
        return !self::toStatusCode($status) < 400;
    }
    
    
    
    
    /**
     * Equals
     * 
     * Returns true when both the codes were meaning the same status code.
     * 
     * @param string|int $status    The first status code.
     * @param string|int $status2   The second status code.
     * 
     * @return bool
     */
     
    static function equals($status, $status2)
    {
        $status  = self::toStatusCode($status);
        $status2 = self::toStatusCode($status2);
        
        return $status === $status2;
    }
}                                     
?>