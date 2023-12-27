#!/bin/sh

php_bin=""
host=localhost
port=8000

for try_bin in php74 php7.4 php7 php
do
	php_bin=$(command -v $try_bin)
	if [ -n "$php_bin" ]
	then
		break
	fi
done

echo "Using PHP: $php_bin"

if [ -n "$2" ]
then
	host=$1
	port=$2
elif [ -n "$1" ]
then
	port=$1
fi

# check if we should update schedules, upcoming, etc.
if [ -z "$(find "configs/upcoming.json" -newermt "8 hours ago")" ]; then
	echo "Updating schedules…\n"
	$php_bin -d short_open_tag=true index.php download
	echo
fi

$php_bin -S $host:$port -d short_open_tag=true $3 index.php
