#!/bin/bash

echo
echo --------------------------
echo Importing cadvol DATABASE
echo --------------------------
echo

export PGPASSWORD=senha123

/home/gberger/lappstack-5.4.22-0a/postgresql/bin/psql postgres --file="/home/gberger/lappstack-5.4.22-0a/apache2/htdocs/sql/rebuild.sql" postgres
