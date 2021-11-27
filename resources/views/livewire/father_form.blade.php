@if($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="form-row" style="margin-top: 10px">
                    <div class="col">
                        <label for="email">البريد الالكتروني</label>
                        <input type="email" wire:model="email"  class="form-control">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="password">كلمه المرور</label>
                        <input type="password" wire:model="password" class="form-control" >
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row" style="margin-top: 10px">
                    <div class="col">
                        <label for="father_name">اسم الاب بالعربيه</label>
                        <input type="text" wire:model="father_name" class="form-control" >
                        @error('father_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="father_name_en">اسم الاب بالانجليزيه</label>
                        <input type="text" wire:model="father_name_en" class="form-control" >
                        @error('father_name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row" style="margin-top: 10px">
                    <div class="col-md-3">
                        <label for="father_job">وظيفه الاب بالعربيه</label>
                        <input type="text" wire:model="father_job" class="form-control">
                        @error('father_job')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="father_job_en">وظيفه الاب بالانجليزيه</label>
                        <input type="text" wire:model="father_job_en" class="form-control">
                        @error('father_job_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="father_id">الرقم القومي</label>
                        <input type="text" wire:model="father_id" class="form-control">
                        @error('father_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="father_passport">رقم الباسبور</label>
                        <input type="text" wire:model="father_passport" class="form-control">
                        @error('father_passport')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="father_phone">رقم الهاتف</label>
                        <input type="text" wire:model="father_phone" class="form-control">
                        @error('father_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row" style="margin-top: 10px">
                    <div class="form-group col-md-6">
                        <label for="father_nationality_id">الجنسيه</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="father_nationality_id">
                            <option value="" selected>اختر الجنسيه</option>
                            @foreach($nationalities as $nation)
                                <option value="{{$nation->id}}">{{$nation->name}}</option>
                            @endforeach
                        </select>
                        @error('father_nationality_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="father_blood_id">فصيله الدم</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="father_blood_id">
                            <option value="" selected>اختر فصيله الدم</option>
                            @foreach($bloods as $blood)
                                <option value="{{$blood->id}}">{{$blood->name}}</option>
                            @endforeach
                        </select>
                        @error('father_blood_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="father_religion_id">الديانه</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="father_religion_id">
                            <option value="" selected>اختر الديانه</option>
                            @foreach($religions as $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                            @endforeach
                        </select>
                        @error('father_religion_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleFormControlTextarea1">العنوان</label>
                    <textarea class="form-control" wire:model="father_address" id="exampleFormControlTextarea1" rows="4"></textarea>
                    @error('father_address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                @if($edit_mode)
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStep_edit"
                            type="button">التالي
                    </button>
                @else
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStep"
                            type="button">التالي
                    </button>
                @endif
            </div>
        </div>
    </div>
