<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-01-01 13:42:39 --- ERROR: Database_Exception [ 1049 ]: Unknown database 'v5' ~ MODPATH\database\classes\kohana\database\mysql.php [ 108 ]
2017-01-01 13:42:39 --- STRACE: Database_Exception [ 1049 ]: Unknown database 'v5' ~ MODPATH\database\classes\kohana\database\mysql.php [ 108 ]
--
#0 D:\wwwroot\dedeceshi\core\modules\database\classes\kohana\database\mysql.php(75): Kohana_Database_MySQL->_select_db('V5')
#1 D:\wwwroot\dedeceshi\core\modules\database\classes\kohana\database\mysql.php(171): Kohana_Database_MySQL->connect()
#2 D:\wwwroot\dedeceshi\core\modules\database\classes\kohana\database\mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 D:\wwwroot\dedeceshi\core\modules\orm\classes\kohana\orm.php(1800): Kohana_Database_MySQL->list_columns('destinations')
#4 D:\wwwroot\dedeceshi\core\modules\orm\classes\kohana\orm.php(455): Kohana_ORM->list_columns()
#5 D:\wwwroot\dedeceshi\core\modules\orm\classes\kohana\orm.php(400): Kohana_ORM->reload_columns()
#6 D:\wwwroot\dedeceshi\core\modules\orm\classes\kohana\orm.php(265): Kohana_ORM->_initialize()
#7 D:\wwwroot\dedeceshi\core\modules\orm\classes\kohana\orm.php(46): Kohana_ORM->__construct(NULL)
#8 D:\wwwroot\dedeceshi\v5\classes\model\destinations.php(21): Kohana_ORM::factory('destinations')
#9 D:\wwwroot\dedeceshi\v5\classes\common.php(640): Model_Destinations::gen_web_list()
#10 D:\wwwroot\dedeceshi\v5\bootstrap.php(166): Common::cache_web_list()
#11 D:\wwwroot\dedeceshi\index.php(128): require('D:\\wwwroot\\dede...')
#12 {main}
2017-01-01 13:54:42 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1148 ]
2017-01-01 13:54:42 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1148 ]
--
#0 D:\wwwroot\dedeceshi\index.php(143): Kohana_Request->execute()
#1 {main}
2017-01-01 13:54:43 --- ERROR: HTTP_Exception_404 [ 404 ]: The requested URL user/login was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
2017-01-01 13:54:43 --- STRACE: HTTP_Exception_404 [ 404 ]: The requested URL user/login was not found on this server. ~ SYSPATH\classes\kohana\request\client\internal.php [ 87 ]
--
#0 D:\wwwroot\dedeceshi\core\system\classes\kohana\request\client.php(64): Kohana_Request_Client_Internal->execute_request(Object(Request))
#1 D:\wwwroot\dedeceshi\core\system\classes\kohana\request.php(1160): Kohana_Request_Client->execute(Object(Request))
#2 D:\wwwroot\dedeceshi\index.php(143): Kohana_Request->execute()
#3 {main}
2017-01-01 14:41:40 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1148 ]
2017-01-01 14:41:40 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1148 ]
--
#0 D:\wwwroot\dedeceshi\index.php(143): Kohana_Request->execute()
#1 {main}
2017-01-01 14:52:10 --- ERROR: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1148 ]
2017-01-01 14:52:10 --- STRACE: HTTP_Exception_404 [ 404 ]: Unable to find a route to match the URI: favicon.ico ~ SYSPATH\classes\kohana\request.php [ 1148 ]
--
#0 D:\wwwroot\dedeceshi\index.php(143): Kohana_Request->execute()
#1 {main}