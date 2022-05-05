#!/bin/bash --

file_name=$2

sqlite3 -batch $1 <<EOF
.separator ","
# .import logfile.log ${table_name}
.import ${file_name} routes
EOF