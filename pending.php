<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Flight Advisor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <p>Karioki thing</p>
    <input type="button" value="Launch Installer" onclick="window.open('file:///C:/xampp/htdocs/flight_advisor/import_routes.bat')" />

    <script type="text/javascript">
        function myFunction() {
            WshShell = new ActiveXObject("Wscript.Shell"); //Create WScript Object
            WshShell.run("C:/xampp/htdocs/flight_advisor/import_routes.bat"); // Please change the path and file name with your relevant available path in client system. This code can be used to execute .exe file as well
        }
    </SCRIPT>

    <br><br>
    <input type="button" value="Test Java Script" onClick="myFunction()">
</body>

</html>