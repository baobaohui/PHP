## day9 Notes

### 面向过程编程
    
    面向过程编程思想，以过程为中心，逐步解决问题
    
### 面向对象编程

    面向对象编程思想，以事物为中心，以功能划分问题
    

类和对象的关系
    
    1，类的概念
        类是具有相同属性(特征)和行为的一组对象的集合，它为属于该类的全部对象提供了
        统一的抽象描述，其内部包括属性和行为两个部分
        
    2，对象的概念
        对象时构成系统的基本单位，任何一个对象都应该具有以下两个要素：
            属性(attribute)+行为(behavior)

类的定义
    
    1，类的定义语法格式
        类和函数一样，都可以看成代码的封装方式
        

类的成员属性定义  
    
    1，成员属性介绍
        类的成员属性：某个类具有的公共的特征，特性
        类中定义的变量：类的成员属性，有权限修饰符进行权限限制
        
    2，权限修饰符
        public (公共权限)
        private(私有权限):只能在本类中访问
        protected(受保护的权限):只能在本类和子类中访问


类的成员方法定义
        
    1，成员方法介绍
        类的方法：某个类的公共的行为或动作，默认权限public
        
创建类的实例
    
    1，实例化对象的含义
        对象实例化：从一个类上来生产对象，就是累的实例化
    
    2，语法格式
        new 关键字
        JS创建对象的方法：var today = new Date();
        PHP创建对象的方法：$obj = new Student();

对象属性操作
    
    1，如何访问对象的属性和方法
        js：访问对象的属性和方法是通过"."来访问的。window.alert()
        PHP:访问对象的属性和方法是通过"->"来访问的。$obj->name
        
        属性前不加$符号，不然会变成变量
        
    2,对象属性的操作
        更改  $obj->age = 20;
        删除 unset($obj->age);

对象方法操作
    
    对象方法的操作：方法定义，方法调用，传递参数，方法返回值
    
        public function test($name,$age)
        {
            return "{$name}的年龄是{$age}";
            echo "{$name}---{$age}<br>";
        }
        var_dump($obj2->test('123',123));
        
        若没有return var_dump 为null,但是 echo 语句会输出
        若有return    echo语句不会输出
    
伪变量$this的使用
    
    1，伪变量$this的含义
        js中：使用this关键字来代替当前对象，例如：this.src="./a.jpg"
        php中，使用$this变量来代替当前对象，例如：$this->name="张三";
        $this代表当前对象，是到当前对象的一个引用
        $this更像是一个对象指针，指向当前对象
        $this只能在对象方法中定义，去调用对象的成员属性或成员方法
        只有创建对象后，$this变量才存在，类不会自动运行

类常量的定义
    
    1，类常量介绍
        可以把在类中始终不变的值定义为常量，例如圆周率，班级名称等
        常量的值必须是一个定值，不能修改，也不能删除
        类常量就是类的常量，是与类相关的，与对象无关
        类常量在内存中只有一份，不管创建多少个对象
        类常量可以极大节省服务器内存，可以被所有对象去共享
        
    2，类常量定义和调用格式
        类常量没有权限，只有属性和方法才会有权限
        使用const 来定义类的常量(局部常量),只能在局部作用域下使用，
        define()定义常量是全局常量，任何地方都可调用
        
        
构造方法
    
    1，什么是构造方法
        当使用new关键字创建对象时，第1个自动调用的方法，就是构造方法
        构造方法的名称是固定的，void_construct([mixed $args..])
        构造方法可以的带参数，也可以不带参数，构造方法不是必须的
        构造方法的作用，对象初始化
        构造方法一定是成员方法，构造方法的权限可以自己制定
        构造方法一般不需要主动调用，都是自动调用

析构方法
    
    1，什么是析构方法
        对象销毁前自动调用的方法，就是析构方法
        析构方法的名称也是固定的，void __destruct(void)
        析构方法不带任何参数
        析构方法一定是成员方法
        析构方法的作用：垃圾回收工作，清理内存，断开数据库连接，销毁画布资源
    
    2，对象何时销毁
        网页执行完毕时，对象会自动销毁
        使用unset()函数手动销毁对象
    
    3，实例：统计在线人数

静态属性和静态方法
    
    1，概述
        静态属性：static 关键字修饰的属性；类的属性，与类相关，与对象无关
        静态方法：static 关键字修饰的方法；类的方法，与类相关，与对象无关
        类的东西(类常量，静态属性，静态方法),通过类名::调用
        静态属性或静态方法，在内存中只有一份，被所有对象去共享
        静态属性或静态方法的好处：节省内存
        静态属性和类常量的区别：常量在一次HTTP请求过程值永远不变，但是静态属性可以改变
        静态属性和静态方法：都可以加权限控制符，而类常量没有权限
        静态属性和静态方法不需要实例化对象，就能使用
    
    2，定义格式
    
    3，self关键字使用
        $this 是指向当前对象的指针，而self是指向当前类的指针
        $this 关键字用来调用对象的属性和方法
        self 用来调用类常量，静态属性，静态方法
        $this 关键字只能在成员方法中使用，不能在静态方法中使用
        self 关键字可以在成员方法和静态方法中使用
    
综合案例：设计一个学生类
    
    要求：定义一个学生类，并由此类实例化两个 学生对象 。该类包括姓名，性别年龄
        等基本信息，至少包括一个静态属性，表示总学生数和一个常量，以及包括构造方法
        和析构方法该对象还可以调用一个方法来实现自我介绍(显示其中的所有属性)，
        构造方法可以自动初始化一个学生的基本信息，并显示“xx 加入班级，当前有xx个学生”
        
OOP中内存的分配情况
    
    1，为什么使用var_dump打印对象时，只能看到成员属性呢
        object(Student)#1 (3) {
          ["name":"Student":private]=&gt;
          string(6) "张七"
          ["sex":"Student":private]=&gt;
          string(3) "男"
          ["age":"Student":private]=&gt;
          int(18)
        }
        普通变量(整型，浮点型，bool值)放在栈内存
        对象和数组，成员属性放在堆内存
        函数和代码放在代码区
        静态的和常量的放在静态区
        
        var_dump打印的是堆内存
        
    2，OOP中内存的分配情况
        
        面向对象各部分内存分布         静态空间(区)
                                   const count = 1
                                   
        栈内存        堆内存空间       代码空间
        
        $obj1   ->  new Student()       public function show()
                    name属性，sex属性     {
                                            echo $this->name
                                       }
值传递和引用传递
                                   
    3,什么是值传递
        将一个变量的数据或值，复制一份，传递给另一个变量
        这两个变量之间没有任何关系，修改其中一个变量的值，另一个变量的值不受影响
        默认情况下，PHP值传递的数据类型有：字符串型，整型，浮点数，布尔型，数组型,NULL
        
        $a = 100;
        $b = $a;
        $a = 200;
        echo $a,$b;//200,100
        
        数组也是值传递
        
        值传递在内存中如何表现
            都具有独立空间
        
    4,什么是引用传递
        将一个变量的数据地址，复制一份，传递给另一个变量
        这两个变量指向同一个地址，修改其中一个变量的值，另一个也会受影响
        默认情况下：PHP引用传递的数据类型有：对象和资源
        
        class Student{
            public $age = 20;
        }     
        $s1 = new Student();
        $s2 = $s1;
        $s1->age = 10;
        print_r($s1)    //[age] => 10
        print_r($s2)    //[age] => 10
        
        对于海量数据，使用 引用传地址，要比传值 快的多
    
    5，其他类型变量使用引用传递
        如果其他类型变量使用引用传递，只需要在引用的变量前加 & 符号即可
        
        $arr1 = ['10010','张三',20];
        $school1 = "清华大学";
        
        function addElement(&$arr2,$school2)
        {
            $arr2[] = $school2;
            print_r($arr2)
        }
        addElement($arr1,$school1);
        print_r($arr1);//两个数组的内容相同

类的封装性
    
    1，什么是类的封装性
        类的三大特性：封装性，继承性，多态性
        封装性：将敏感的数据保护起来，不被外界访问，该可以理解为，将一个功能的方方面面
                封装成一个整体，即类：
                
        类的封装性，是通过访问权限修饰符来实现的
        提示：在项目中，属性基本都是私有的，通过公有的方法，对私有的属性
            进行赋值和取值
    
    2，访问权限修饰符介绍
        public (公共权限)
        private(私有权限):只能在本类中访问
        protected(受保护的权限):只能在本类和子类中访问

类的继承性
    
    1，什么是类的继承性？
        CSS样式继承，父标签定义的样式，子标签可以直接使用，减少代码量
        如果一个B类拥有了A类的所有特征信息，我们就说B类继承A类
        
        为什么使用类的继承：实现功能的升级和扩展
            功能升级：愿来有的功能，在子类中进行完善
            功能扩展：愿来没有的功能，在子类增加新功能
        
    2，继承的语法格式
        class SubClass extends ParentClass
        {
            //子类的内容定义
        }
        SubClass:要创建的子类名称
        extends:继承
        ParentClass:父类
    
    3,单继承和多继承
        单继承：只能从一个父类来继承功能，如java,php,c#
        多继承：同时从多个父类来继承功能，如 c++
    
    4,单继承的简单示例
    
    5,parent关键字
        self代表当前类，parent代表父类
        self和parent可以存在于所有方法(成员方法和静态方法)中
        self用来调用本类的内容，包括：类常量，静态属性、方法，成员方法
        parent用来调用父类的内容，包括：类常量，静态属性，成员方法
        self和parent都用范围解析符“::”来调用其他内容
        语法：parent::类常量|静态属性|静态方法|成员方法
        
        父类中有常量TITLE
        子类中有常量TITLE
        
        在子类中调用父类常量：parent::TITLE
        
类的多态
    
    1,什么是类的多态
        类的多态，就是类的多种形态
        类的多态主要指方法重载或方法重写
            方法重载：在同一个类中定义两个同名方法，参数或类型不同，PHP不支持
            方法重写：在子类中定义一个与父类同名的方法，就是重写
        为什么要重写方法:进行功能升级
    
    2，方法重写的要求
        子类中重写的方法，要与父类中的方法同名
        子类中重写的方法形参个数要与父类中同名方法形参个数一致
        子类中重写的方法类型，要与父类中同名方法类型一致
        子类中重写的方法的访问权限，不能低于父类中同名方法的访问权限
            父类方法权限为public,子类只能是public
                    protected       protected/public
                    private         子类无法继承，也无法重写
        
        注意：对于重写构造方法，就比较特殊，就没有形参个数的要求

    3，实例：商品子类重写商品基础类中的方法

最终类和最终方法
    
    1，概述
        Final关键字修饰的类，就是最终类
        Final关键字修饰的方法，就是最终方法
        最终类：该类只能实例化，不能被继承。该类已经十分完善了，不需要升级和扩展
        最终方法：该方法可以被继承，但不能重写，该方法不需重写
        
        final class Student{}
        class SmartStudent extends Student{}    //报错，无法继承
        
    2，实例：最终类和最终方法演示

抽象类和抽象方法
    
    1，概述
        abstract关键字修饰的类，就是抽象类
        abstract关键字修饰的方法，就是抽象方法
        抽象类：该类不能直接实例化，必须先继承后在实例化，常用在基础类
        抽象方法：方法必须先继承后重写
        抽象方法就是方法的命名规范，命名规则，也可以理解为一种监督机制
        所有的抽象方法都必须重写
        抽象方法没有方法体，必须在子类重写后，再定义方法体
        如果一类中有抽象方法，则该类必须是抽象类
        抽象方法权限不能是private，因为要先继承在重写
        在PHP7中，抽象方法可以是成员方法，也可以使静态方法
        抽象类中，可以包含其他成员，常量，成员属性成员方法，静态属性、方法
    
    2，实例：抽象类和抽象方法实例演示
    
接口技术
    
    1,接口的基本概念
        PHP类是单继承，也就是不支持多继承
        当一个类需要多个类的功能时，单继承就无能为力了，为此PHP引入了类的接口技术
        多人合作开发项目时，需要规范各个功能的名称，就需要用到接口技术了
        接口就是一种标准，一种规范。类的功能实现，按照标准接口实现即可
    
    2，接口定义和实现要点
        interface 关键字定义接口
        implements 关键字用来实现接口
        接口中方法权限必须是public
        接口种方法默认是抽象的，所以不需要在方法名前面加abstract
        接口中方法可以是成员方法，也可以是静态方法
        接口中也可以定义常量，但常量不能重写
        类可以实现(implements)多个接口(相当于多个功能于一身)
        接口也可以继承接口
    
    3，接口定义和实现演示
    
    4，实例：创建手机类并实现小灵通接口，MP3接口，MP4接口

类的自动加载
    
    PHP7以下版本,使用 __autoload()实现类的自动加载
    PHP7以上版本，使用 spl_autoload_register()实现类的自动加载
    
    1，为什么需要类的自动加载
        很多开发者写面向对象的应用程序时，对每个类的定义，都建立一个独立的PHP类文件
        方便类文件的统一管理，但是在脚本开头引入时，可能因为文件太多而写很长的
        包含文件列表，占用很多内存且不利于后期维护
        
        解决方案：俺需要加载类文件，而不是把素有类全部包含进来
    
    2，类文件的命名规范
        一个类要单独定义成一个独立的类文件
        类文件扩展名要以 .class.php 结尾，是一种约定
        类文件主名，要与类名一致
        
        例如：Db.class.php,UserController.class.php
    
    3,类的自定义加载函数：spl_autoload_register()
        1),spl_autoload_reigster()何时调用？
            当试图使用未定义的类时，该函数自动调用，使用一个类有以下几种情况
                使用new关键字创建不存在的类时    $obj=new Student()
                当使用静态化方式访问一个不存在的类：Student::show()
                当继承一个不存杂的类时：class stu extends Parent({}
                当实现一个不存在的接口时:class Stu implements inter;
                
        2),语法格式
            描述：将函数注册到SPL(标准PHP库)的__autoload函数队列中，如果该队列
                中的函数未激活，则激活它们，他实际上创建了autoload函数的队列
                按定义时的顺序逐个执行
            语法：bool spl_autoload_register([callback $autoload_function])
            参数：
                $autoload_function,欲注册的自动连载函数，可以是匿名函数，也可以是字符串的函数名称
                $autoload_function，有一个传递过来的类名形参，用于在函数中构建类文件路径
        
        3)使用普通函数作为参数
        
        4)使用匿名函数作为参数