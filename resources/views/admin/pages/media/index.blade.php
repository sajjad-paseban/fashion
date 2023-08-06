@php
    $buttons = [
        ['name'=>'رسانه جدید','href'=>route('admin.media.create')]
    ];
@endphp
@extends('admin.index')
@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="title p-4">
                    مدیریت رسانه
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-box title="رسانه" :buttons="$buttons">
                    <table id="mytable" class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>تصویر</th>
                                <th>نام فایل</th>
                                <th>عملیات</th>
                                <th>تاریخ ثبت</th>
                                <th>تاریخ آخرین ویرایش</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($media as $item)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td style="font-family: 'yekan';">{{$count}}</td>
                                    <td><img src="{{asset('storage/media/'.$item->path)}}" width="30" alt=""></td>
                                    <td>
                                        {{$item->path}}
                                    </td>
                                    <td>
                                        {!! Form::open(['route'=>['admin.media.destroy',$item->id],'method'=>'DELETE','class'=>'d-none','id'=>'delete'.$item->id]) !!}
                                        {!! Form::close() !!}
                                        <button onclick="deleteOperation('delete{{$item->id}}')" class="btn btn-sm bg-light-danger">
                                            حذف
                                        </button>
                                        <button type="button" onclick="navigator.clipboard.writeText('{{asset('storage/media/'.$item->path)}}')" class="btn btn-sm bg-light-primary">
                                            کپی کردن لینک
                                        </button>
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
            
            function deleteOperation(id){
                $.confirm({
                    title: 'حذف رسانه',
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