@php
    $buttons = [
        ['name'=>'دسته بندی جدید','href'=>route('admin.category.create')]
    ];
@endphp
@extends('admin.index')
@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="title p-4">
                    مدیریت پست ها
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-box title="پست ها" :buttons="$buttons">
                    <table id="mytable" class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>والد</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                                <th>تاریخ ثیت</th>
                                <th>تاریخ آخرین ویرایش</th>
                                <th>کاربر ثبت کننده</th>
                                <th>کاربر ویرایش کننده</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($categories as $item)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td style="font-family: 'yekan';">{{$count}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->category ? $item->category->title : '-'}}</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" {{($item->status == 1)? 'checked' : ''}} disabled>
                                    </td>
                                    <td>
                                        {!! Form::open(['route'=>['admin.category.destroy',$item->id],'method'=>'DELETE','class'=>'d-none','id'=>'delete'.$item->id]) !!}
                                        {!! Form::close() !!}
                                        <button onclick="deleteOperation('delete{{$item->id}}')" class="btn btn-sm bg-light-danger">
                                            حذف
                                        </button>
                                        <a href="{{route('admin.category.edit',$item->id)}}" class="btn btn-sm bg-light-purple">
                                            ویرایش
                                        </a>
                                    </td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>-</td>
                                    <td>-</td>
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
        </script>
        <script>
            function deleteOperation(id){
                $.confirm({
                    title: 'حذف دسته بندی',
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