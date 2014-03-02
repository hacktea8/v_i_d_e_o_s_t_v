<?php

//这是一个帮助工具，一般你并不需要它
class HelperError {

    static function parseReturn($code, $msg) {
        //#TODO 添加用户自己的失败处理逻辑
        echo "error code:" . $code;
        if (json_decode($msg)) {
            var_dump(json_decode($msg, true));
        } else {
            var_dump($msg);
        }
    }

}

class Words {

    public static function createWords($length = 128) {
        $seperate = array("，", "。", "！", "？", "；");
        $words = array("云搜索","好", "者", "宗", "为", "广", "大", "爱", "好", "者", "提", "霖", "供", "了", "教", "程", "何", "教", "程", "网", "站", "开", "发", "等", "相", "关", "的", "内", "容", "旨", "在", "和", "大", "家", "一", "起", "分", "享", "学", "习", "的", "乐", "趣");

        $strings = '';
        for ($i = 0; $i < $length; $i++) {
            $strings .= $words[array_rand($words)];
            if (fmod($i, 18) > rand(10, 20)) {
                $strings .= $seperate[rand(0, 4)];
            }
        }
        return $strings;
    }

    public static function createLine() {
        $paras = rand(1, 10);
        $strings = '';

        for ($i = 0; $i < $paras; $i++) {
            $strings .= '&nbsp;&nbsp;&nbsp;&nbsp;' . self::createWords(rand(100, 500)) . '<br />';
        }
    }

    public static function arrayRecursive(&$array, $function, $apply_to_keys_also = false) {
        static $recursive_counter = 0;
        if (++$recursive_counter > 1000) {
            die('possible deep recursion attack');
        }
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                self::arrayRecursive($array[$key], $function, $apply_to_keys_also);
            } else {
                $output[$key] = $function($value);
            }

            if ($apply_to_keys_also && is_string($key)) {
                $new_key = $function($key);
                if ($new_key != $key) {
                    $output[$new_key] = $array[$key];
                    unset($array[$key]);
                }
            }
        }
        $recursive_counter--;
        $array = $output;
    }

    /*     * ************************************************************
     *
     * 	将数组转换为JSON字符串（兼容中文）
     * 	@param	array	$array		要转换的数组
     * 	@return string		转换得到的json字符串
     * 	@access public
     *
     * *********************************************************** */

    public static function JSON($array) {
        self::arrayRecursive($array, 'urlencode', true);
        $json = json_encode($array);
        return urldecode($json);
    }

    public static function parseRed($w, $q = '') {
        return str_replace($q, '<em>' . $q . '</em>', $w);
    }

    /**
     * Checks if the content is UTF-8 characters and returns the UTF-8 formatted
     * result.
     * NOTE: If there is header of BOM then ignores the BOM info.
     * @param {string} $str The original content.
     * @return {string} Returns the UTF-8 result.
     * @static
     */
    public static function convertToUTF8($str) {
        if (function_exists("mb_detect_encoding")) {
            if (mb_detect_encoding($str, array('UTF-8', 'CP936')) === 'UTF-8') {
                if (ord(substr($str, 0, 1)) == 239 && ord(substr($str, 1, 1)) == 187 && ord(substr($str, 2, 1)) == 191) {
                    $str = substr($str, 3);
                }
            } else {
                $str = @iconv('GBK//IGNORE', 'UTF-8', $str);
            }
        }
        return $str;
    }

    public static function checkBom($contents) {

        $charset[1] = substr($contents, 0, 1);
        $charset[2] = substr($contents, 1, 1);
        $charset[3] = substr($contents, 2, 1);
        if (ord($charset[1]) == 239 && ord($charset[2]) == 187 && ord($charset[3]) == 191) {

            return substr($contents, 3);
        } else {
            return $contents;
        }
    }

}

?>
