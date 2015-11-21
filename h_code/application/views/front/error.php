<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ERROR</title>
    <style>
        .main{
            width: 150px;
            position: fixed;
            top: 30%;
            left: 50%;
            margin-left: -75px;
            border:1px solid #0090c5;
            padding:20px;
        }
        span {
            margin-left:10px;
        }
        #msg{
            color:red;
            font-size:15px;
        }
        #timer{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="main">
        <span id="msg">非法操作！</span>
        <span id="timer">3</span>
    </div>
    <script>
        var _url="<?php echo MAIN_PATH.'/examination/examList?user_id='.$user_id.'&user_name='.$user_name;?>";
        var handle=setInterval(function(){
            var timer=document.getElementById('timer');
            var now=parseInt(timer.innerText);
            var num=now-1;
            timer.innerText=num;
            if(num<=0){
                clearInterval(handle);
//                window.history.back(-1);
                window.location.href=_url;
            }
        },1000);

    </script>
</body>
</html>