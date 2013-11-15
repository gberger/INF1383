#!/bin/bash
cd `dirname $0`

echo
echo --------------------------
echo Importing cadvol DATABASE
echo --------------------------
echo

export PGPASSWORD=cadvol

/Applications/MAPP/postgresql/bin/psql postgres --file="/Applications/MAPP/apache2/htdocs/INF1383/sql/rebuild.sql" postgres
