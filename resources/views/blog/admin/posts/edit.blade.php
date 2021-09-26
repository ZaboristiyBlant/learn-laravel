<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    @if ($item->exits)
         <form action="{{route('blog.admin.posts.update', $item->id)}}" method="POST">
    @method('PATCH')

    @else
    <form action="{{route('blog.admin.posts.store')}}" method="POST">
    @endif
    @csrf
    <div class="container">
        @include('blog.admin.posts.includes.result_messages')

        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('blog.admin.posts.includes.post_edit_main_col')
            </div>
            <div class="col-md-3">
                @include('blog.admin.posts.includes.post_edit_add_col')
            </div>
        </div>
    </div>
   </form>
</body>
</html>
