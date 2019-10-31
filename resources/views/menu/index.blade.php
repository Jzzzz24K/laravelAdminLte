@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <style>
      .select2-container .select2-selection--single{
          height:34px;
          line-height: 34px;
          border: 1px solid #ccc;
      }
    </style>
@stop
@section('content')
    <section class="content-header">
        <h1>
            菜单管理
            {{--            <small>advanced tables</small>--}}
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> 系统</li>
            <li>系统设置</li>
            <li>菜单管理</li>
        </ol>
    </section>

    <section class="content">
        @include('partials.success')
        @include('partials.error')

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <button id="addMenu" class="dataTables_filter btn btn-primary" data-toggle="modal"
                                            data-target="#modal-create" type="button"><i class="fa fa-fw fa-plus"></i>添加菜单</button>
                                </div>
                            </div>
                        </div>
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap" style="margin-top: 1em;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="menu" class="table table-bordered table-striped dataTable"
                                           role="grid"
                                           aria-describedby="example1_info" style="min-width: 980px;">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="menu">
                                                菜单名称
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="menu">
                                                图标
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="menu">
                                                链接
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="menu">
                                                等级
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="menu">
                                                状态
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="menu">
                                                操作
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
{{--                                        {!! $html !!}--}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('menu.delete')
        @include('menu.edit')
        @include('menu.create')
    </section>
@stop
@section('scripts')
    <script src="{{asset('js/select2.full.js')}}"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
    <script>
        $(function(){
            $('#menu').DataTable({
                'paging'      : false,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : false,
                'info'        : false,
                'autoWidth'   : true,
                'scrollX'     : true,
            });
            $(".del").click(function (e) {
                $("#modal-del").modal("show");
                let id = $(e.target).data('id');
                $('.delete-menu').attr('action','menu/'+id);
                $('#menu-name').text($(e.target).data('title'));
            });
            $(".edit").click(function (e) {
                $("#modal-edit").modal("show");
                $(".menu-form").attr("action",'menu/'+ $(e.target).data("id"));
                $("#title").attr("value", $(e.target).data("title"));
                $("#position").attr("value", $(e.target).data("position"));
                $("#url").attr("value", $(e.target).data("url"));
                $("#icon").attr("value", $(e.target).data("icon"));
            });
            $('#addMenu').click(function(){
                $(".menu-title").text('创建菜单');
                $("#modal-create").show();
            });
            $('.addChildMenu').click(function(e){
                $(".menu-title").text('添加子分类');
                $("#modal-create").show();
                $(".parentid").attr('value',$(e.target).data('id'));
            });
            // $('.modal').on('show.bs.modal', function(){
            //     var $this = $(this);
            //     var $modal_dialog = $this.find('.modal-dialog');
            //     // 关键代码，如没将modal设置为 block，则$modala_dialog.height() 为零
            //     $this.css('position', 'fixed');
            //     $modal_dialog.css({'margin-top': ($(window).height() - $modal_dialog.height()) / 2});
            // });
            $('.select2').select2();

        });

    </script>
@stop
