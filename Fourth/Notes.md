# day4 Notes

## msyql

实体与实体的关系
    
    实体(Enity)
        一个表中的一行数据实际就是指对某物的描述性数据，所以一行数据
        就是一个实体，有时候实体也指整个表
    实体间关系(relationship)
        是指不同实体数据之间的关系，很多时候就是指表和表之间的关系
        一对一关系，一对多关系，多对多关系
        
高级查询
    
    select 子句
        [from 子句]
        [where 子句]      //过滤条件
        [group by 子句]   //分组
        [having 子句]     //对中间结果进一步筛选
        [order by 子句]   //排序
        [limit 子句]      //限制结果数量
        ;

    
    select id as username from user;    //别名
    
    select distinct user_name,user_pass from user;//消除重复
    
    
    where 子句
        select id from user where id>3;
    
    mysql 运算符
        算术运算符
        比较运算符
        逻辑运算符
            && 或 and
            || 或 or
            !  或 not
        其他特殊运算符
            like 模糊查询
                xxx字段 like ‘%关键字%’
                
                % 表示任意个数的任意字符
                ‘_’(下杠) 表示‘任意一个字符’
                
                select *from product where pro_name like '%电视机%'
                select *from user where name like '罗%'; //罗。。。。。
                select *from user where name like '罗_'; //罗+任意一个字符

            between 范围限定运算符
                用于判断某个字段的值是否在给定的两个数据范围之间
                    xxx字段 between 值1 and 值2
                含义：相当于 xxx字段>=值1 and xxx字段<= 值2
                select *from product where price between 5000 and 10000;

                
                
            in 运算符
                用于判断某个字段的值是否在给出的若干个‘可选值’范围
                    xxx字段 in （值1，值2.。。）
                含义：该字段的值相当于所列出的任意一个值，就算满足条件
                    籍贯 in (‘北京’，‘山东‘);//某人籍贯满足上述一个条件就行
                select *from product where chandi in('北京’，’上海‘);
                select *from product where chandi='北京‘ or chandi=’上海‘;
                
                
                
            is 运算符
                用于判断一个字段中的是“是否存在”，只有两个写法：
                    where content is null;  //不能写成 content=null
                    where content is not null;  //不能写成 content！=null
                select *from shunxing where f4 is null;
    
    group by 语句
        分组本身的字段信息
            select *from product group by pingpai;//对其按品牌进行分组
        
        一组的综合统计信息，主要包括：
            计数值: count(字段)，表示求出一组中原始数据的行数
            最大值: max(字段)，表示求出一组中该字段的最大值
            最小值: min(字段)，                   小
            平均值: avg(字段)，                   平均值
            总和值: sum(字段)，                   累加和
            
            这5个函数被称为聚合函数
            
            查询出各个品牌的产品平均价
            select pingpai,avg(price) from product group by pinpai;
            
            查询出各个产地的产品数量，平均价，最高价，最低价
            select chandi,count(*) as 数量,avg(price) as 平均价,max(price)
                as 最高价,min(price),sum(price) as 价格之和 from ’product' group by chandi;
            
            查询出产品表中联想品牌的产品总数
            select count(*) as 总数 from product where pinpai='联想';
            
            多条件分组
            将product表中的所有商品以品牌和产地进行分组，并求出每一组的数量
            select pinpai,chandi,count(*) as 数量 from product group by pinpai,chandi;
            
    having 子句
        having 筛选条件
        是用于对group by 分组的结果进行的条件筛选
        
        查询出品牌平均价超过5000的所有品牌的平均价，最高价，以及产品的数量
        select pinpai,avg(price) as 平均价,max(price) as 最高价,count(*) as 数量
            from ’product' group by pinpai having avg(price)>5000;
    
    order by 子句
        对钱所取得的数据按给定的字段进行排序
        排序方式有:正序 asc,倒序 desc，默认是 asc
        
        对所有产品按价格从高到低进行排序
        select *from product order by price desc;
        
        对所有品牌的平均价从高到低的顺序进行排序，并列出品牌名和平均价
        select pinpai,avg(price) as 平均价 from product group by pinpai order by 平均价 desc;
        
    limit 子句
        
        limit 起始行号，行数
        
        表示对前面所取得的数据进行数量上的筛选，取得从某行开始的多少行
        
        取出商品表中价格最高的3个商品，并按倒序排列出来
        select *from product order by price desc limit 0,3;

高级插入
    
    同时插入多行记录
        insert into 表名(字段1，字段2.。) values (值1，值2.。),(值1，值2.。).;
    
    插入查询的结果数据
        insert into 表名(字段1，字段2.。) select (xx1,xx2...).. ;
        
    set语法插入数据
        insert into user set username='bao',pass='123';
        
    蠕虫复制
        针对一个表的数据，进行快速的赋值并插入到所需要的表中
        以期在短时间内具备大量数据，以用于测试或其他特殊场合，比如：
            1，将一个表的大量数据，复制到另一个表中
            2，将一个表的数据复制到本身表中以产生大量数据
            
            insert into user3a (user_name,user_pass) select user_name,
                user_pass,edu from user3;
    
    主键冲突解决办法
        1，忽略    --终止插入，数据不改变
            insert ignore into 表名（字段..） values(值..);
        2，替换    --删除原纪录，插入新纪录
            replace into into 表名(字段。。) values (值..)
        3，更新    --设置为去更新原有数据(而并不插入)
            insert into 表名(字段) values (值..) on duplicate key update xx字段=新的值
            
高级删除

    按指定顺序删除指定数量的数据
        delete form 表名 where .. [order by 字段名..] [limit 数量n];
        
    trancate 清空
        trancate 表名;
        表示清空指定表中的所有数据并将表恢复到初始化状态；

高级更新
    
    update set 字段名1=字段值1. where .. [order by 字段名..] [limit 数量n];

    update user set age=22 order by id desc limit 2;

联合(union)查询
    
    联合查询概念
        指将2个或2个以上的字段数量相同的查询结果，“纵向堆叠”后合并成一个结果;
    
    select id,f1,f2 from join1
    union   [all 或 distinct]
    select id2,c1,c2 from join2
    
    [order by 字段 [asc 或 desc]]
    [limit 起始行号，数量]

连接(join)查询
    
    将两个查询的结果以横向对接的方式合并起来的结果
    select .. from 表1 [连接方式] join 表2 [on 连接条件] where ..;
    
    假设 表1 有 n1 行, m1 列
        表2 有 n2 行, m2 列
        
        则表1 和表2 ‘连接’ 之后，就会有
            n1 * n2 行；
            m1+m2 列；
            
            select *from join1,join join2;
            
    交叉连接(cross join)
        from 表1 [cross] join 表2
        
        交叉连接 称为 笛卡尔积
        执行所有连接
        
    
    内连接(inner join)
        from 表1 [inner] join 表2 on 连接条件
        
        在交叉连接的基础上，通过on条件而筛选出来的部分数据
        
        找出所有价格大于5000的家用电器的商品的完整信息(含所属类别)
        select *from product as p inner join product_type as t
            on p.protype_id = t.protyp_id
            where price>5000 and protype_name='家用电器';
        
    外连接
        
        左外连接
            from 表1 left [outer] join 表2 on 连接条件
            保证左边表的数据都能取出的一种连接
            在内连接的基础上加上 左边表中所有不能满足条件的数据
            
            select *from join1 left join join2 on join.f1 = join.c1
            
            
        右外连接
            from 表1 right [outer] join 表2 on 连接条件
            和 左外连接正好相反
            
            找出所有类别及各类别中的商品(需列出类别名称，商品名称，价格，品牌和产地)
            select protype_name,pro_name,price,pinpai,chandi
                from product_type as t left join product as p
                    on p.protype_id = t.protype_id;
    
    自连接
        自己跟自己连接
        
        from 表名 as  a [连接形式] join 表名 as b on a.xx 字段1 = b.xx字段名
        select a.area_name,b.area_name from area as a join area as b on a.parent_id=b.id;
        
        找出所有省份及其下属城市：
        select province.area_name,city.area_name
            from area as province join area as city on province.id = city.parent_id;
    
    子查询
        
        一个正常查询语句的某个部分(比如select部分，from部分，where部分)  
            又出现了一种查询形式
            
            select *from xx表名 where price>=(一个子查询语句)
            
            其实就是 select语句的嵌套查询
            select *from product where>(select avg(price) from product);
            
        标量子查询
            标量子查询的结果，可以直接当一个值来使用
            
            找出产品表中价格大于北京产地的产品平均价的所有产品
            select *from product where price>(
                select avg(price) from product where chandi='北京'
            )
            
        列子查询
            列子查询查出的结果为一列数据，类似
                select pinpai from product where chandi='背景'
                结果为一列数据
            
            列子查询通常用在where子句的in运算符中，代替in运算符中的字面值列表数据
        
            
        行子查询
            行子查询出的结果通常是一行
            select pinpai from product where price=11499;
            
            行子查询的结果通常是跟 行构造符 一起，在where子句中作为
            条件数据，类似
                where (字段1，字段2) = (行子查询)
            或
                where row(字段1，字段2) = (行子查询);
            
            找出跟单价最高的商品同品牌同产地的所有商品
            select *from product where row(pinpai,chandi) =(
                select pinpai,chandi from product where price =(
                    select max(price) from product;
                )
            )
            
        表子查询
            当一个子查询查出的结果是 "多行多列" 的时候，就是表子查询
            查询的结果相当于一个表，可以直接当做一个表来使用
            
        
        有关子查询的语句
             in 关键字
                在子查询中主要用在列子查询中
                
                找出联想品牌的商品都有哪些类别
                select *from product_type where protype_id in(
                    select distinct protype_id from product where pinpai='联想'
                )
                
                            
             any 关键字
                any 关键字用在比较操作符的后面，表示查询结果的多个数据中的任一个满足
                该比较符就算满足
                
                找出在北京生产的但价格比在深圳生产的任一商品贵的商品
                select* from product where chandi='北京' and price>any(
                    select price from product where chandi='深圳';
                )
                           
             all 关键字
                select* from product where chandi='北京' and price>all(
                    select price from product where chandi='深圳';
                )
    
             exists子查询
                where exists(任何子查询)
    
                该子查询如果 有数据，则该exists() 的结果为true，即相当于 while true
                
数据管理
    
    数据备份
        备份整个数据库
        mysqldump.exe -h 主机地址 -u 用户名 -p 密码 数据库名 > 备份文件名(含路径)
        
        该语句是mysql/bin 中的一个命令，不是sql语句，所以不是登录后使用
        
        备份单个表
        mysqldump.exe -h 主机地址 -u 用户名 -p 密码 数据库名 表名 > 备份文件名(含路径)
                               
        
    数据还原
        mysql.exe -h 主机地址 -u 用户名 -p 密码 目标数据库名 < 想要还原的备份文件名(含路径)
    
        
用户管理
    
    用户管理
        用户账号的管理：创建，删除，改密
        用户权限的管理：授予权限，取消权限
    
    查看用户
        use mysql;
        select *from user;
               
    创建用户
        create user '用户名' [@'允许登录的地址'] identified by ‘密码’；
        
        ‘允许登录的地址’就是允许登录的客户端的ip地址
            1，‘localhost’ 表示只能本地登录
            2，'%'表示任何位置都可以登录
            3，该部分可以省略，如果省略，默认就是‘%’；
            4，后续涉及到用户的操作，都是这个格式
            
        create user 'user1' identified by '123';
        create user 'user2'@'localhost' identified;
        create user 'user3'@'192.168.1.103' identified;
        
    删除用户
        drop user 用户[@'允许登录的地址'];
    
    修改/设置用户
        set password for 用户[@'允许登录的地址'] = password('密码')
    
    授予用户权限
        grant 操作1，操作2.。。 on *.* 或 数据库名 或数据库名 表名 to 用户[@'允许登录的地址']
        
    取消用户授权
        revoke 操作1，操作2.。。 on *.* 或 数据库名 或数据库名 表名 to 用户[@'允许登录的地址']
