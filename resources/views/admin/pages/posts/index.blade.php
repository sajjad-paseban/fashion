@php
    $buttons = [
        ['name'=>'پست جدید','href'=>route('admin.post.create')]
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
                                <th>دسته بندی</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                                <th>تاریخ ثیت</th>
                                <th>تاریخ آخرین ویرایش</th>
                                <th>کاربر ثبت کننده</th>
                                <th>کاربر ویرایش کننده</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-sm bg-light-danger">
                                        حذف
                                    </button>
                                    <a href="" class="btn btn-sm bg-light-purple">
                                        ویرایش
                                    </a>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
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
    @endpush
@endsection