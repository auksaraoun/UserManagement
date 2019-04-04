@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto mar-top-20">
            <div class="card">
                <div class="card-header bg-dark"><span class="white" >สมัครสมาชิก</span></div>
                <div class="card-body">
                    <form class="" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">ชื่อ <span class="dokchan" >*</span></label>

                            <div class="col-md-12">
                                <input id="firstname" type="text" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                @if ($errors->has('firstname'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="col-sm-4 control-label">นามสกุล <span class="dokchan" >*</span></label>

                            <div class="col-md-12">
                                <input id="lastname" type="text" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="tel" class="col-sm-4 control-label">เบอร์โทร <span class="dokchan" >*</span></label>

                            <div class="col-md-12">
                                <input id="tel" type="text" class="form-control {{ $errors->has('tel') ? 'is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" required autofocus>

                                @if ($errors->has('tel'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('tel') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">อีเมลล์ <span class="dokchan" >*</span></label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="email" class="col-sm-4 control-label">ที่อยู่ <span class="dokchan" >*</span></label>

                            <div class="col-md-12">
                                <input id="address" type="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                       
                         <div class="form-group col-md-12 ">
                            <label for="province">จังหวัด <span class="dokchan" >*</span></label>
                            <select id="province" name="province" class="form-control" required autofocus>
                                <option value="">เลือกจังหวัด</option>
                                @if ( $province->count() > 0 )
                                    @foreach ( $province as $row )
                                        <option value="{{ $row->PROVINCE_ID }}" {{ $row->PROVINCE_ID == old('province') ? 'selected' : '' }} >{{ $row->PROVINCE_NAME }}</option>
                                    @endforeach
                                @endif
                            </select>

                             @if ($errors->has('province'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('province') }}</strong>
                            </span>
                            @endif
                        </div>

                         <div class="form-group col-md-12 ">
                            <label for="amphur">อำเภอ <span class="dokchan" >*</span></label>
                            <select id="amphur" name="amphur" class="form-control" required autofocus>
                                <option value="">เลือกอำเภอ</option>
                                @if ( old('province') != '' )
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

                         <div class="form-group col-md-12 ">
                            <label for="zipcode">รหัสไปรษณีย์ <span class="dokchan" >*</span></label>
                            <input type="text" class="form-control {{ $errors->has('zipcode') ? 'is-invalid' : '' }}" name="zipcode" id="zipcode" value="{{ old('zipcode') }}" >

                             @if ($errors->has('zipcode'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('zipcode') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-4 control-label">พาสเวิร์ด <span class="dokchan" >*</span></label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-sm-4 control-label">ยืนยันพาสเวิร์ด <span class="dokchan" >*</span></label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 mx-auto">
                                <button type="submit" class="btn btn-primary">
                                    สมัครสมาชิก
                                </button>
                            </div>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
