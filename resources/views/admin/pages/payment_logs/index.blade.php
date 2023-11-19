@php
    $buttons = [
        ['name'=>'گزارش پرداخت جدید','href'=>route('admin.payment_logs.create')]
    ];
@endphp
@extends('admin.index')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="title p-4">
                    مدیریت گزارش پرداخت ها
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-box title="گزارش پرداخت ها" :buttons="$buttons">
                    <table id="mytable" class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان پست</th>
                                <th>نام کاربر</th>
                                <th>مبلغ پرداختی</th>
                                <th>کد معامله</th>
                                <th>کد رهگیری</th>
                                <th>شماره کارت</th>
                                <th>بانک</th>
                                <th>وضعیت پرداخت</th>
                                <th>عملیات</th>
                                <th>تاریخ ثبت</th>
                                <th>تاریخ آخرین ویرایش</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($payment_logs as $item)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td style="font-family: 'yekan';">{{$count}}</td>
                                    <td>{{$item->post->title}}</td>
                                    <td>{{$item->user->name ." - ". ($item->user->email ? $item->user->email : $item->user->phone)}}</td>
                                    <td>{{number_format($item->amount)}}</td>
                                    <td>{{$item->trans_id ? $item->trans_id : "-"}}</td>
                                    <td>{{$item->tracking_number ? $item->tracking_number : "-"}}</td>
                                    <td>{{$item->card_number ? $item->card_number : "-"}}</td>
                                    <td>{{$item->bank ? $item->bank : "-"}}</td>
                                    <td>
                                        <span style="border-radius: 4px; padding: 5px 10px; color: #ffffff; position: relative; top: 2px; background-color: rgba({{$item->status ? "40,167,69,0.9" : "220,53,69,0.9"}})">
                                            {{$item->status ? "پرداخت شده" : "پرداخت نشده"}}
                                        </span>
                                    </td>
                                    <td>
                                        {!! Form::open(['route'=>['admin.payment_logs.destroy',$item->id],'method'=>'DELETE','class'=>'d-none','id'=>'delete'.$item->id]) !!}
                                        {!! Form::close() !!}
                                        <button onclick="deleteOperation('delete{{$item->id}}')" class="btn btn-sm bg-light-danger">
                                            حذف
                                        </button>
                                        <a href="{{route('admin.payment_logs.edit',$item->id)}}" class="btn btn-sm bg-light-purple">
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
                    title: 'حذف گزارش پرداخت',
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