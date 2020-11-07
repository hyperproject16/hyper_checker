$(document).ready(function() {

    $('#click').click(function() {
        $("#expand").slideToggle();
    });

    $('#click2').click(function() {
        $("#expand2").slideToggle();
    });

    $('#click3').click(function() {
        $("#expand3").slideToggle();
    });
});

function start() {
    var line = $("#card").val();
    var linestart = line.split("\n");
    var total = linestart.length;
    var lv = 0;
    var cn = 0;
    var dd = 0;
    linestart.forEach(function(value, index) {
        setTimeout(
            function() {
                $.ajax({
                    url: 'api.php?card=' + value,
                    type: 'GET',
                    async: true,
                    success: function(result) {
                        if (result.match("#CVV")) {
                            removeline();
                            lv++;
                            live(result + "");
                        } else if (result.match("#CCN")) {
                            removeline();
                            cn++;
                            live2(result + "");
                        } else {
                            removeline();
                            dd++;
                            dead(result + "");
                        }
                        $('#total').html(total);
                        var checked = parseInt(lv) + parseInt(cn) + parseInt(dd);
                        $('#cvv').html(lv);
                        $('#ccn').html(cn);
                        $('#dead').html(dd);
                        $('#checked').html(checked);
                        $('#cvv2').html(lv);
                        $('#ccn2').html(cn);
                        $('#dead2').html(dd);
                    }
                });
            }, 2000 * index);
    });
}

function live(str) {
    $(".live").append(str + "<br>");
}

function dead(str) {
    $(".dead").append(str + "<br>");
}

function live2(str) {
    $(".live2").append(str + "<br>");
}

function removeline() {
    var lines = $("#card").val().split('\n');
    lines.splice(0, 1);
    $("#card").val(lines.join("\n"));
}
