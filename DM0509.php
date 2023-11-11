<?php
class DM0509
{
    public function dm0509Encoder($encode_str)
    {
        return self::_dm0509Encoder($encode_str);
    }

    public function dm0509Decoder($decode_str)
    {
        return self::_dm0509Decoder($decode_str);
    }

    private function _dm0509Encoder($encode_str)
    {
        $encode_str = base64_encode(serialize(json_encode($encode_str)));
        $encode_strarr = str_split($encode_str);
        $encode_str = "";
        if(isset($encode_strarr) and !empty($encode_strarr))
        {
            foreach($encode_strarr as $encode_strval)
            {
                $encode_str .= $encode_strval;
                $encode_str.= self::_randChar();
            }
        }
        $encode_str = strrev($encode_str);
        return $encode_str;
    }

    private function _dm0509Decoder($decode_str)
    {
        $decode_str = strrev($decode_str);
        $decode_str = str_split($decode_str);
        $decode_str = array_map('ord', $decode_str);
        $randelem = [33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 58, 59, 60, 62, 63, 64, 91, 92, 93, 94, 95, 96, 123, 124, 125, 126];
        $newstr = [];
        if(isset($decode_str) and !empty($decode_str))
        {
            foreach($decode_str as $strval)
            {
                if(!in_array($strval, $randelem))
                {
                    $newstr[] = $strval;
                }
            }
        }
        $decode_str = $newstr;
        $decode_str = array_map('chr', $decode_str);
        $decode_str = join($decode_str);
        $decode_str = json_decode(unserialize(base64_decode($decode_str)), true);
        return $decode_str;
    }

    private function _randChar()
    {
        $num1 = rand(33, 47);
        $num2_1 = rand(58, 60);
        $num2_2 = rand(62, 64);
        $num3 = rand(91, 96);
        $num4 = rand(123, 126);
        $arr = [$num1, $num2_1, $num2_2, $num3, $num4];
        $randkey = array_rand($arr);
        $asciicode =  $arr[$randkey];
        $asciichar = chr($asciicode);
        return $asciichar;
    }
}