#!/bin/sh

COMMANDLINE_PARAMETERS="${2}"

case "$1" in
	run)
		php app/console server:run
	;;
	install)		
		php -r "readfile('https://getcomposer.org/installer');" | php
		chmod u+x composer.phar
		php composer.phar install	
                mysql --user=root --password=root straxus < straxus.sql
	;;
        update)
                php composer.phar update
                php app/console doctrine:schema:update --force
        ;;
	*)
		echo "Usage: ${0} {install|update|run}"
		exit 2
esac
exit 0