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
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-12">
                        <a href="/update" class="btn btn-primary">更新</a>
                    </div>
                </div>
                <br/>
                {{ $house->links() }}
                <table class="table table-hover table-bordered order-table text-center" style="margin-bottom: 0;overflow-x: auto">
                     <tr>
                        <th>名稱</th>
                        <th>價錢</th>
                        <th>地址</th>
                        <th>網址</th>
                        <th>照片</th>
                    </tr>
                    @foreach($house as $val)
                        <tr>
                            <td>{{ $val->house_title }}</td>
                            <td>{{ $val->price }}</td>
                            <td>{{ $val->house_address }}</td>
                            <td><a href="https://rent.591.com.tw/rent-detail-{{ $val->house_591_id }}.html">https://rent.591.com.tw/rent-detail-{{ $val->house_591_id }}.html</a></td>
                            <td>
                            @isset($pic[$val->id])
                                @foreach($pic[$val->id] as $v)
                                    <img src="/pic/{{$v}}" width="300" height="200"/>
                                @endforeach
                            @endisset
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $house->links() }}
            </div>
        </div>
    </body>
</html>
