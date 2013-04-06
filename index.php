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

$file = "课程笔记/第八节：可扩展的类内方法设计.md";

echo sprintf("<pre>%s</pre>", file_get_contents($file));
exit;
