@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.contend-header', ['name' => 'category', 'key' => 'Add'])
        <div class="content">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Quick Example</h3>
                                </div>
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên danh mục</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                                        </div>
                                        <div class="form-group">
                                            <label>Chon danh muc cha</label>
                                            <select class="form-control select2" style="width: 100%;">
                                                <option value="0" selected="selected">Chon danh muc cha</option>
                                                {!! $htmlOptiont !!}
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
