<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content text-center">
                <form method="get" action="/youtubedownload" id="actform">
                    <input type="hidden" name="type" value="0" id="type">
                    <div class="form-group row"><h1 class="col-md-12"><i class="bi bi-align-bottom"></i>下載Youtube Mp4</h1></div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>網址</label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" id="url" name="url" type="text" placeholder="請輸入youtube網址" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <input class="btn btn-success" type="button" onclick="mySubmit(0)" value="下載mp4" />
                            <input class="btn btn-success" type="button" onclick="mySubmit(1)" value="下載mp3" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            function mySubmit(type){
                var a = document.getElementById('url').value;
                var actform = document.getElementById('actform');
                if(a){

                }else{
                    alert('請輸入網址');
                    return false;
                }
                if(type==0){
                    document.getElementById('type').value = 0;
                    actform.submit();
                }else{
                    document.getElementById('type').value = 1;
                    actform.submit();
                }
            }
        </script>
    </body>
</html>
