$(function () {
    function formReset() {
        $("form").reset()
    }

    function goBack() {
        window.location.replace("dashboard.php")
    }

    $(".cancel").click(function () {
        goBack()
    });

    $(".container > .cancel input").click(function () {
        goBack()
    })

    $(".options > .left > .opt1").click(function () {
        window.location.replace("written_off.php")
    })

    $(".options > .left > .opt2").click(function () {
        window.location.replace("diesel_vehicle.php")
    })
})