@extends('layouts.app2')
@section('contents')
<div class="container">
	<div class="jumbotron bg-white">
		<div class="header mar-bot-1" >
			<h1>จัดการสมาชิก</h1>
			<span>จัดการสมาชิก</span>
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
				<a class="btn-add btn btn-success btn-block-res" href="/user/create"><i class="fas fa-plus"></i> เพิ่มสมาชิก</a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="table-responsive">
					<table class="table table-hover mar-top-20">
						<thead>
							<tr>
								<th>#</th>
								<th>ชื่อ</th>
								<th>นามสกุล</th>
								<th>เบอร์โทร</th>
								<th>อีเมลล์</th>
								<th>ที่อยู่</th>
								<th>ตัวเลือก</th>
							</tr>
						</thead>
						<tbody>
							@if ($dataTable->count() > 0)
							@foreach ($dataTable as $row =>$data)
							<tr>
								<td class="pad-top-20" >{{ $row+1 }}</td>
								<td class="pad-top-20" >{{ $data->firstname }}</td>
								<td class="pad-top-20" >{{ $data->lastname }}</td>
								<td class="pad-top-20" >{{ $data->tel }}</td>
								<td class="pad-top-20" >{{ $data->email }}</td>
								<td class="pad-top-20" >{{ $data->address }}</td>
								<td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#data{{ $data->id }}"><i class="fas fa-eye"></i> รายละเอียด</button></td>
							</tr>

							<!-- Modal -->
							<div class="modal fade" id="data{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="namelabel">ข้อมูลสมาชิก</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="form-group row">
												<label for="firstname" class="col-sm-3 col-4 col-form-label">ชื่อ <span> : </span></label>
												<div class="col-sm-9 col-8">
													<input type="text" readonly class="form-control-plaintext" id="firstname" value="{{ $data->firstname }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="lastname" class="col-sm-3 col-4 col-form-label">นามสกุล <span> : </span></label>
												<div class="col-sm-9 col-8">
													<input type="text" readonly class="form-control-plaintext" id="lastname" value="{{ $data->lastname }}">
												</div>	
											</div>
											<div class="form-group row">
												<label for="lastname" class="col-sm-3 col-4 col-form-label">โทรศัพท์ <span> : </span></label>
												<div class="col-sm-9 col-8">
													<input type="text" readonly class="form-control-plaintext" id="tel" value="{{ $data->tel }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="lastname" class="col-sm-3 col-4 col-form-label">email <span> : </span></label>
												<div class="col-sm-9 col-8">
													<input type="text" readonly class="form-control-plaintext" id="email" value="{{ $data->email }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="lastname" class="col-sm-3 col-4 col-form-label">ที่อยู่ <span> : </span></label>
												<div class="col-sm-9 col-8">
													<input type="text" readonly class="form-control-plaintext" id="address" value="{{ $data->address }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="lastname" class="col-sm-3 col-4 col-form-label">อำเภอ <span> : </span></label>
												<div class="col-sm-9 col-8">
													<input type="text" readonly class="form-control-plaintext" id="amphur" value="{{ $data->AMPHUR_NAME }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="lastname" class="col-sm-3 col-4 col-form-label">จังหวัด <span> : </span></label>
												<div class="col-sm-9 col-8">
													<input type="text" readonly class="form-control-plaintext" id="province" value="{{ $data->PROVINCE_NAME }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="lastname" class="col-sm-3 col-4 col-form-label">ไปรษณีย์ <span> : </span></label>
												<div class="col-sm-9 col-8">
													<input type="text" readonly class="form-control-plaintext" id="zipcode" value="{{ $data->zipcode }}">
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
			</div>

		</div>

		<nav aria-label="Page navigation example">
			@if ($dataTable->lastPage() > 1)
			<ul class="pagination">
				<li class="page-item {{ ($dataTable->currentPage() == 1) ? ' disabled' : '' }}">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
				</li>
				@for ($i = 1; $i <= $dataTable->lastPage(); $i++)
				<li class="page-item {{ $dataTable->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{ $dataTable->url($i) }}">{{$i}}</a></li>
				@endfor
				<li class="page-item {{ ($dataTable->currentPage() == $dataTable->lastPage()) ? ' disabled' : '' }}">
					<a class="page-link" href="{{ $dataTable->url($dataTable->currentPage()+1) }}" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul>
			@endif
		</nav>

	</div>
</div>

@endsection