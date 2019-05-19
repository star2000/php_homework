# php作业——注册系统

## 配置环境
```bash
# 设置默认数据库默认字符集
echo -e '[mysqld]\ncharacter_set_server=utf8' >> /etc/my.cnf
# 安装php和mysql
sudo apt install -y mariadb-server php php-mysql php-mbstring
# 安装node
wget -qO- https://raw.githubusercontent.com/nvm-sh/nvm/master/install.sh | bash
nvm install node
# 安装前端依赖
cd 前端;npm i;cd ..
# 安装后端依赖
cd 后端;composer i;cd ..
# 创建数据库和该数据库的管理员
sudo mysql -e '\. 数据库.sql'
sudo mysql -e "create user 'xing'@'localhost' identified by 'xing'"
sudo mysql -e "grant all on php_homework.* to 'xing'@'localhost'"
```
## 运行
```bash
cd 后端;php ./think run &;cd ..
cd 前端;npm run dev &;cd ..
```
## 查看
访问 http://127.0.0.1:3000
