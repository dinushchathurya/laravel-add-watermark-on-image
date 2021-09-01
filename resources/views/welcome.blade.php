<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Laravel add watermark on Image</title>
</head>

<body>
    <div class="container">
        <h1>Laravel add watermark on Image</h2>
            <form action="{{route('image.watermark')}}" enctype="multipart/form-data" method="post">
                @csrf
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>

                <div class="col-md-12 text-center">
                    <img src="/upload/{{ Session::get('fileName') }}" width="40%" />
                </div>
                @endif

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="mb-3">
                    <input type="file" name="file" class="form-control" id="formFile">
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" name="submit" class="btn btn-primary">
                        Upload File
                    </button>
                </div>
            </form>
    </div>
</body>

</html>
