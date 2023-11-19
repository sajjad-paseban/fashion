@php
    $buttons = [
        ['name'=>'درگاه پرداخت جدید','href'=>route('admin.payment_gateways.create')]
    ];
@endphp
@extends('admin.index')
@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="title p-4">
                    مدیریت درگاه های پرداخت
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-box title="درگاه های پرداخت" :buttons="$buttons">
                    <table id="mytable" class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>سیستم درگاه پرداخت</th>
                                <th>عنوان</th>
                                <th>آیکون</th>
                                <th>پیوند برگشتی</th>
                                <th>پین</th>
                                <th>شماره حساب کاربری</th>
                                <th>کد رمزنگاری</th>
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
                            @foreach ($payment_gateways as $item)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td style="font-family: 'yekan';">{{$count}}</td>
                                    <td>
                                        <img src="{{$item->payment_system->img_path ? asset('storage/payment/'.$item->payment_system->img_path) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1024px-Default_pfp.svg.png'}}" width="20" height="20" style="border-radius: 50px; margin-left: 5px;" alt="">
                                        {{$item->payment_system->title}}
                                    </td>
                                    <td>{{$item->title}}</td>
                                    <td><img src="{{$item->img_path ? asset('storage/payment_gateways/'.$item->img_path) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1024px-Default_pfp.svg.png'}}" width="25" height="25" style="border-radius: 50px;object-fit: cover;" alt=""></td>
                                    <td>{{$item->callback_url}}</td>
                                    <td>{{$item->pin}}</td>
                                    <td>{{$item->account_number}}</td>
                                    <td>{{$item->code}}</td>
                                    <td>    
                                        <input class="form-check-input" type="checkbox" {{($item->status == 1)? 'checked' : ''}} disabled>
                                    </td>
                                    <td>
                                        {!! Form::open(['route'=>['admin.payment_gateways.destroy',$item->id],'method'=>'DELETE','class'=>'d-none','id'=>'delete'.$item->id]) !!}
                                        {!! Form::close() !!}
                                        <button onclick="deleteOperation('delete{{$item->id}}')" class="btn btn-sm bg-light-danger">
                                            حذف
                                        </button>
                                        <a href="{{route('admin.payment_gateways.edit',$item->id)}}" class="btn btn-sm bg-light-purple">
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
                    title: 'حذف درگاه پستی',
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