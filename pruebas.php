

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#submit").click(function(e){
                    e.preventDefault();
                    let form_data = new FormData();
                    let img = $("#myImage")[0].files;

                    //Checking image selected or not

                    if(img.length > 0){
                        form_data.append('my_image', img[0]);

                        $.ajax({
                            url: 'upload.php',
                            type:'post',
                            data: form_data,
                            contentType: false,
                            processData: false,
                            success: function(res){
                                const data = JSON.parse(res);
                                if(data.error != 1){
                                    let path = "img/"+data.src;
                                    $("#preImg").attr("src", path);
                                }else{
                                    $("#errorMs").text(data.em);
                                }
                            }
                        });
                    }else{
                        $("#errorMs").text('Please select an Image');
                    }
                })
            });
        </script>
    </head>
    <body>
        <p id="errorMs"></p>
        <form action="" method="POST">
            <input type="file" id="myImage">
            <input type="submit" value="Upload" id="submit">
        </form>
        <div class="gallery">
            <img src="" id="preImg">
        </div>
    </body>
</html>

