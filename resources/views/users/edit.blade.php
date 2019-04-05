@extends('layouts.app2')
@section('contents')
<div class="container">
	<div class="card mar-top-20">
		<div class="card-body">
			<div class="mar-bot-1" >
				<h1>แก้ไขสมาชิก</h1>
				<span><a href="/user">จัดการสมาชิก</a></span>
				<span>/</span>
				<span>แก้ไขสมาชิก</span>
				<form class="mar-top-20" method="POST" action="/user/{{ $data->id }}/update" >
					{{ method_field('PATCH') }}
					{{ csrf_field() }}
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="firstname">ชื่อ <span class="dokchan" >*</span></label>
							<input type="text" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }} " name="firstname" id="firstname" value="{{ $errors->has('firstname') ? old('firstname') : $data->firstname }}" placeholder="ชื่อ" required autofocus >

							@if ($errors->has('firstname'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('firstname') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group col-md-6">
							<label for="lastname">นามสกุล <span class="dokchan" >*</span></label>
							<input type="text" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }} " name="lastname" id="lastname" value="{{ $errors->has('lastname') ? old('lastname') : $data->lastname }}" placeholder="นามสกุล" required autofocus >

							@if ($errors->has('lastname'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('lastname') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group col-md-6">
							<label for="tel">เบอร์โทรศัพท์ <span class="dokchan" >*</span></label>
							<input type="text" class="form-control {{ $errors->has('tel') ? 'is-invalid' : '' }} " name="tel" id="tel" value="{{ $errors->has('tel') ? old('tel') : $data->tel }}" placeholder="เบอร์โทรศัพท์" required autofocus >

							@if ($errors->has('tel'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('tel') }}</strong>
							</span>
							@endif
						</div>
						<div class="form-group col-md-6">
							<label for="email	">อีเมลล์ <span class="dokchan" >*</span></label>
							<input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} " name="email" id="email" value="{{ $errors->has('email') ? old('email') : $data->email }}" placeholder="อีเมลล์" required autofocus >

							@if ($errors->has('email'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="address">ที่อยู่ <span class="dokchan" >*</span></label>
						<input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }} " name="address" id="address" value="{{ $errors->has('address') ? old('address') : $data->address }}" placeholder="ที่อยู่" required autofocus >

						@if ($errors->has('address'))
						<span class="invalid-feedback">
							<strong>{{ $errors->first('address') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-row">
						<div class="form-group col-md-3">
							<label for="province">จังหวัด <span class="dokchan" >*</span></label>
							<select id="province" class="form-control" name="province" required autofocus >
								<option selected>เลือกจังหวัด</option>
								@if ( $province->count() > 0 )
								@foreach ( $province as $row )
								@if (count($errors) > 0)
								<option value="{{ $row->PROVINCE_ID }}" {{ $row->PROVINCE_ID == old('province') ? 'selected' : '' }} >{{ $row->PROVINCE_NAME }}</option>
								@else
								<option value="{{ $row->PROVINCE_ID }}" {{ $row->PROVINCE_ID == $data->province ? 'selected' : '' }} >{{ $row->PROVINCE_NAME }}</option>
								@endif
								@endforeach
								@endif
							</select>
						</div>

						<div class="form-group col-md-3 ">
							<label for="amphur">อำเภอ <span class="dokchan" >*</span></label>
							<select id="amphur" name="amphur" class="form-control" required autofocus>
								<option value="">เลือกอำเภอ</option>
								@if ( old('province') == '' )
								<?php 
								$amphurs = $amphur->where('PROVINCE_ID',$data->province)->all();
								?>
								@if ( $amphurs > 0 )
								@foreach ( $amphurs as $row  )
								<option value="{{ $row->AMPHUR_ID }}" {{ $row->AMPHUR_ID == $data->amphur ? 'selected' : '' }} >{{ $row->AMPHUR_NAME }}</option>
								@endforeach
								@endif

								@else ( old('province') != '' )
								<?php 
								$amphurs = $amphur->where('PROVINCE_ID',old('province'))->all();
								?>
								@if ( $amphurs > 0 )
								@foreach ( $amphurs as $row  )
								<option value="{{ $row->AMPHUR_ID }}" {{ $row->AMPHUR_ID == old('amphur') ? 'selected' : '' }} >{{ $row->AMPHUR_NAME }}</option>
								@endforeach
								@endif
								@endif

							</select>

							@if ($errors->has('amphur'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('amphur') }}</strong>
							</span>
							@endif
						</div>

						<div class="form-group col-md-3">
							<label for="zipcode">รหัสไปรษณีย์ <span class="dokchan" >*</span></label>
							<input type="text" class="form-control {{ $errors->has('zipcode') ? 'is-invalid' : '' }}" name="zipcode" id="zipcode" value="{{ $errors->has('zipcode') ? old('zipcode') : $data->zipcode }}" placeholder="รหัสไปรษณีย์" required autofocus >

							@if ($errors->has('zipcode'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('zipcode') }}</strong>
							</span>
							@endif
						</div>


						<div class="form-group col-md-3">
							<label for="password">รหัสผ่าน <span class="dokchan" >*</span></label>
							<input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password" value="{{ old('password') }}" autofocus >

							@if ($errors->has('password'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif
						</div>

					</div>
					<div class="form-group" >
						<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
						<a href="/user" class="btn btn-warning white"><i class="fas fa-redo"></i> ย้อนกลับ</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	
@endsection