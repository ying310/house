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
                <form method="get" action="/youtubedownload">
                    <div class="form-group row"><h1 class="col-md-12"><i class="bi bi-align-bottom"></i>下載Youtube Mp4</h1></div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label>網址</label>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" name="url" type="text" placeholder="請輸入youtube網址" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <input class="form-control btn btn-success" type="submit" value="送出" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
