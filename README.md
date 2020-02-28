# s.hoto.dev
URL SHORTER
https://s.hoto.dev

### At First
You should edit /config/user_conf.php

~~~
<?php
//PHP Config File
return array(
    'config_version' => '1.0',
    'db' => array(
            'host' => 'localhost',
            'port' => '3306',
            'user' => '{USER_ID}',
            'pass' => '{PASSWORD}',
            'database' => 'short_url',
    ),
    'error_display' => 1,
    'ssl_only' => 1,
    'base_url' => '{YOUR_BASE_URL}',
);

// error_display ? {display_error} : {hide_error}
// ssl_only ? {HSTS} : {ALLOW_HTTP}
// base_url : https://{ THIS IS BASE_URL }/index.php
~~~

### Second
In nginx, You should make conf file to make your url short.

~~~
# Nginx Rewrite
rewrite ^/r/(.*)$ /rd.php?d=$1;
rewrite ^/config/(.*)$ /index.php;
~~~

And restart your nginx

~~~
systemctl restart nginx
~~~
