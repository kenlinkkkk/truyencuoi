@extends('admin.layout')

@section('title')
    <title>Thông tin bài viết</title>
@endsection

@section('stylesheet')
    <link href="{{ asset('assets/admin/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content_header')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                    Thông tin bài viết
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
                        Thông tin bài viết
                    </h3>
                    <div class="col kt-align-right">
                        <a class="btn btn-sm btn-success pt-2" href="{{route('admin.post.add')}}">Thêm mới</a>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <!--begin::Section-->
                <div class="kt-section">
                    <div class="kt-section__content ">
                        <table class="table" id="kt_table_1">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Short tag</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Loại</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ngày đăng</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td scope="col">{{ $post->id }}</td>
                                    <td scope="col">{{ $post->name }}</td>
                                    <td scope="col">{{ $post->short_tag }}</td>
                                    <td scope="col">{{ $post->category->name }}</td>
                                    <td scope="col">
                                        <span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill kt-badge--rounded">
                                            {{ $post->type == 0  ? \App\Models\Post::FREE_CONTENT_MESSAGE : \App\Models\Post::PAY_CONTENT_MESSAGE }}
                                        </span>
                                    </td>
                                    <td scope="col">
                                        <span class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill kt-badge--rounded">{{ config('variables.product_status')[$post->status]['message'] }}</span>
                                    </td>
                                    <td scope="col">{{ $post->created_at }}</td>
                                    <td scope="col">
                                        <form id="form-{{ $post->id }}" method="post" action="{{ route('admin.post.delete', [$post->id]) }}">
                                            @csrf
                                            <a href="{{ route('admin.post.edit', [$post->id]) }}" class="btn btn-success btn-sm">Sửa</a>
                                            <button type="submit" postId="{{ $post->id }}"class="btn btn-danger btn-sm btn-delete">Xóa</button>
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
    <script href="{{ asset('assets/admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script href="{{ asset('assets/admin/js/pages/crud/datatables/basic/basic.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("body").on("click", ".btn-delete", function(e){
            e.preventDefault();
            let id = $(this).attr('postId');
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
