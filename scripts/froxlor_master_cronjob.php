<?php

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * For the full copyright and license information, please view the COPYING
 * file that was distributed with this source code. You can also view the
 * COPYING file online at http://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright  (c) the authors
 * @author     Froxlor team <team@froxlor.org> (2010-)
 * @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt
 * @package    Cron
 * @version    $Id: $
 */

include_once(dirname(__FILE__) . '/../lib/cron_init.php');

includeCronjobs($debugHandler);
fwrite($debugHandler, 'Cronfiles have been included' . "\n");

/*
 * we have to check the system's last guid with every cron run
 * in case the admin installed new software which added a new user
 * so users in the database don't conflict with system users
 */
$cronlog->logAction(CRON_ACTION, LOG_NOTICE, 'Checking system\'s last guid');
checkLastGuid($settings['system']['lastguid']);

/*
 * shutdown cron
 */
include_once($pathtophpfiles . '/lib/cron_shutdown.php');

?>