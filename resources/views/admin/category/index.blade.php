@extends('admin.layout')

@section('title')
    <title>Thông tin danh mục</title>
@endsection

@section('content_header')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                    Thông tin danh mục
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        All
                    </a>
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
                        Thông tin danh mục
                    </h3>
                    <div class="col kt-align-right">
                        <a class="btn btn-sm btn-success pt-2" href="{{route('admin.category.add')}}">Thêm mới</a>
                    </div>
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
                                <th scope="col">Short tag</th>
                                <th scope="col">Danh mục cha</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td scope="col">{{ $category->id }}</td>
                                    <td scope="col">{{ $category->name }}</td>
                                    <td scope="col">{{ $category->short_tag }}</td>
                                    <td scope="col">{{ $category->parent_menu == null ? 'null' : $category->parent_menu }}</td>
                                    <td scope="col">
                                        <span class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill kt-badge--rounded">{{ config('variables.product_status')[$category->status]['message'] }}</span>
                                    </td>
                                    <td scope="col">
                                        <form id="form-{{ $category->id }}" method="post" action="{{ route('admin.category.delete', [$category->id]) }}">
                                            @csrf
                                            <a href="{{ route('admin.category.edit', [$category->id]) }}" class="btn btn-success btn-sm">Sửa</a>
                                            <button type="submit" categoryId="{{ $category->id }}"class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                        </form>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("body").on("click", ".btn-delete", function(e){
            e.preventDefault();
            let id = $(this).attr('categoryId');
            swal.fire({
                title: "Bạn có chắc không?",
                text: "Bạn sẽ không thể khôi phục lại thông tin này khi đã xóa!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Đúng! Tôi chắc chắn!",
                cancelButtonText: "Hủy",
                closeOnConfirm: false
            }).then((result) => {
                if (result.value) {
                    $('#form-' + id).submit();
                }
            });
        });
    </script>
@endsection
