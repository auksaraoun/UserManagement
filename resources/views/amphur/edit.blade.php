@extends('layouts.app2')
@section('contents')
<div class="container">
	<div class="card mar-top-20">
		<div class="card-body">
			<div class="mar-bot-1" >
				<h1>แก้ไขอำเภอ</h1>
				<span> <a href="/amphur">จัดการอำเภอ</a></span>
				<span>/</span>
				<span>แก้ไขอำเภอ</span>
				<form class="mar-top-20" method="POST" action="/amphur/{{ $data->AMPHUR_ID }}/update" >
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					<div class="form-row">
						<div class="form-group col-md-8">
							<label for="name">ชื่ออำเภอ <span class="dokchan" >*</span></label>
							<input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }} " name="name" id="name" value="{{ $errors->has('name') ? old('name') : $data->AMPHUR_NAME }}" placeholder="ชื่ออำเภอ" required autofocus >

							@if ($errors->has('name	'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>

						<div class="form-group col-md-8">
							<label for="province">จังหวัด <span class="dokchan" >*</span></label>
							<select id="province" class="form-control" name="province" required autofocus >
								<option selected>เลือกจังหวัด</option>
								@if ( $province->count() > 0 )
								@foreach ( $province as $row )
								@if (count($errors) > 0)
								<option value="{{ $row->PROVINCE_ID }}" {{ $row->PROVINCE_ID == old('province') ? 'selected' : '' }} >{{ $row->PROVINCE_NAME }}</option>
								@else
								<option value="{{ $row->PROVINCE_ID }}" {{ $row->PROVINCE_ID == $data->PROVINCE_ID ? 'selected' : '' }} >{{ $row->PROVINCE_NAME }}</option>
								@endif
								@endforeach
								@endif
							</select>
						</div>
						
					</div>

					<div class="form-group" >
						<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
						<a href="/amphur" class="btn btn-warning white"><i class="fas fa-redo"></i> ย้อนกลับ</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	
@endsection