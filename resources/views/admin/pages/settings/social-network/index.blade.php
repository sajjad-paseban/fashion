@extends('admin.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="title p-3">
                    فضای مجازی
                </h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
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
                                <a class="btn btn-sm btn-primary" href="{{route('admin.social.create')}}">
                                    شبکه جدید
                                </a>
                            </div>
                        </div>
                        <h6>
                            لیست شبکه های مجازی
                        </h6>
                    </div>
                    <div class="custom-card-body">
                        <table id="mytable" class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        عنوان
                                    </th>
                                    <th>
                                        آیکون
                                    </th>
                                    <th>
                                        لینک
                                    </th>
                                    <th>
                                        فعال
                                    </th>
                                    <th>
                                        عملیات
                                    </th>
                                    <th>
                                        تاریخ ثبت
                                    </th>
                                    <th>
                                        تاریخ آخرین ویرایش
                                    </th>
                                    <th>
                                        کاربر ثبت کننده
                                    </th>
                                    <th>
                                        کاربر ویرایش کننده
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    PersianDate::setLocale('fa');
                                    $count = 0;
                                @endphp
                                @foreach ($networks as $item)
                                    @php
                                        $user_insert = App\Models\Log::where(['table_name'=>'social_network','record_id'=>$item->id])->first();
                                        $user_update = App\Models\Log::where(['table_name'=>'social_network','record_id'=>$item->id])->latest('id')->first();
                                        $count++;
                                    @endphp
                                    <tr>
                                        <td>
                                            {{$count}}
                                        </td>
                                        <td>
                                            {{$item->name}}
                                        </td>
                                        <td>
                                            <a class="btn btn-sm bg-light-purple" href="{{asset('storage/social/'.$item->icon_path)}}" target="__blank">
                                                نمایش آیکون
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{$item->link}}" target="__blank">
                                                {{$item->link}}
                                            </a>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="checkbox" {{($item->status == 1)? 'checked' : ''}} disabled>
                                        </td>
                                        <td>
                                            {!! Form::open(['route'=>['admin.social.destroy',$item->id],'method'=>'DELETE','class'=>'d-none','id'=>'delete'.$item->id]) !!}
                                            {!! Form::close() !!}   
                                            <button onclick="deleteOperation('delete{{$item->id}}')" class="btn btn-sm bg-light-danger">
                                                حذف
                                            </button>
                                            <a href="{{route('admin.social.edit',$item->id)}}" class="btn btn-sm bg-light-primary">
                                                ویرایش
                                            </a>
                                        </td>
                                        <td>
                                            {{$item->created_at ? $item->created_at : '-'}}
                                        </td>
                                        <td>
                                            {{$item->updated_at ? $item->updated_at : '-'}}
                                        </td>
                                        <td>
                                            {{$user_insert ? $user_insert->user_id : '-'}}
                                        </td>
                                        <td>
                                            {{$user_update ? $user_update->user_id : '-'}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>    
                        </table>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            function deleteOperation(id){
                $.confirm({
                    title: 'حذف فضای مجازی',
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