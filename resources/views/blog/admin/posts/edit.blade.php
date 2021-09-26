<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<div class="container">
    @if ($item->exists)
         <form action="{{route('blog.admin.posts.update', $item->id)}}" method="POST">
    @method('PATCH')

    @else
    <form action="{{route('blog.admin.posts.store')}}" method="POST">
    @endif
    @csrf
        @include('blog.admin.posts.includes.result_messages')

        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('blog.admin.posts.includes.post_edit_main_col')
            </div>
            <div class="col-md-3">
                @include('blog.admin.posts.includes.post_edit_add_col')
            </div>
        </div>
   </form>
   @if($item->exists)
                     <br>
                     <form method="POST" action="{{ route('blog.admin.posts.destroy', $item->id) }}">
        @method('DELETE')
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-block">
                    <div class="card-body ml-auto">
                        <button type="submit" class="btn btn-link">Удалить</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
                     </form>

   @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
