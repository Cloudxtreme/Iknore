<?php
class IknoreMaster
{
    static private $geoRawPath    = __DIR__ . '/ip_list/ip.csv';
    static private $geoCookedPath = __DIR__ . '/ip_list/ip.json';
    static private $currentIP     = '';  
    static private $currentCountry = '';
    static private $countryCookie = 'iknore_country_code';
    
    static function validateSecretKey($secretKey = null)
    {
        if($secretKey !== SECRECT_KEY)
            return Akaria::unauthorized();
    }
    
    
    
    static function initialize()
    {
        self::getIP();
        
        if(!file_exists(self::$geoCookedPath))
            self::convertGeoDatabase();
        
        if(!isset($_COOKIE[self::$countryCookie]))
            self::setCountry();
            
    }
    
    
    
    static function setCountry()
    {
        self::getCountryCode();
        
        setcookie(self::$countryCookie, self::$currentCountry, time() + 3600);
    }
    
    
    static function getIP()
    {
        if(isset($_SERVER['HTTP_CLIENT_IP']))
            self::$currentIP = $_SERVER['HTTP_CLIENT_IP'];
        elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            self::$currentIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        elseif(isset($_SERVER['HTTP_X_FORWARDED']))
            self::$currentIP = $_SERVER['HTTP_X_FORWARDED'];
        elseif(isset($_SERVER['HTTP_FORWARDED_FOR']))
            self::$currentIP = $_SERVER['HTTP_FORWARDED_FOR'];
        elseif(isset($_SERVER['HTTP_FORWARDED']))
            self::$currentIP = $_SERVER['HTTP_FORWARDED'];
        else
            self::$currentIP = $_SERVER['REMOTE_ADDR'];
    }
    
    static function getCountryCode()
    {
        $geoDatabase     = json_decode(file_get_contents(self::$geoCookedPath));
        $currentIP       = ip2long(self::$currentIP);

        foreach($geoDatabase as $countryCode => $netblocks)
        {
            foreach($netblocks as $netblock)
            {
                $from = $netblock[0];
                $to   = $netblock[1];
                
                if(($currentIP >= $from) && ($currentIP <= $to))
                {
                    self::$currentCountry = $countryCode;
                    break 2;
                }
            }
        }
    }
    
    
    static function convertGeoDatabase()
    {
        $lines   = explode("\n", file_get_contents(self::$geoRawPath));
        $columns = str_getcsv($lines[0]);
        $n       = count($lines) - 1;
        $array   = [];
        
        for($i = 1; $i < $n; ++$i)
        {
            $values      = str_getcsv($lines[$i]);
            $ipFrom      = $values[0];
            $ipTo        = $values[1];
            $countryCode = $values[2];
            
            if($countryCode == '-')
                continue;
            
            if(!isset($array[$countryCode]))
                $array[$countryCode] = [];
            
            array_push($array[$countryCode], [$ipFrom, $ipTo]);
        }
        
        file_put_contents(self::$geoCookedPath, json_encode($array, JSON_NUMERIC_CHECK));
    }
}
?>