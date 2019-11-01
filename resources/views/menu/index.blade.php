@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
{{--    <link rel="stylesheet" href="{{asset('css/icheck.blue.css')}}">--}}
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
                        <table id="menu" class="table table-bordered table-striped" style="margin-top:1em;">
                            <thead>
                            <tr>
                                <th>菜单名称</th>
                                <th>链接</th>
                                <th>图标</th>
                                <th>所属角色</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pmenus as $menu)
                                <tr>
                                    <td>{{$menu->name}}</td>
                                    <td>{{$menu->url}}</td>
                                    <td>{{$menu->icon}}</td>
                                    <td>暂无</td>
                                    <td>{{$menu->status}}</td>
                                    <td>编辑 删除</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
    <script src="{{asset('js/icheck.js')}}"></script>
    <script>
        $(function(){
            $('#menu').DataTable({
                'paging'      : false,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : false,
                'info'        : false,
                'autoWidth'   : true,
                'scrollX'     : false,
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

            $('.select2').select2();

            $('input[type="radio"].minimal').iCheck({
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });

        });

    </script>
@stop
