为苹果CMS v10添加腾讯云对象存储(COS)功能
- 主要任务：
  一. 创建腾讯云COS扩展类
  二. 创建腾讯云COS配置视图文件
  三. 集成到现有的上传管理系统中
- 关键决策：
  一. 参考现有的七牛云和S3存储实现方式
  二. 添加CDN加速域名配置选项
  三. 兼容新旧后台模板
- 使用的技术栈：
  1. PHP
  2. 腾讯云COS SDK
  3. ThinkPHP模板
- 修改了哪些文件：
  一. 新增 application/common/extend/upload/Cos.php
  二. 新增 application/admin/view/extend/upload/cos.html
  三. 新增 application/admin/view_new/extend/upload/cos.html
