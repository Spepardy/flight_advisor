@ECHO OFF
ECHO routes will be imported soon
PAUSE

@REM sqlite3 database.db < commands.txt
ECHO skip to the .sh one
@REM sqlite3 ../flight_advisor_db.sqlite < import_routes.txt
PAUSE

@REM import.sh database.db log_entry
ECHO Didn't work on windows :: skip to the .sql one
@REM import_routes.sh ../flight_advisor_db.sqlite import_routes.txt
PAUSE


@REM sqlite3.exe yourdatabase.db < /path/to/impscript.sql
@REM sqlite3 ../flight_advisor_db.sqlite < import_routes.sql

@REM sqlite3.exe "db/code_status.db" ".param set :id %1" ".read sqlTest.sql"
ECHO %1
sqlite3 "../flight_advisor_db.sqlite" ".parameter init" ".parameter set :import_file_name 'routes.txt'" ".read import_routes.sql"
PAUSE