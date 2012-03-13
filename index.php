<?php require "config.php"; ?>
<html>

<head>
    <title>IP Breaker</title>
    <style>

            body {
                font-family: Helvetica, "Helvetica Neue", Arial, sans-serif;
                color: #222;
                text-shadow: 0 1px 2px white;
                font-size: 100%;
                background-color: #f3f3f3;
            }
            
            a {
                color: #666;
            }
            a:visited {
                color: #666;
            }
            a:hover {
                color: #000;
            }

            h1 {
                font-family: Georgia;
                font-weight: bold;
                color: white;
                text-shadow: 0px 1px 2px #CCC;
                font-size: 50px;
            }

            input {
                border: solid 1px;
            }

            #header {
                width: 100%;
                line-height: 80px;
                padding: 0 0 0 5px;
                margin-bottom: 5px;
            }

            #footer {
                margin-top: 40px;
            } 

            #ip-input {
                width: 100%;
                height: 40%;
                border:solid 1px;
            }

            #desc {
                font-size: 12px;
                
            }

            #header-desc {
                font-size: 20px;
                color: #ccc;
                text-shadow: 0 1px 2px white;
            }
    </style>

</head>


<body>

    <div id='header'>
        <h1>IP Breaker | <span id='header-desc'> Breaks networks or IP ranges into individual hosts </span> </h1> 
    </div>

    <form method='POST' action='form_handler.php'>

        <input type='textbox' name='ips' id='ip-input' /> <br />
        <span id='desc'><strong>Example:</strong> 192.168.1.1, 192.168.20.1-192.168.20-3, 10.0.0.0/24, 10.1/16</span> <br />
        <span id='desc'><strong>Note:</strong> If number of IP's is >= <?=$result_threshold?>, then this app will return a text file containg the results.  You can adjust this threshold in config.php</span></br>
        <div style='float: right;'> <input type='submit' ></div>

    </form>

    <div id='footer'>

        <span id='desc'> Written by <a href="mailto:nickmaccarthy@gmail.com">Nick MacCarthy</a> of <a href='http://www.nickmaccarthy.com'>nickmaccarthy.com</a>
    </div>
</body>

</html>
