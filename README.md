为苹果CMS v10添加腾讯云对象存储(COS)功能
- 主要任务：
  1. 创建腾讯云COS扩展类
  2. 创建腾讯云COS配置视图文件
  3. 集成到现有的上传管理系统中
- 关键决策：
  1. 参考现有的七牛云和S3存储实现方式
  2. 添加CDN加速域名配置选项
  3. 兼容新旧后台模板
- 使用的技术栈：
  1. PHP
  2. 腾讯云COS SDK
  3. ThinkPHP模板
 
- 使用方法：
- 将项目文件上传到 苹果cms v10 目录
  1. 新增 application/common/extend/upload/Cos.php
  2. 新增 application/admin/view/extend/upload/cos.html
  3. 新增 application/admin/view_new/extend/upload/cos.html
  4. 下载腾讯云腾讯云SDK，解压后放入:extend/cos/目录
  5. 腾讯云SDK下载地址：https://github.com/tencentyun/cos-php-sdk-v5/releases
