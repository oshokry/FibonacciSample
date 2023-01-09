function computeFibonacci() {
    var n = $("#inputNumber").val();
    $("#resultWidget").load("invoke.php?n=" + n);
}
