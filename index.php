<!DOCTYPE html>
<html>
<head>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/kaito.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Techy Hyper</title>
</head>

<body>
<center>
<div class="col-md-12">
<div class="card-body";>
<img src="assets/img/hyper.jpg" alt="Techy Hyper" style="border-radius:50%;height:100px;width:100px;"><div class="kaito">Techy Hyper</div><hr>

CVV: <span id="cvv" class="text text-light">0</span>
CCN: <span id="ccn" class="text text-light">0</span>
Dead: <span id="dead" class="text text-light">0</span>
Total: <span id="total" class="text text-light">0</span></div></div></center>

<center>
<div class="col-md-12">
<div class="card-body">
<div class="breakdown">Credit Cards :</div>
<textarea type="text" style="font-size:15px;text-align: center;" id="card" class="md-textarea form-control" rows="7" placeholder="xxxxxxxxxxxxxxx|xx|xxxx|xxx"></textarea>

<div class="break">
<button class="btn btn-kaito btn-block" 
onclick="start()">START</button>
</div>
</div>

</center>
<div class="col-md-12">
<div class="card-body";>
<div class="card">
<button id="click" class="btn btn-kaito">CVV</button></div><br>
<div id="expand"><span id=".live" class="live"></span>
</div>

<div class="card">
<button id="click2" class="btn btn-kaito">CCN</button></div><br>
<div id="expand2"><span id=".live2" class="live2"></span>
</div>

<div class="card">
<button id="click3" class="btn btn-kaito">DEAD</button>
<div id="expand3"><span id=".dead" class="dead"></span>
</div>
</div>
</div>
<br>
<footer>
CREDITS TO -
 Kid And TEAM XCS
<footer>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="assets/js/process.js" type="text/javascript"></script>
</body>
</html>
