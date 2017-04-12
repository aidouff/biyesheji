<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2017-01-04 10:14:40 --- ERROR: Database_Exception [ 1049 ]: Unknown database 'stourwebcms' ~ MODPATH\database\classes\kohana\database\mysql.php [ 108 ]
2017-01-04 10:14:40 --- STRACE: Database_Exception [ 1049 ]: Unknown database 'stourwebcms' ~ MODPATH\database\classes\kohana\database\mysql.php [ 108 ]
--
#0 D:\phpStudy\WWW\core\modules\database\classes\kohana\database\mysql.php(75): Kohana_Database_MySQL->_select_db('stourwebcms')
#1 D:\phpStudy\WWW\core\modules\database\classes\kohana\database\mysql.php(171): Kohana_Database_MySQL->connect()
#2 D:\phpStudy\WWW\core\modules\database\classes\kohana\database\mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 D:\phpStudy\WWW\core\modules\orm\classes\kohana\orm.php(1800): Kohana_Database_MySQL->list_columns('destinations')
#4 D:\phpStudy\WWW\core\modules\orm\classes\kohana\orm.php(455): Kohana_ORM->list_columns()
#5 D:\phpStudy\WWW\core\modules\orm\classes\kohana\orm.php(400): Kohana_ORM->reload_columns()
#6 D:\phpStudy\WWW\core\modules\orm\classes\kohana\orm.php(265): Kohana_ORM->_initialize()
#7 D:\phpStudy\WWW\core\modules\orm\classes\kohana\orm.php(46): Kohana_ORM->__construct(NULL)
#8 D:\phpStudy\WWW\v5\classes\model\destinations.php(21): Kohana_ORM::factory('destinations')
#9 D:\phpStudy\WWW\v5\classes\common.php(640): Model_Destinations::gen_web_list()
#10 D:\phpStudy\WWW\v5\bootstrap.php(166): Common::cache_web_list()
#11 D:\phpStudy\WWW\index.php(128): require('D:\phpStudy\WWW...')
#12 {main}
2017-01-04 10:14:48 --- ERROR: Database_Exception [ 1049 ]: Unknown database 'stourwebcms' ~ MODPATH\database\classes\kohana\database\mysql.php [ 108 ]
2017-01-04 10:14:48 --- STRACE: Database_Exception [ 1049 ]: Unknown database 'stourwebcms' ~ MODPATH\database\classes\kohana\database\mysql.php [ 108 ]
--
#0 D:\phpStudy\WWW\core\modules\database\classes\kohana\database\mysql.php(75): Kohana_Database_MySQL->_select_db('stourwebcms')
#1 D:\phpStudy\WWW\core\modules\database\classes\kohana\database\mysql.php(171): Kohana_Database_MySQL->connect()
#2 D:\phpStudy\WWW\core\modules\database\classes\kohana\database\mysql.php(359): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#3 D:\phpStudy\WWW\core\modules\orm\classes\kohana\orm.php(1800): Kohana_Database_MySQL->list_columns('destinations')
#4 D:\phpStudy\WWW\core\modules\orm\classes\kohana\orm.php(455): Kohana_ORM->list_columns()
#5 D:\phpStudy\WWW\core\modules\orm\classes\kohana\orm.php(400): Kohana_ORM->reload_columns()
#6 D:\phpStudy\WWW\core\modules\orm\classes\kohana\orm.php(265): Kohana_ORM->_initialize()
#7 D:\phpStudy\WWW\core\modules\orm\classes\kohana\orm.php(46): Kohana_ORM->__construct(NULL)
#8 D:\phpStudy\WWW\v5\classes\model\destinations.php(21): Kohana_ORM::factory('destinations')
#9 D:\phpStudy\WWW\v5\classes\common.php(640): Model_Destinations::gen_web_list()
#10 D:\phpStudy\WWW\v5\bootstrap.php(166): Common::cache_web_list()
#11 D:\phpStudy\WWW\index.php(128): require('D:\phpStudy\WWW...')
#12 {main}