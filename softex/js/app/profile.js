// Load page
$(document).ready(function() {
    console.log("ready");
    $('#avatar_image').on('click', function() {
        $('#avatar').click();
    });
    
    $("#btn_close_modal").on("click", function() {
        $("#avatar_image").attr("src", img_src);
        $("#exampleModal").modal("hide");
    });

    $('#exampleModal').on('hidden.bs.modal', function(e) {
        $("#avatar_image").attr("src", img_src);
        $('#edit_profile')[0].reset();
    });

});

var showLogo = function() {
    if($('input[name=avatar]').prop('files')[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#avatar_image').attr('src', e.target.result).width(180).height(180);
            $('#image').val($('#avatar').attr('src'));
        };
        reader.readAsDataURL($('input[name=avatar]').prop('files')[0]);
    }
}
