<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <script>
        $(document).ready(
            function getdata() {
            $.ajax({
                url: "http://localhost/mfsc2/testdevice/data.txt",
                method: "GET",
                success: function(data) {
                    console.log(data);
                    var lanlat=data.split(",");
                    console.log(lanlat);
                },
                async: false,
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
</body>

</html>