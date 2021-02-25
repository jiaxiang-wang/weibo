$(function () {
    $("#search").focus(function () {
        $("#hidden").show();
    });
    $("#search").focusout(function () {
        $("#hidden").hide();
    });
    $(".icon").mouseover(function (e) {
        //console.log(e.currentTarget.children[0]);
        const icon = e.currentTarget.children[0];
        $(icon).css("marginLeft", 13);
    });
    $(".icon").mouseout(function (e) {
        //console.log(e.currentTarget.children[0]);
        const icon = e.currentTarget.children[0];
        $(icon).css("marginLeft", 15);
    });
});
