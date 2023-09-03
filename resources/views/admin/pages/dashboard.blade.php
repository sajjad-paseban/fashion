@extends('admin.index')
@section('content')
    <div class="container-fluid">
        <div class="row p-2 p-sm-0">
            <div class="col-sm col-12 m-sm-2 my-2 bg-light-primary border-0 rounded-1 shadow-sm card">
                <h4 class="text-f-right p-2">
                    کاربران
                </h4>
                <span class="material-symbols-outlined">
                    group
                </span>
                <span class="digit">
                    {{$data->user_count}}
                </span>
            </div>
            <div class="col-sm col-12 m-sm-2 my-2 bg-light-danger border-0 rounded-1 shadow-sm card">
                <h4 class="text-f-right p-2">
                    پست ها
                </h4>
                <span class="material-symbols-outlined">
                    subscriptions   
                </span>
                <span class="digit">
                    {{$data->post_count}}
                </span>
            </div>
            <div class="col-sm col-12 m-sm-2 my-2 bg-light-purple border-0 rounded-1 shadow-sm card">
                <h4 class="text-f-right p-2">
                    نظرات
                </h4>
                <span class="material-symbols-outlined">
                    message
                </span>
                <span class="digit">
                    {{$data->comment_count}}
                </span>
            </div>
            <div class="col-sm col-12 m-sm-2 my-2 bg-light-warning border-0 rounded-1 shadow-sm card">
                <h4 class="text-f-right p-2">
                    رسانه
                </h4>
                <span class="material-symbols-outlined">
                    perm_media
                </span>
                <span class="digit">
                    {{$data->media_count}}
                </span>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm col-12">
                <div class="custom-card show-content">
                    <div class="custom-card-header">
                        <div class="buttons">
                            <div class="default-buttons">
                                <button class="remove">
                                    <span class="material-symbols-outlined">
                                        remove
                                    </span>
                                </button>
                                <button class="add">
                                    <span class="material-symbols-outlined">
                                        add
                                    </span>
                                </button>
                            </div>
                            <div class="custom-buttons">
                                <a href="{{route('admin.post.create')}}" class="btn btn-sm btn-primary">
                                    پست جدید
                                </a>
                                <a href="{{route('admin.post.index')}}" class="btn btn-sm btn-primary">
                                    نمایش همه
                                </a>
                            </div>
                        </div>
                        <h6>
                            پست های اخیر
                        </h6>
                    </div>
                    <div class="custom-card-body">
                        @if (count($data->posts))
                            <table class="table table-hover text-center table-responsive">
                                <thead>
                                    <tr>
                                        <th>
                                            عنوان
                                        </th>
                                        <th>
                                            نویسنده
                                        </th>
                                        <th>
                                            تاریخ آخرین ویرایش
                                        </th>
                                        <th>
                                            عملیات
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->posts as $item)
                                        <tr>
                                            <td>
                                                {{$item->title}}
                                            </td>
                                            <td>
                                                {{$item->user ? $item->user->name : \App\Models\Setting::all()->last()->author}}
                                            </td>
                                            <td>
                                                @php
                                                    $date = \Morilog\Jalali\CalendarUtils::convertNumbers(Morilog\Jalali\Jalalian::fromCarbon($item->updated_at)->format('H:i:s | Y-m-d'));
                                                @endphp
                                                {{$date}}
                                            </td>
                                            <td>
                                                {!! Form::open(['route'=>['admin.post.destroy',$item->id],'method'=>'DELETE','class'=>'d-none','id'=>'post-delete'.$item->id]) !!}
                                                {!! Form::close() !!}
                                                <button onclick="deleteOperation('حذف پست','post-delete{{$item->id}}')" class="btn btn-sm bg-light-danger">
                                                    حذف
                                                </button>
                                                <a href="{{route('admin.post.edit',$item->id)}}" class="btn btn-sm bg-light-primary">
                                                    ویرایش
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>    
                            </table>                                                        
                        @else
                            <p class="text-center m-0 text-muted" style="font-family: vazir;">درحال حاضر پست ای وجود ندارد</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm col-12 my-2 my-sm-0">
                <div class="custom-card show-content">
                    <div class="custom-card-header">
                        <div class="buttons">
                            <div class="default-buttons">
                                <button class="remove">
                                    <span class="material-symbols-outlined">
                                        remove
                                    </span>
                                </button>
                                <button class="add">
                                    <span class="material-symbols-outlined">
                                        add
                                    </span>
                                </button>
                            </div>
                            <div class="custom-buttons">
                                <a href="{{route('admin.page.create')}}" class="btn btn-sm btn-primary">
                                    صفحه جدید
                                </a>
                                <a href="{{route('admin.page.index')}}" class="btn btn-sm btn-primary">
                                    نمایش همه
                                </a>
                            </div>
                        </div>
                        <h6>
                            صفحات اخیر
                        </h6>
                    </div>
                    <div class="custom-card-body">
                        @if (count($data->pages))
                        <table class="table table-hover text-center table-responsive">
                            <thead>
                                <tr>
                                    <th>
                                        عنوان
                                    </th>
                                    <th>
                                        نویسنده
                                    </th>
                                    <th>
                                        تاریخ آخرین ویرایش
                                        </th>
                                        <th>
                                            عملیات
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->pages as $item)
                                        <tr>
                                            <td>
                                                {{$item->title}}
                                            </td>
                                            <td>
                                                {{\App\Models\Setting::all()->last()->author}}
                                            </td>
                                            <td>
                                                @php
                                                    $date = \Morilog\Jalali\CalendarUtils::convertNumbers(Morilog\Jalali\Jalalian::fromCarbon($item->updated_at)->format('H:i:s | Y-m-d'));
                                                @endphp
                                                {{$date}}
                                            </td>
                                            <td>
                                                {!! Form::open(['route'=>['admin.page.destroy',$item->id],'method'=>'DELETE','class'=>'d-none','id'=>'page-delete'.$item->id]) !!}
                                                {!! Form::close() !!}
                                                <button onclick="deleteOperation('حذف صفحه','page-delete{{$item->id}}')" class="btn btn-sm bg-light-danger">
                                                    حذف
                                                </button>
                                                <a href="{{route('admin.page.edit',$item->id)}}" class="btn btn-sm bg-light-primary">
                                                    ویرایش
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>    
                            </table>                                
                        @else
                            <p class="text-center m-0 text-muted" style="font-family: vazir;">درحال حاضر صفحه ای وجود ندارد</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-sm col-12">
                <div class="custom-card show-content">
                    <div class="custom-card-header">
                        <div class="buttons">
                            <div class="default-buttons">
                                <button class="remove">
                                    <span class="material-symbols-outlined">
                                        remove
                                    </span>
                                </button>
                                <button class="add">
                                    <span class="material-symbols-outlined">
                                        add
                                    </span>
                                </button>
                            </div>
                            <div class="custom-buttons">
                                <a href="{{route('admin.comment.index')}}" class="btn btn-sm btn-primary">
                                    نمایش همه
                                </a>
                            </div>
                        </div>
                        <h6>
                            نظرات کاربران
                        </h6>
                    </div>
                    <div class="custom-card-body">
                        @if(count($data->comments))
                            <table class="table table-hover text-center table-responsive">
                                <thead>
                                    <tr>
                                        <th>
                                            نام کاربر
                                        </th>
                                        <th>
                                            عنوان پست
                                        </th>
                                        <th>
                                            وضعیت
                                        </th>
                                        <th>
                                            تاریخ ثبت
                                        </th>
                                        <th>
                                            پیام
                                        </th>
                                        <th>
                                            عملیات
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data->comments as $item)
                                        <tr>
                                            <td>
                                                {{$item->user->name}}
                                            </td>
                                            <td>
                                                {{$item->post->title}}
                                            </td>
                                            <td>
                                                <input class="form-check-input" type="checkbox" {{($item->status == 1)? 'checked' : ''}} disabled>                                        
                                            </td>
                                            <td>
                                                @php
                                                    $date = \Morilog\Jalali\CalendarUtils::convertNumbers(Morilog\Jalali\Jalalian::fromCarbon($item->created_at)->format('H:i:s | Y-m-d'));
                                                @endphp
                                                {{$date}}
                                            </td>
                                            <td>
                                                <button class="btn btn-sm bg-light-warning" type="button" onclick="dialog('نظر کاربر','{{$item->comment}}')">
                                                    نمایش
                                                </button>
                                            </td>
                                            <td>
                                                {!! Form::open(['route'=>['admin.comment.destroy',$item->id],'method'=>'DELETE','class'=>'d-none','id'=>'comment-delete'.$item->id]) !!}
                                                {!! Form::close() !!}
                                                <button onclick="deleteOperation('حذف نظر','comment-delete{{$item->id}}')" class="btn btn-sm bg-light-danger">
                                                    حذف
                                                </button>
                                                <a href="{{route('admin.comment.edit',$item->id)}}" class="btn btn-sm bg-light-primary">
                                                    {{$item->status ? 'غیرفعال' : 'فعال'}}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>    
                            </table>
                        @else
                            <p class="text-center m-0 text-muted" style="font-family: vazir;">درحال حاضر نظری وجود ندارد</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
        
            function dialog(title,content){

                $.dialog({
                    title: title,
                    content: content,
                });
            }
            
            function deleteOperation(title,id){
                $.confirm({
                    title: title,
                    content: 'آیا از حذف این آیتم مطمعن هستید؟',
                    buttons: {
                        "بله": function () {
                            document.getElementById(id).submit()
                        },
                        "خیر": function () {

                        }
                    }
                });
            }
        </script>
        
    @endpush
@endsection