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
                    50
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
                    15
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
                    25
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
                    50
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
                                <a class="btn btn-sm btn-primary">
                                    پست جدید
                                </a>
                                <a class="btn btn-sm btn-primary">
                                    نمایش همه
                                </a>
                            </div>
                        </div>
                        <h6>
                            پست های اخیر
                        </h6>
                    </div>
                    <div class="custom-card-body">
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
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        <button class="btn btn-sm bg-light-danger">
                                            حذف
                                        </button>
                                        <button class="btn btn-sm bg-light-primary">
                                            ویرایش
                                        </button>
                                    </td>
                                </tr>
                            </tbody>    
                        </table>                        
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
                                <a class="btn btn-sm btn-primary">
                                    صفحه جدید
                                </a>
                                <a class="btn btn-sm btn-primary">
                                    نمایش همه
                                </a>
                            </div>
                        </div>
                        <h6>
                            صفحات اخیر
                        </h6>
                    </div>
                    <div class="custom-card-body">
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
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        <button class="btn btn-sm bg-light-danger">
                                            حذف
                                        </button>
                                        <button class="btn btn-sm bg-light-primary">
                                            ویرایش
                                        </button>
                                    </td>
                                </tr>
                            </tbody>    
                        </table>
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
                                <a class="btn btn-sm btn-primary">
                                    نمایش همه
                                </a>
                            </div>
                        </div>
                        <h6>
                            نظرات کاربران
                        </h6>
                    </div>
                    <div class="custom-card-body">
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
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        <button class="btn btn-sm bg-light-purple">
                                            نمایش
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm bg-light-danger">
                                            حذف
                                        </button>
                                        <button class="btn btn-sm bg-light-primary">
                                            ویرایش
                                        </button>
                                    </td>
                                </tr>
                            </tbody>    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection