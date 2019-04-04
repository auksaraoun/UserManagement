@extends('layouts.app2')
@section('contents')
<div class="container">
	<div class="card mar-top-20">
		<div class="card-body">
			<div class="mar-bot-1" >
				<h1>เพิ่มอำเภอ</h1>
				<span><a href="/province">จัดการจังหวัด</a></span>
				<span>/</span>
				<span>{{ $province->PROVINCE_NAME }}</span>
				<span>/</span>
				<span> <a href="/province/{{ $province->PROVINCE_ID }}/amphur">จัดการอำเภอ</a></span>
				<span>/</span>
				<span>เพิ่มอำเภอ</span>
				<form class="mar-top-20" method="POST" action="/province/{{ $province->PROVINCE_ID }}/amphur/store" >
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="name">ชื่ออำเภอ <span class="dokchan" >*</span></label>
							<input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} " name="name" id="name" value="{{ old('name') }}" placeholder="ชื่ออำเภอ" required autofocus >

							@if ($errors->has('name	'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>
						
					</div>
					<div class="form-group" >
						<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
						<a href="/province/{{ $province->PROVINCE_ID }}/amphur" class="btn btn-warning white"><i class="fas fa-redo"></i> ย้อนกลับ</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	
@endsection