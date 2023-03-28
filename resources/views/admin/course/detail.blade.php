@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $course->name }}</h3>
                    </div>

                    <div class="card-body">
                        <div class="dd">
                            <ol class="dd-list">
                                <li class="dd-item" data-id="1">
                                    <div class="dd-handle"><h5><b>Phần I</b></h5></div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="4">
                                            <div class="dd-handle"><a href="google.com">Bài 1: Test 1</a></div>
                                        </li>
                                        <li class="dd-item" data-id="5">
                                            <div class="dd-handle">Bài 2: Test 2</div>
                                        </li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="2">
                                    <div class="dd-handle"><h5><b>Phần II</b></h5></div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="6">
                                            <div class="dd-handle">Bài 3: Test 3</div>
                                        </li>
                                        <li class="dd-item" data-id="7">
                                            <div class="dd-handle">Bài 4: Test 4</div>
                                        </li>
                                        <li class="dd-item" data-id="8">
                                            <div class="dd-handle">Bài 5: Test 5</div>
                                        </li>

                                    </ol>
                                </li>
                                <li class="dd-item" data-id="3">
                                    <div class="dd-handle"><h5><b>Phần III</b></h5></div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="4">
                                            <div class="dd-handle">Bài kết thúc</div>
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection