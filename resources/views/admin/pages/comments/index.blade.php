@extends('admin.index')
@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="title p-4">
                    مدیریت نظرات
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-box title="نظرات">
                    <table id="mytable" class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کاربر</th>
                                <th>عنوان پست</th>
                                <th>وضعیت</th>
                                <th>پیام</th>
                                <th>عملیات</th>
                                <th>تاریخ ثیت</th>
                                <th>تاریخ آخرین ویرایش</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($comments as $item)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td style="font-family: 'yekan';">{{$count}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->post->title}}</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" {{($item->status == 1)? 'checked' : ''}} disabled>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm bg-light-warning" type="button" onclick="dialog('{{$item->comment}}')">
                                            نمایش
                                        </button>
                                    </td>
                                    <td>
                                        {!! Form::open(['route'=>['admin.comment.destroy',$item->id],'method'=>'DELETE','class'=>'d-none','id'=>'delete'.$item->id]) !!}
                                        {!! Form::close() !!}
                                        <button onclick="deleteOperation('delete{{$item->id}}')" class="btn btn-sm bg-light-danger">
                                            حذف
                                        </button>
                                        <a href="{{route('admin.comment.edit',$item->id)}}" class="btn btn-sm bg-light-purple">
                                            {{$item->status ? 'غیرفعال' : 'فعال'}}
                                        </a>
                                    </td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-box>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            new DataTable('#mytable');
            document.querySelector('.dataTables_filter>label>input').placeholder = 'جستجو...';
           
            function dialog(content){

                $.dialog({
                    title: 'نظر کاربر',
                    content: content,
                });
            }
            
            function deleteOperation(id){
                $.confirm({
                    title: 'حذف نظر',
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