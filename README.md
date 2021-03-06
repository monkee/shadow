# shadow
======

一个可常用的PHP公共资源包，同时也是百度文库课程《如何写好一个PHP的类》的源码。  
课程的主要内容可以在“课程笔记”中找到，里面有每一节的主要内容讲解。

## 课程介绍
首先，这门课面向PHP开发者，主要讲解一个类库的的建立、开发和使用。课程内容会逐步涉及到PHP在面向对象开发过程中使用到的常用知识。
与理论中强调大而全不同的是，这里面讲到的都是偏实用的东西。这里面会涉及到一些经常听说到但对于很多人来说很少用到的东西，如：

1. 测试驱动开发（TDD）以及测试基类的原理
2. 如何使用配置
3. 多级子类的使用
4. 使用异常
5. 常用的类的写法和优化
6. 重构
7. spl里的一些东西
8. 敏捷的一些原则和实践
9. 除此之外的其它知识

课程地址：http://wenku.baidu.com/course/view/7cea0975f46527d3240ce003

于此同时，我个人也在不断学习中，有好的东西也会在这里和大家分享。

## 联系方式
如果大家有任何与本课内容有关的话题，欢迎大家+我的微博。  
我的微博名叫：偷蚊子的在百度  
github : https://github.com/monkee/shadow  

## 类库介绍
首先我们先来定义一下几个常用的名字

类库：shadow本身，承载了一些列的类、工具的载体；比如，我们用的shadow就是一个类库；  
类包：类库内实现具体类的个体，比如目前我们看到的：Sample、Hello等。
主类：类包内，与类包同名的类，我们称之为主类，它必须存在，且可以是这个类对外的接口类
子类：类包内，除主类外，在类包下的其它类，我们称为子类
多级子类：类包内，可以在子目录内出现的类，我们称为多级子类，如：Sample_Sub_Class就是一个二级子类（有两个“_”）

## 课程讲义
课程的讲义部分在：  
[https://github.com/monkee/lessons/tree/master/如何写好一个PHP的类](https://github.com/monkee/lessons/tree/master/如何写好一个PHP的类)  
给位可自行前往~