@extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                        	<label>Show:</label>
                        	<select id="size-limit" name="limit">
	                        	<option value="20" {{ request()->limit == 20 ? 'selected' : '' }}>20</option>
	                        	<option value="50" {{ request()->limit == 50 ? 'selected' : '' }}>50</option>
	                        	<option value="100" {{ request()->limit == 100 ? 'selected' : '' }}>100</option>
	                        </select>
	                    </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 10px">ID</th>
                                    <th style="min-width: 115px;">Email</th>
                                    <th style="min-width: 100px">Tên</th>
                                    <th style="min-width: 100px">SĐT</th>
                                    <th style="min-width: 100px">Địa chỉ</th>
                                    <th style="min-width: 100px">Lời nhắn</th>
                                    <th style="min-width: 100px;">Ngày đăng ký</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($contacts as $contact)
                                <tr>
                                    <td class="align-middle">{{ $contact->id }}</td>
                                    <td class="align-middle">{{ $contact->email }}</td>
                                    <td class="align-middle">{{ $contact->name }}</td>
                                    <td class="align-middle">{{ $contact->phone }}</td>
                                    <td class="align-middle">{{ $contact->address }}</td>
                                    <td class="align-middle">{{ $contact->content }}</td>
                                    <td class="align-middle">{{ $contact->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {!! $contacts->appends($_GET)->links('pagination.paginate') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection