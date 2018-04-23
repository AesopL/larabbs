@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="text-center">
                    <i class="glyphicon glyphicon-edit"></i>
                    @if($topic->id)
                       编辑话题
                    @else
                        新建话题
                    @endif
                </h2>
            </div>
            @include('common.error')
            <div class="panel-body">
                @if($topic->id)
                <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT"> @else
                    <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input class="form-control" placeholder="标题" type="text" name="title" id="title-field" value="{{ old('title', $topic->title ) }}" />
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="category_id">
                                <option value="" hidden disabled {{ $topic->id ? '' : 'selected' }}>请选择分类</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $topic->categroy_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="body" placeholder="请填入至少三个字符的内容。" id="editor" class="form-control" rows="3">{{ old('body', $topic->body ) }}</textarea>
                        </div>
                        <div class="well well-sm">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a class="btn btn-link pull-right" href="{{ route('topics.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/module.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/hotkeys.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/uploader.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/simditor.min.js') }}"></script>


<script>
    $(document).ready(function(){
        var editor = new Simditor({
            textarea: $('#editor'),
            upload: {
                url: '{{ route('topics.upload_image') }}',
                params: { _token: '{{ csrf_token() }}' },
                fileKey: 'upload_file',
                connectionCount: 3,
                leaveConfirm: '文件上传中，关闭此页面将取消上传。'
            },
            pasteImage:true,
        });
    });
</script>
@endsection
