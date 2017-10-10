<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>404 - Not Found</title>
    <style type="text/css">
        button{
            cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
            padding:5px 25px; /*add some padding to the inside of the button*/
            background:#35b128; /*the colour of the button*/
            border:1px solid #33842a; /*required or the default border for the browser will appear*/
            /*give the button curved corners, alter the size as required*/
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
            /*give the button a drop shadow*/
            -webkit-box-shadow: 0 0 4px rgba(0,0,0, .75);
            -moz-box-shadow: 0 0 4px rgba(0,0,0, .75);
            box-shadow: 0 0 4px rgba(0,0,0, .75);
            /*style the text*/
            color:#f3f3f3;
            font-size:1.1em;
        }
        /***NOW STYLE THE BUTTON'S HOVER AND FOCUS STATES***/
        button:hover, button:focus{
            background-color :#399630; /*make the background a little darker*/
            /*reduce the drop shadow size to give a pushed button effect*/
            -webkit-box-shadow: 0 0 1px rgba(0,0,0, .75);
            -moz-box-shadow: 0 0 1px rgba(0,0,0, .75);
            box-shadow: 0 0 1px rgba(0,0,0, .75);
        }
    </style>
</head>

<body>
<div style="width:40%; float:left; margin-left:32.5%; margin-top:5%">
    <img src="assets/img/404.jpg" alt="404" width="100%">
</div>
<div style="width:40%; float:left; margin-left:32.5%; margin-top:2%" align="center">
    <button onclick="window.location.href='public_path()';">Back To Home</button>
</div>
</body>

</html>
