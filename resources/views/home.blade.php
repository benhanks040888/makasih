<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <script src="{!! asset('assets/dropzone-4.0.1/dropzone.js') !!}"></script>
        <link rel="stylesheet" href="{!! asset('assets/dropzone-4.0.1/dropzone.css') !!}">
    </head>
    <body>
        
        <div class="container">
            <div class="dropzone" id="dropzoneFileUpload">
            </div>
        </div>
 
      <script type="text/javascript">
            var baseUrl = "{!! url('/') !!}";
            var token = "{!! Session::getToken() !!}";
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone("div#dropzoneFileUpload", {
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                addRemoveLinks: true,
                parallelUploads: 1,
                url: baseUrl+"/home/uploadFiles",
                params: {
                    _token: token
                }
             });

            myDropzone.on("success", function (file, response) {
                console.log(response);
            });
            
         </script>

    </body>
</html>
