<?php
/**
 * shadow类库的基本使用类
 * 
 * 1. 为类库提供使用指南和说明
 * 
 * @author monkee<zomboo1@126.com>
 * @copyright 2013-2014
 * @package shadow
 * @version 0.1.0
 */

include "shadow.php";

//测试自动载入是否正常

$autoClass = new Sample(); //测试主类是否正常
$autoClass = new Sample_SubClass(); //测试各自类包里的子类是否正常
$autoClass = new Sample_SubClass_SecClass(); //测试类包下的多级分类是否正常

echo "如何写好一个PHP的类\n";
echo "第一节：创建一个基础环境\n";
echo "微博：偷蚊子的玩敏捷\n";
echo "微信：monkeehu\n";
echo "https://github.com/monkee/shadow";
//throw new SDException("欢迎参加课程：如何写好一个PHP的类", 200);