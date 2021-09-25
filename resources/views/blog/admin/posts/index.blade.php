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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                <a href="{{route('blog.admin.posts.create')}}" class="btn btn-primary">Написать</a>
            </nav>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Автор</th>
                            <th>Категория</th>
                            <th>Заголовок</th>
                            <th>Дата публикации</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($paginator as $post)
                           <tr @if(!$post->is_published) style = "background-color: #ccc;" @endif>
                               <td>{{ $post->id }}</td>
                               <td>{{ $post->user_id }}</td>
                               <td>{{ $post->category_id }}</td>
                               <td>
                                   <a href="{{ route('blog.admin.posts.edit', $post->id) }}">{{ $post->title }}</a>
                               </td>
                               <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i') : '' }}</td>
                           </tr>
                        @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
@if($paginator->total() > $paginator->count())
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    {{ $paginator->links() }}
                </div>
            </div>
        </div>
    </div>
@endif
</div>
</body>
</html>
