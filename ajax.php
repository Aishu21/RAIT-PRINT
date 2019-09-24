<html>
<head>
 <script src="jquery-3.3.1.min.js"> 
var timerData = [];

function secondPassed(row) {
    var seconds = timerData[row].remaining;
    var minutes = Math.round((seconds - 30) / 60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;
    }

    $("#countdown" + row).html(minutes + ":" + remainingSeconds);
    if (seconds === 0) {
        clearInterval(timerData[row].timerId);
        $("#countdown" + row).html("Buzz Buzz");
        $("#add_" + row).show();
        $("#1add_" + row).show();
        $("#added_" + row).hide();
        $("#block_" + row).hide();
        $("#sale_" + row).show();
        $("#1sale_" + row).show();
        $.ajax({
            type: "GET",
            url: 'unblock.php',
            data: {
                id: row
            },
            success: function (data) {
                $("#cart-item").html(data);
                $("#amount-top").html($("#total").val());
                $("#item-total").html($("#carttotal").val());
            }
        });
    } else {
        seconds--;
    }
    timerData[row].remaining = seconds;
}

function timer(row, sec) {
    timerData[row] = {
        remaining: sec,
        timerId: setInterval(function () {
            secondPassed(row);
        }, 1000)
    };
    var sec = timerData[row].timerId;
}
/*
<? php
foreach($_SESSION["cart_item"] as $item) {
    $old = strtotime(date("m/d/Y h:i:s ", time()));
    $new = strtotime($item['time']);
    $time = $new - $old;
    echo "timer({$item['id']}, $time);\r\n";
}
?>
*/
timer(1,120);
timer(2,240);
timer(3,360);
</script>
</head>
<body>
<p>Timer 1: <span id="countdown1" class="timer"></span></p>
<p>Timer 2: <span id="countdown2" class="timer"></span></p>
<p>Timer 3: <span id="countdown3" class="timer"></span></p>


</body>
</html>

