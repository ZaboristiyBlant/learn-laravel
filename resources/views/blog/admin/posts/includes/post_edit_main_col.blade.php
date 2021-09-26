<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                   <li class="nav-item">
                       <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#maindata" type="button" role="tab" aria-controls="home" aria-selected="true">Основные данные</button>
                   </li>
                    <li class="nav-item">
                        <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#adddata" type="button" role="tab" aria-controls="home" aria-selected="true">Доп. данные</button>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" value="{{$item->title}}"
                                   name="title"
                                   id="title"
                                   class="form-control"
                                   minlenght="3"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Статья</label>
                            <textarea name="content_raw"
                                      id="content_raw"
                                      rows="20"
                                      class="form-control">
                                {{ old('content_raw', $item->content_raw) }}
                            </textarea>
                        </div>

                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control"
                                    placeholder="Выберите категорию"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                    @if($categoryOption->id == $item->category_id) selected @endif
                                    >{{ $categoryOption->id_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input type="text"
                                   name="slug"
                                   id="slug"
                                   class="form-control"
                                   value="{{ $item->slug }}">
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea name="excerpt"
                                      id="excerpt"
                                      class="form-control"
                                      rows="3">
                                {{ old('excerpt', $item->excerpt) }}
                            </textarea>
                        </div>
                        <div class="form-check">
                            <input type="hidden"
                                   name="is_published"
                                   value="0">
                            <input type="checkbox"
                                   name="is_published"
                                   class="form-check-input"
                                   @if($item->is_published)
                                   checked="checked"
                                   @endif
                                   value="{{ $item->is_published }}">
                            <label for="is_published" class="form-check-label">Опубликовано</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
