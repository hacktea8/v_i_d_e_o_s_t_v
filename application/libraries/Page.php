<?php
/*
 *本程序文件对分页程序进行了封装
 *
*/

class Page
{
    var $page_max = 10; //一组页码的最大数

    var $page_num = 10; //总页数
    var $length = 20; //一页的数据条数

    var $isNextPage = true;
    var $isFirstPage = false;

    function Calculation_Page_Num( $total )
    {
        $this->page_num = ceil( $total / $this->length );
        return $this->page_num;
    }

    function Calculation_Min_Max( $act_page = 1 )
    {
        // 定义左右偏移量
        $py_left = 0;
        $py_right = 0;
        // 定义左右边界
        $bj_left = 0;
        $bj_right = 0;
        // 定义滚动区间边界
        $gd_left = 0;
        $gd_right = 0;
        // 判断是否需要分组
        if ( ( $this->page_num - $this->page_max ) <= 0 )
        {
            // 不需要分组
            $bj_left = 1;
            $bj_right = $this->page_num;
        }
        else
        {
            // 要进行分组
            // 判断容量的奇偶
            $tmp = $this->page_max % 2;
            if ( $tmp === 1 )
            {
                // 奇数
                $py_left = $py_right = ( $this->page_max - 1 ) / 2;
            }
            else
            {
                // 偶数
                $py_left = $this->page_max / 2 - 1;
                $py_right = $this->page_max / 2;
            }
            // 计算滚动区间
            $gd_left = 1 + $py_left;
            $gd_right = $this->page_num - $py_right;
            // 判断当前页是否落入了滚动区间
            if ( $act_page >= $gd_left && $act_page <= $gd_right )
            {
                // 区间内
                $bj_left = $act_page - $py_left;
                $bj_right = $act_page + $py_right;
            }
            else
            {
                // 区间外
                if ( ( $act_page - $py_left ) <= 1 )
                {
                    // 左侧固定区间
                    $bj_left = 1;
                    $bj_right = $this->page_max;
                }
                else
                {
                    $bj_left = $this->page_num - $this->page_max + 1;
                    $bj_right = $this->page_num;
                }
            }
        }

        $res = array();
        $res['min'] = $bj_left;
        $res['max'] = $bj_right;

        return $res;
       
    }
    // 主方法
    function make_page( $total, $act_page, $url, $param )
    {
        $page_num = $this->Calculation_Page_Num( $total );
        $arr_min_max = $this->Calculation_Min_Max( $act_page );
        
        if (!eregi("([?|&]$param=)", $url)) {
            $url = strpos($url,"?")===false?$url."?":$url."&";
            $url = $url."$param=0";
        }

        if ( $act_page > $page_num )
        {
            $act_page = $page_num;
        }
        // 用正则把url改成正规的
        $url = eregi_replace( $param . '=[0-9]+', $param . '=0', $url );

        $res = array();
        $d = 0;
        for( $i = $arr_min_max['min'];$i <= $arr_min_max['max'];$i++ )
        {
            if ( $i == $act_page )
            {
                $res[$d]['url'] = '';
                $res[$d]['name'] = $i;
                $res[$d]['no'] = $i;
            }
            else
            {
                $res[$d]['url'] = str_replace( $param . '=0', $param . '=' . $i, $url );
                $res[$d]['name'] = $i;
                $res[$d]['no'] = $i;
            }
            $d++;
        }

        if ( $this->isNextPage )
        {
            $res = $this->make_before_next_link( $res, $act_page, $url, $param );
        }
        if ( $this->isFirstPage )
        {
            $res = $this->make_first_end_link( $res, $act_page, $url, $param );
        }
        return $res;
    }
    //// 带总页数
    function make_page_with_total( $total, $act_page, $url, $param )
    {
        $page_num = $this->Calculation_Page_Num( $total );
        $arr_min_max = $this->Calculation_Min_Max( $act_page );
        
        if (!eregi("([?|&]$param=)", $url)) {
            $url = strpos($url,"?")===false?$url."?":$url."&";
            $url = $url."$param=0";
        }

        if ( $act_page > $page_num )
        {
            $act_page = $page_num;
        }
        // 用正则把url改成正规的
        $url = eregi_replace( $param . '=[0-9]+', $param . '=0', $url );

        $res = array();
        $d = 0;
        for( $i = $arr_min_max['min'];$i <= $arr_min_max['max'];$i++ )
        {
            if ( $i == $act_page )
            {
                $res[$d]['url'] = '';
                $res[$d]['name'] = $i;
                $res[$d]['no'] = $i;
            }
            else
            {
                $res[$d]['url'] = str_replace( $param . '=0', $param . '=' . $i, $url );
                $res[$d]['name'] = $i;
                $res[$d]['no'] = $i;
            }
            $d++;
        }

        if ( $this->isNextPage )
        {
            $res = $this->make_before_next_link( $res, $act_page, $url, $param );
        }
        if ( $this->isFirstPage )
        {
            $res = $this->make_first_end_link( $res, $act_page, $url, $param );
        }
        
        $total_num= ceil($total/$this->length);
        $result['total']=$total_num;
        $result['DATA']=$res;
        return $result;
    }
    
    // 附加上一页和下一页
    function make_before_next_link( $arr, $act, $url, $param )
    {
        $tmp = array();

        $before = $act - 1;
        $next = $act + 1;

        if ( $before < 1 )
        {
            $before = 1;
            $tmp[0]['url'] = '';
            $tmp[0]['name'] = "上一页";
            $tmp[0]['no'] = $before;
        }
        else
        {
            $tmp[0]['url'] = str_replace( $param . '=0', $param . '=' . $before, $url );
            $tmp[0]['name'] = "上一页";
            $tmp[0]['no'] = $before;
        }

        $counts = sizeof( $arr );
        $tmp_count = sizeof( $tmp );
        for( $i = 0;$i < $counts;$i++ )
        {
            $tmp[$tmp_count]['url'] = $arr[$i]['url'];
            $tmp[$tmp_count]['name'] = $arr[$i]['name'];
            $tmp[$tmp_count]['no'] = $arr[$i]['no'];
            $tmp_count++;
        }

        if ( $next > $this->page_num )
        {
            $next = $this->page_num;
            $tmp[$tmp_count]['url'] = '';
            $tmp[$tmp_count]['name'] = "下一页";
            $tmp[$tmp_count]['no'] = $next;
        }
        else
        {
            $tmp[$tmp_count]['url'] = str_replace( $param . '=0', $param . '=' . $next, $url );
            $tmp[$tmp_count]['name'] = "下一页";
            $tmp[$tmp_count]['no'] = $next;
        }

        return $tmp;
    }
    
    // 附加首页和尾页
    function make_first_end_link( $arr, $act, $url, $param )
    {
        $tmp = array();

        $before = 1;
        $next = $this->page_num;

        if ( $act == 1 )
        {
            $before = 1;
            $tmp[0]['url'] = '';
            $tmp[0]['name'] = "首页";
            $tmp[0]['no'] = $before;
        }
        else
        {
            $tmp[0]['url'] = str_replace( $param . '=0', $param . '=' . $before, $url );
            $tmp[0]['name'] = "首页";
            $tmp[0]['no'] = $before;
        }

        $counts = sizeof( $arr );
        $tmp_count = sizeof( $tmp );
        for( $i = 0;$i < $counts;$i++ )
        {
            $tmp[$tmp_count]['url'] = $arr[$i]['url'];
            $tmp[$tmp_count]['name'] = $arr[$i]['name'];
            $tmp[$tmp_count]['no'] = $arr[$i]['no'];
            $tmp_count++;
        }

        if ( $act == $this->page_num )
        {
            $tmp[$tmp_count]['url'] = '';
            $tmp[$tmp_count]['name'] = "尾页";
            $tmp[$tmp_count]['no'] = $next;
        }
        else
        {
            $tmp[$tmp_count]['url'] = str_replace( $param . '=0', $param . '=' . $next, $url );
            $tmp[$tmp_count]['name'] = "尾页";
            $tmp[$tmp_count]['no'] = $next;
        }

        return $tmp;
    }
    
     
    /**
     * 带上一页<，下一页>，省略号的分页
     * @param int $total        记录总条数
     * @param int $act_page        当前页码
     * @param string $url        url
     * @param int $maxpageicon    最大显示页码数
     * @param int $style        上一页，下一页显示样式
     * @param string $param        url参数
     */
    function make_page_with_points( $total,$act_page,$url,$maxpageicon,$style,$param )
    {
        $page_num = $this->Calculation_Page_Num( $total );        //总页数
        $arr_min_max = $this->Calculation_Min_Max( $act_page );        //最大页，最小页    
        if($total==0)
        {
             return "";

        }
        if( $act_page > $page_num )
        {
            $act_page = $page_num+1;
            $page_num = $page_num+1;
        }
        
        switch ($style){
            case 1:
                $name_before = '前一页';
                $name_next = '后一页';
                break;
            case 2:
                $name_before = '<';
                $name_next = '>';
                break;
            case 3:
                $name_before = '<<';
                $name_next = '>>';
                break;
            default:
                $name_before = '上一页';
                $name_next = '下一页';
        }
        
        if (!eregi("([?|&]$param=)", $url)) {
            $url = strpos($url,"?")===false?$url."?":$url."&";
            $url = $url."$param=0";
        }
                
        // 用正则把url改成正规的
        $url = eregi_replace( $param . '=[0-9]+', $param . '=0', $url );
        $res = array();
        $no_before = $act_page-1;
        $no_next = $act_page+1;
        
        //总页数如果小于等于初始化最大呈现页数
        if ($page_num<= ($maxpageicon + 1))
        {
            //如果当前页数是首页  上一页无效
            if ($act_page == 1)    
            {
                $res[0]['url'] = '';
                $res[0]['name'] = $name_before;
                $res[0]['no'] = $no_before;
            }
            else            //上一页有效
            {
                $res[0]['url'] = str_replace( $param . '=0', $param . '=' .($act_page - 1), $url );
                $res[0]['name'] = $name_before;
                $res[0]['no'] = $no_before;  
            }
            //循环添加页码
            $d = 1;
            for ($i = 1; $i <= $page_num; $i++)
            {
                if ($i != $act_page)
                {
                    $res[$d]['url'] = str_replace( $param . '=0', $param . '=' . $i, $url );
                    $res[$d]['name'] = $i;
                    $res[$d]['no'] = $i;
                }
                else    //当前页，页码
                {
                    $res[$d]['url'] = '';
                    $res[$d]['name'] = $i;
                    $res[$d]['no'] = $i;
                    $res[$d]['attr'] = 'current';
                }
                $d++;
            }
            $last_d = count($res);
            //判断尾页
            if($act_page == $page_num)    //下一页无效
            {
                $res[$last_d]['url'] = '';
                $res[$last_d]['name'] = $name_next;
                $res[$last_d]['no'] = $no_next;        
            }
            else
            {
                  $res[$last_d]['url'] = str_replace( $param . '=0', $param . '=' .($act_page + 1), $url );
                $res[$last_d]['name'] = $name_next;
                $res[$last_d]['no'] = $no_next;
            }
        }else if ($page_num > ($maxpageicon + 1))//如果总页数满足添加省略号
        { 
            if ($act_page <= $maxpageicon) //如果当前页小于等于初始化数目
            {
                //如果当前页数是首页  上一页无效
                if ($act_page == 1)    
                {
                    $res[0]['url'] = '';
                    $res[0]['name'] = $name_before;
                    $res[0]['no'] = $no_before;
                }
                else            //上一页有效
                {
                    $res[0]['url'] = str_replace( $param . '=0', $param . '=' .($act_page - 1), $url );
                    $res[0]['name'] = $name_before;
                    $res[0]['no'] = $no_before;  
                }
                //循环添加页码
                $d = 1;
                for ($i = 1; $i <= $maxpageicon; $i++)
                {
                    if ($i != $act_page)
                    {
                        $res[$d]['url'] = str_replace( $param . '=0', $param . '=' . $i, $url );
                        $res[$d]['name'] = $i;
                        $res[$d]['no'] = $i;
                    }
                    else    //当前页，页码
                    {
                        $res[$d]['url'] = '';
                        $res[$d]['name'] = $i;
                        $res[$d]['no'] = $i;
                        $res[$d]['attr'] = 'current';
                    }
                    $d++;
                }
                $last_d = count($res);
                //添加省略号
                $res[$last_d]['url'] = '';
                $res[$last_d]['name'] = '...';
                $res[$last_d]['no'] = '';
                //总页数
                $res[$last_d+1]['url'] = str_replace( $param . '=0', $param . '=' . $page_num, $url );
                $res[$last_d+1]['name'] = $page_num;
                $res[$last_d+1]['no'] = $page_num;
                //下一页
                $res[$last_d+1]['url'] = str_replace( $param . '=0', $param . '=' . ($act_page + 1), $url );
                $res[$last_d+1]['name'] = $name_next;
                $res[$last_d+1]['no'] = $no_next;         
            }else//如果当前页大于最大显示页面
            {
                if ($act_page > ($page_num - $maxpageicon))//满足后几页
                {
                    //上一页
                    $res[0]['url'] = str_replace( $param . '=0', $param . '=' .($act_page - 1), $url );
                    $res[0]['name'] = $name_before;
                    $res[0]['no'] = $no_before;
                    //第一页
                    $res[1]['url'] = str_replace( $param . '=0', $param . '=1', $url );
                    $res[1]['name'] = 1;
                    $res[1]['no'] = 1;   
                    //省略号
                    $res[2]['url'] = '';
                    $res[2]['name'] = '...';
                    $res[2]['no'] = '';  
                    $d = 3;
                    for ($i = ($page_num - $maxpageicon + 1); $i <= $page_num; $i++)
                    {
                        if ($i != $act_page)
                        {
                            $res[$d]['url'] = str_replace( $param . '=0', $param . '=' . $i, $url );
                            $res[$d]['name'] = $i;
                            $res[$d]['no'] = $i;
                        }
                        else    //当前页，页码
                        {
                            $res[$d]['url'] = '';
                            $res[$d]['name'] = $i;
                            $res[$d]['no'] = $i;
                            $res[$d]['attr'] = 'current';
                        }
                        $d++;
                    }
                    $last_d = count($res);
                    //判断尾页
                    if($act_page == $page_num)    //下一页无效
                    {
                          $res[$last_d]['url'] = '';
                        $res[$last_d]['name'] = $name_next;
                        $res[$last_d]['no'] = $no_next;        
                    }
                    else
                    {
                          $res[$last_d]['url'] = str_replace( $param . '=0', $param . '=' .($act_page + 1), $url );
                        $res[$last_d]['name'] = $name_next;
                        $res[$last_d]['no'] = $no_next;
                    }

                }else//满足处在中间
                {
                    //上一页
                    $res[0]['url'] = str_replace( $param . '=0', $param . '=' .($act_page - 1), $url );
                    $res[0]['name'] = $name_before;
                    $res[0]['no'] = $no_before;
                    //第一页
                    $res[1]['url'] = str_replace( $param . '=0', $param . '=1', $url );
                    $res[1]['name'] = 1;
                    $res[1]['no'] = 1;   
                    //省略号
                    $res[2]['url'] = '';
                    $res[2]['name'] = '...';
                    $res[2]['no'] = '';  
                    for ($i = ($act_page - ($maxpageicon - 2) / 2); $i <= floor($act_page+($maxpageicon - 2) / 2); $i++)
                    {
                        $i = ceil($i);
                        if ($i != $act_page)
                        {
                            $res[$d]['url'] = str_replace( $param . '=0', $param . '=' . $i, $url );
                            $res[$d]['name'] = $i;
                            $res[$d]['no'] = $i;
                        }
                        else    //当前页，页码
                        {
                            $res[$d]['url'] = '';
                            $res[$d]['name'] = $i;
                            $res[$d]['no'] = $i;
                            $res[$d]['attr'] = 'current';
                        }
                        $d++;
                   }
                    $last_d = count($res);
                    //加省略号
                    $res[$last_d]['url'] = '';
                    $res[$last_d]['name'] = '...';
                    $res[$last_d]['no'] = '';
                    //当前页
                    $res[$last_d+1]['url'] = str_replace( $param . '=0', $param . '=' . $page_num, $url );
                    $res[$last_d+1]['name'] = $page_num;
                    $res[$last_d+1]['no'] = $page_num;        
                    //下一页
                    $res[$last_d+2]['url'] = str_replace( $param . '=0', $param . '=' . ($act_page + 1), $url );
                    $res[$last_d+2]['name'] = $name_next;
                    $res[$last_d+2]['no'] = $no_next;
                    //exit;    
                 }
            }
        }
        return $res;
    }
}

?>
