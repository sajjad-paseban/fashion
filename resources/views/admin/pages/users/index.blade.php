@php
    $buttons = [
        ['name'=>'کاربر جدید','href'=>route('admin.user.create')]
    ];
@endphp
@extends('admin.index')
@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="title p-4">
                    مدیریت کاربران
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-box title="کاربران" :buttons="$buttons">
                    <table id="mytable" class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>تصویر</th>
                                <th>نام کاربر</th>
                                <th>شماره همراه</th>
                                <th>پست الکترونیکی</th>
                                <th>تاریخ تولد</th>
                                <th>نقش</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                                <th>تاریخ ثبت</th>
                                <th>تاریخ آخرین ویرایش</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($users as $item)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td style="font-family: 'yekan';">{{$count}}</td>
                                    <td><img src="{{$item->photo_path ? asset('storage/user/'.$item->photo_path) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1024px-Default_pfp.svg.png'}}" width="30" alt=""></td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phonenumber}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->birthdate}}</td>
                                    <td>{{$item->is_admin ? 'مدیر' : 'کاربر ساده'}}</td>
                                    <td>
                                        <input class="form-check-input" type="checkbox" {{($item->status == 1)? 'checked' : ''}} disabled>
                                    </td>
                                    <td>
                                        {!! Form::open(['route'=>['admin.user.destroy',$item->id],'method'=>'DELETE','class'=>'d-none','id'=>'delete'.$item->id]) !!}
                                        {!! Form::close() !!}
                                        <button onclick="deleteOperation('delete{{$item->id}}')" class="btn btn-sm bg-light-danger">
                                            حذف
                                        </button>
                                        <a href="{{route('admin.user.edit',$item->id)}}" class="btn btn-sm bg-light-purple">
                                            ویرایش
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
            
            function deleteOperation(id){
                $.confirm({
                    title: 'حذف کاربر',
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