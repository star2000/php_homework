# php作业——注册登录系统

## 配置环境
~~~
# 设置默认数据库默认字符集
echo '[mysqld]\ncharacter_set_server=utf8'>/etc/my.cnf
# 安装php和mysql
sudo apt install php php-mysql php-mbstring mysql-server -y
# 安装node
wget https://nodejs.org/dist/v11.5.0/node-v11.5.0-linux-x64.tar.xz
tar xf node-v11.5.0-linux-x64.tar.xz
cp -r node-v11.5.0-linux-x64/* /usr/local/
rm -rf node-v11.5.0-linux-x64*
# 创建数据库和该数据库的管理员
sudo mysql
mysql> \. 数据库.sql
mysql> create user 'xing'@'localhost' identified by 'xing';
mysql> grant all on php_homework.* to 'xing'@'localhost';
~~~
## 运行
~~~
cd 后端
php think run
cd ../前端
npm run dev
~~~
## 查看
访问 http://127.0.0.1:3000