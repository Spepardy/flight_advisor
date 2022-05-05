@ECHO OFF
ECHO airports will be imported soon %1
PAUSE

@REM sqlite3 database.db < commands.txt
ECHO skip to the .sh one :: Didn't work on windows
sqlite3 ../flight_advisor_db.sqlite < import_airports.txt
PAUSE