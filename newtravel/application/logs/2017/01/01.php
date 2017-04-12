<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-01-01 15:39:25 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL undefined was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2017-01-01 15:39:25 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL undefined was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\wwwroot\dedeceshi\core\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\wwwroot\dedeceshi\core\system\classes\kohana\request.php(1160): Kohana_Request_Client->execute(Object(Request))
#2 D:\wwwroot\dedeceshi\newtravel\index.php(121): Kohana_Request->execute()
#3 {main}