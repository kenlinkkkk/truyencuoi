@extends('admin.layout')

@section('title')
    <title>Tạo Promotion</title>
@endsection

@section('content_header')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                    Promotion
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Thêm mới
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
        <!--Begin:: App Content-->
        <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">Promotion</h3>
                            </div>
                        </div>

                        <form class="kt-form kt-form--label-right" method="post" action="{{ route('admin.promotion.create') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="kt-portlet__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">Promotion</h3>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Ảnh</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control" type="file" name="picture">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-cl-3 col-lg-3 col-form-label">Url</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control" type="text" name="url">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">Loại</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select name="type" class="form-control">
                                                    <option value="{{ \App\Models\Promotion::POPUP_PROMOTION_TYPE }}">{{ \App\Models\Promotion::POPUP_PROMOTION_NAME }}</option>
                                                    <option value="{{ \App\Models\Promotion::FIX_PROMOTION_LEFT }}">{{ \App\Models\Promotion::FIX_PROMOTION_LEFT_NAME }}</option>
                                                    <option value="{{ \App\Models\Promotion::FIX_PROMOTION_RIGHT }}">{{ \App\Models\Promotion::FIX_PROMOTION_RIGHT_NAME }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-3 col-xl-3">
                                        </div>
                                        <div class="col-lg-8 col-xl-8">
                                            <button type="submit" class="btn btn-success">Thêm</button>&nbsp;
                                            <button type="reset" class="btn btn-secondary">Hủy</button>
                                        </div>
                                        <div class="col-lg-1 col-xl-1">
                                            <a class="btn btn-primary" href="{{ route('admin.promotion.index') }}">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End:: App Content-->
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/crud/file-upload/dropzonejs.js') }}"></script>
@endsection
