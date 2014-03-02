<?php

//defined('BASEPATH') || exit('Forbidden');

require_once BASEPATH.'../yxm/YinXiangMaLibConfig.php';
require_once BASEPATH.'../yxm/YinXiangMaLib.php';

class Verify{
   
   public function __construct(){

   }

   public function show(){
     $return = "
<script type='text/javascript'>
                var YXM_PUBLIC_KEY = '".PUBLIC_KEY."';
                var YXM_localsec_url = '/yxm/localsec/';
                function YXM_local_check()
                {
                if(typeof(YinXiangMaDataString)!='undefined')return;
                YXM_oldtag = document.getElementById('YXM_script');
                var YXM_local=document.createElement('script');
                YXM_local.setAttribute(\"type\",\"text/javascript\");
                YXM_local.setAttribute(\"id\",\"YXM_script\");
                YXM_local.setAttribute(\"src\",YXM_localsec_url+'yinxiangma.js?pk='+YXM_PUBLIC_KEY+'&v=YinXiangMa_PHPSDK_4.0');
                YXM_oldtag.parentNode.replaceChild(YXM_local,YXM_oldtag);  
                }
                setTimeout(\"YXM_local_check()\",3000);
                document.write(\"<input type='hidden' id='YXM_here' /><script type='text/javascript' charset='gbk' id='YXM_script' src='http://api.yinxiangma.com/api3/yzm.yinxiangma.php?pk=\"+YXM_PUBLIC_KEY+\"&v=YinXiangMaPHPSDK_4.0'><\"+\"/script>\");
                </script>
                ";
     return $return;
   }

   public function check(){
     $YinXiangMa_response = YinXiangMa_ValidResult(@$_POST['YinXiangMa_challenge'],@$_POST['YXM_level'][0],@$_POST['YXM_input_result']);
     if($YinXiangMa_response == 'true') {
       return true;
     }
     return false;
     
   }
}
?>
