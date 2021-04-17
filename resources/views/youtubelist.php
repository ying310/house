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
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">網址</label>
                            <input class="form-controls" name="url" type="text" placeholder="請輸入youtube網址" />
                            <input class="btn btn-success" type="submit" value="送出" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
