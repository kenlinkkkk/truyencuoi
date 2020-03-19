@extends('admin.layout')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content_header')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Quản trị</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <span class="kt-subheader__desc">Thống kê</span>
            </div>
            <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                    <a href="#" class="btn kt-subheader__btn-secondary">Hôm nay</a>
                    <a href="#" class="btn kt-subheader__btn-secondary">1 Tháng</a>
                    <a href="#" class="btn kt-subheader__btn-secondary">1 Năm</a>
                    <a href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="Select dashboard daterange" data-placement="left">
                        <span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">Today</span>&nbsp;
                        <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">Aug 16</span>
                        <i class="flaticon2-calendar-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

@endsection

@section('script')

@endsection
