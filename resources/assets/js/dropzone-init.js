Dropzone = require('dropzone');

Dropzone.autoDiscover = false;

$(document).ready(function(){

    var $dropzoneUpload = $('#image'),
        upload = $dropzoneUpload.data('upload'),
        remove = $dropzoneUpload.data('remove'),
        token = $('meta[name="csrf-token"]').attr('content');

    $dropzoneUpload.dropzone({
        url: upload,
        headers: {
            'X-CSRF-Token': token
        },
        paramName: "image",
        autoProcessQueue: true,
        uploadMultiple: false,
        maxFiles: 1,
        maxFilesize: 2,
        addRemoveLinks: true,
        dictDefaultMessage: "Drop image to upload (or click) - Max 2MB",
        init:function() {

            this.on("removedfile", function(file) {
                $.post(remove, {id: file.name, _token: $('#csrf-token').val()});
            });
            this.on('error', function(file, response) {
                $(file.previewElement).find('.dz-error-message').text(response.image);
            });
        }
    });

});

