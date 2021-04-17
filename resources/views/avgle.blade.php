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
            <div class="content">
                <!-- <div class="title m-b-md">
                    Laravel
                </div> -->
                <table class="table table-hover table-bordered order-table text-center" style="margin-bottom: 0;overflow-x: auto">
                     <tr>
                        <th>開頭</th>
                        <th>照片</th>
                        <th>觀看次數</th>
                        <th>上傳時間</th>
                    </tr>
                    @foreach($avgle as $val)
                        <tr>
                            <td><a href="/avgle/form/{{ $val->vid }}?key={{ $key }}">{{ $val->title }}</a></td>
                            <td><video><source autoplay src="{{ $val->preview_video_url }}"></source></video></td>
                            <td>{{ $val->viewnumber }}</td>
                            <td>{{ date('Y-m-d H:i:s', $val->addtime) }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </body>
</html>
