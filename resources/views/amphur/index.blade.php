@extends('layouts.app2')
@section('contents')
<div class="container">
	<div class="jumbotron bg-white">
		<div class="header mar-bot-1" >
			<h1>จัดการอำเภอ</h1>
			<span>จัดการอำเภอ</span>
		</div>
		<div class="row">
			<div class="col-md-8" >
				<form method="GET" action="" >
					<div class="row">
						<label for="search" class="col-sm-12 col-md-2 col-lg-1 col-form-label">ค้นหา</label>
						<div class="input-group col-sm-3 col-md-10 mb-3">
							<input type="text" class="form-control" name="keyword" value="{{ old('keyword') }}" placeholder="ชื่ออำเภอ" aria-describedby="basic-addon2" >
							<div class="input-group-append">
								<button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
							</div>
						</div>

					</div>
				</form>
			</div>

			<div class="col-md-4 text-right">
				<a class="btn-add btn btn-success btn-block-res" href="amphur/create"><i class="fas fa-plus"></i> เพิ่มอำเภอ</a>
			</div>

		</div>
		<div class="table-responsive">
			<table class="table table-hover mar-top-20">
				<thead>
					<tr>
						<th>#</th>
						<th width="60%">ชื่ออำเภอ</th>
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
						<td class="pad-top-20" >{{ $data->AMPHUR_NAME }}</td>
						<td class="text-center" >
							<button type="button" class="btn btn-primary btn-sm btn-block-res" data-toggle="modal" data-target="#data{{ $data->AMPHUR_ID }}"><i class="fas fa-eye"></i> รายละเอียด</button>
							<a class="white btn btn-warning btn-sm btn-block-res" href="amphur/{{ $data->AMPHUR_ID }}/edit"><i class="fas fa-edit"></i> แก้ไข</a>
							<form method="POST" action="amphur/{{ $data->AMPHUR_ID }}/delete" class="btn-block-res inline-block" >
								 {{csrf_field()}}
								 <input name="_method" type="hidden" value="DELETE">
								 <button class="btn btn-danger btn-sm btn-block-res" onclick="return confirmDelete()" type="submit"><i class="fas fa-trash-alt"></i> ลบ</button>
							</form>
						</td>
					</tr>

					<!-- Modal -->
					<div class="modal fade" id="data{{ $data->AMPHUR_ID }}" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="namelabel">ข้อมูลอำเภอ</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group row">
										<label for="lastname" class="col-sm-3 col-form-label">ชื่ออำเภอ <span> : </span></label>
										<div class="col-sm-9">
											<input type="text" readonly class="form-control-plaintext" id="name" value="{{ $data->AMPHUR_NAME }}">
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
					@if ($dataTable->currentPage() != 1)
					<li class="page-item">
						<a class="page-link" href="{{ $dataTable->url(1) }}" aria-label="Previous">
							หน้าแรก
						</a>
					</li>
					@endif
					<li class="page-item {{ ($dataTable->currentPage() == 1) ? ' disabled' : '' }}">
						<a class="page-link" href="{{ $dataTable->url($dataTable->currentPage() - 1 ) }}" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Previous</span>
						</a>
					</li>
					@for ($i = 1; $i <= $dataTable->lastPage(); $i++)
					<?php
					$half_total_links = floor(6 / 2);
					$from = $dataTable->currentPage() - $half_total_links;
					$to = $dataTable->currentPage() + $half_total_links;
					if ($dataTable->currentPage() < $half_total_links) {
						$to += $half_total_links - $dataTable->currentPage();
					}
					if ($dataTable->lastPage() - $dataTable->currentPage() < $half_total_links) {
						$from -= $half_total_links - ($dataTable->lastPage() - $dataTable->currentPage()) - 1;
					}
					?>
					@if ($from < $i && $i < $to)
					<li class="page-item {{ $dataTable->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{ $dataTable->url($i) }}">{{$i}} <span class="sr-only">(current)</span></a></li>
					@endif

					@endfor
					<li class="page-item {{ ($dataTable->currentPage() == $dataTable->lastPage()) ? ' disabled' : '' }}">
						<a class="page-link" href="{{ $dataTable->url($dataTable->currentPage()+1) }}" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							<span class="sr-only">Next</span>
						</a>
					</li>
					@if ($dataTable->currentPage() != $dataTable->lastPage())
					<li class="page-item">
						<a class="page-link" href="{{ $dataTable->url($dataTable->lastPage()) }}" aria-label="Last">
							หน้าสุดท้าย
						</a>
					</li>
					@endif
				</ul>
			</div>
			@endif
		</nav>
	</div>
</div>

@endsection