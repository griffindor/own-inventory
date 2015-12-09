<?php
class UserFunctions
{
    public static function getShortDate()
    {
        $new_dt = new DateTime();
        
        $formated = $new_dt->format("d.m.Y");
        
        return $formated;
    }
    
    public static function toShort($string)
    {
        $new_dt=new DateTime($string);
        $new_dt = $new_dt->format("d.m.Y");
        return $new_dt;
    }
    
    public static function getFullDate()
    {
        $new_dt=new DateTime();
        
        $formatted = $new_dt->format("Y-m-d H:i:s");
        
        return $formatted;
    }
    
    public static function encode($string)
    {
        $hash = sha1('scuko'.md5($string));
        return $hash;
    }
    
    /*Генерирует уникальную случайную строку из цыфр
    1й параметр - количество символов     
    2й параметр - TRUE - штрихкод, FALSE - реф для компании
    */
    public static function randomString($count, $isBarcode)
    {
        $chars = '0123456789';
        $numChars = strlen($chars);
        $string = '';
        $isUnique = false;
        while (!$isUnique) 
        {
            for ($i = 0; $i < $count; $i++) 
            {
                $string .= substr($chars, rand(1, $numChars) - 1, 1);
            }
            if($isBarcode)
            {
                $records = Device::model()->findAllByAttributes(['barcode'=>$string]);
                if(empty($records))
                {
                    $isUnique = true;
                }
            }
            else 
            {
                $records = Company::model()->findAllByAttributes(['ref'=>$string]);
                if(empty($records))
                {
                    $isUnique = true;
                }
            }
        }
        return $string;
    }
}