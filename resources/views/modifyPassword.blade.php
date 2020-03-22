@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            修改密码
        </h1>
    </section>

    <section class="content">
        <div class="row center">
            <div class="col-xs-offset-3 col-xs-6">
                <div class="box">
                    <div class="box-body">
                        @include('partials.error')
                        @include('partials.success')

                        <form method="post" action="/modifyPassword/{{$id}}">
                            <input type="hidden" name="_method" value="PUT" >
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-offset-2 col-sm-6">
                                        <div id="example1_filter" class="dataTables_filter">
                                            <label>旧密码:
                                                <input type="text" class="form-control input-sm" placeholder=""
                                                       name="old_pw" value="" aria-controls="example1">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-offset-2 col-sm-6">
                                        <div id="example1_filter" class="dataTables_filter">
                                            <label>新密码:
                                                <input type="search" class="form-control input-sm" placeholder=""
                                                       name="new_pw" value="" aria-controls="example1">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-offset-2 col-sm-6">
                                        <div id="example1_filter" class="dataTables_filter">
                                            <label>新密码:
                                                <input type="search" class="form-control input-sm" placeholder=""
                                                       name="new_pw_again" value="" aria-controls="example1">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-10">
                                    <input type="submit" class="bottom btn-primary btn-sm" placeholder="" value="提交" aria-controls="">
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </section>
@stop
