@extends('layouts.app2')
@section('contents')
<div class="container">
	<div class="jumbotron bg-white">
		<div class="header mar-bot-1" >
			<h1>จัดการจังหวัด</h1>
			<span>จัดการจังหวัด</span>
		</div>
		<div class="row">
			<div class="col-md-8" >
				<form method="GET" action="" >
					<div class="row">
						<label for="search" class="col-sm-12 col-md-2 col-lg-1 col-form-label">ค้นหา</label>
						<div class="input-group col-sm-3 col-md-10 mb-3">
							<input type="text" class="form-control" name="keyword" value="{{ old('keyword') }}" aria-describedby="basic-addon2" >
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
							</div>
						</div>

					</div>
				</form>
			</div>

			<div class="col-md-4 text-right">
				<a class="btn btn-success btn-block-res" href="/province/create"><i class="fas fa-plus"></i> เพิ่มจังหวัด</a>
			</div>

		</div>
		<div class="table-responsive mar-top-20">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th class="wid-res">ชื่อจังหวัด</th>
						<th class="text-center" >ตัวเลือก</th>
					</tr>
				</thead>
				<tbody>
					@if ($dataTable->count() > 0)
					<?php $i = ($dataTable->currentPage()-1)* $dataTable->perPage() + 1;?>
					@foreach ($dataTable as $row =>$data)
					<tr>
						<td class="pad-top-20" >
							{{ $i++ }}
						</td>
						<td class="pad-top-20" >{{ $data->PROVINCE_NAME }}</td>
						<td class="text-center" >
							<button type="button" class="btn btn-primary btn-sm btn-table pad-left-15" data-toggle="modal" data-target="#data{{ $data->PROVINCE_ID }}">
								<i class="fas fa-eye"></i> รายละเอียด
							</button>
							<a href="/province/{{ $data->PROVINCE_ID }}/amphur" class="btn btn-info btn-sm" >
								<span class="white" ><i class="fas fa-tasks"></i> จัดการอำเภอ</span>
							</a>
						</td>
					</tr>
					<!-- Modal -->
					<div class="modal fade" id="data{{ $data->PROVINCE_ID }}" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="namelabel">ข้อมูลจังหวัด</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group row">
										<label for="province" class="col-sm-3 col-5 col-form-label">ชื่อจังหวัด <span> : </span></label>
										<div class="col-sm-9 col-7">
											<input type="text" readonly class="form-control-plaintext" id="province" value="{{ $data->PROVINCE_NAME }}">
										</div>	
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>

		<nav>
			@if ($dataTable->lastPage() > 1)
			<div class="nav-scroller py-1 mb-2">
				<ul class="pagination pagination-sm flex-sm-wrap">
					<li class="page-item {{ ($dataTable->currentPage() == 1) ? ' disabled' : '' }}">
						<a class="page-link" href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Previous</span>
						</a>
					</li>
					@for ($i = 1; $i <= $dataTable->lastPage(); $i++)
					<li class="page-item {{ $dataTable->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{ $dataTable->url($i) }}">{{$i}} <span class="sr-only">(current)</span></a></li>
					@endfor
					<li class="page-item {{ ($dataTable->currentPage() == $dataTable->lastPage()) ? ' disabled' : '' }}">
						<a class="page-link" href="{{ $dataTable->url($dataTable->currentPage()+1) }}" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							<span class="sr-only">Next</span>
						</a>
					</li>
				</ul>
			</div>
			@endif
		</nav>

	</div>
</div>

@endsection