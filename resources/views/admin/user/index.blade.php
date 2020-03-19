@extends('admin.layout')

@section('title')
    <title>Thông tin người dùng</title>
@endsection

@section('content_header')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                    Thông tin tài khoản
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        All
                    </a>
                    <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Thông tin người dùng
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <!--begin::Section-->
                <div class="kt-section">
                    <div class="kt-section__content ">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Email</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td scope="col">{{ $user->id }}</td>
                                        <td scope="col">{{ $user->name }}</td>
                                        <td scope="col">
                                            <span class="kt-media kt-media--sm">
                                                <img src="{{ $user->avatar }}">
                                            </span>
                                        </td>
                                        <td scope="col">{{ $user->email == null ? "null" : $user->email }}</td>
                                        <td scope="col">
                                            @if ($user->status == 1)
                                                <span class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill kt-badge--rounded">Active</span>
                                            @else
                                                <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">Deactive</span>
                                            @endif
                                        </td>
                                        <td scope="col">
                                            <a href="{{ route('admin.change_info', ['u='.$user->id]) }}" class="btn btn-success btn-sm">Sửa thông tin</a>
                                            <a href="{{ route('admin.change_password', ['u='.$user->id]) }}" class="btn btn-warning btn-sm">Sửa mật khẩu</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Form-->
        </div>
        <!--end::Portlet-->
    </div>
@endsection

@section('script')
@endsection
