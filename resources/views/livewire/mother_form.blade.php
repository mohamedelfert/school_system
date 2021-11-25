@if($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="form-row" style="margin-top: 10px">
                    <div class="col">
                        <label for="mother_name">اسم الام بالعربيه</label>
                        <input type="text" wire:model="mother_name" class="form-control" >
                        @error('mother_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="mother_name_en">اسم الام بالانجليزيه</label>
                        <input type="text" wire:model="mother_name_en" class="form-control" >
                        @error('mother_name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row" style="margin-top: 10px">
                    <div class="col-md-3">
                        <label for="mother_job">وظيفه الام بالعربيه</label>
                        <input type="text" wire:model="mother_job" class="form-control">
                        @error('mother_job')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="mother_job_en">وظيفه الاب بالانجليزيه</label>
                        <input type="text" wire:model="mother_job_en" class="form-control">
                        @error('mother_job_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="mother_id">الرقم القومي</label>
                        <input type="text" wire:model="mother_id" class="form-control">
                        @error('mother_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="mother_passport">رقم الباسبور</label>
                        <input type="text" wire:model="mother_passport" class="form-control">
                        @error('mother_passport')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="mother_phone">رقم الهاتف</label>
                        <input type="text" wire:model="mother_phone" class="form-control">
                        @error('mother_phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row" style="margin-top: 10px">
                    <div class="form-group col-md-6">
                        <label for="mother_nationality_id">الجنسيه</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_nationality_id">
                            <option value="" selected disabled>اختر الجنسيه</option>
                            @foreach($nationalities as $nation)
                                <option value="{{$nation->id}}">{{$nation->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_nationality_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="mother_blood_id">فصيله الدم</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_blood_id">
                            <option value="" selected disabled>اختر فصيله الدم</option>
                            @foreach($bloods as $blood)
                                <option value="{{$blood->id}}">{{$blood->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_blood_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label for="mother_religion_id">الديانه</label>
                        <select class="custom-select my-1 mr-sm-2" wire:model="mother_religion_id">
                            <option value="" selected disabled>اختر الديانه</option>
                            @foreach($religions as $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                            @endforeach
                        </select>
                        @error('mother_religion_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group" style="margin-top: 10px">
                    <label for="exampleFormControlTextarea1">العنوان</label>
                    <textarea class="form-control" wire:model="mother_address" id="exampleFormControlTextarea1" rows="4"></textarea>
                    @error('mother_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                        wire:click="back(1)">السابق</button>

                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button"
                        wire:click="secondStep">التالي</button>

            </div>
        </div>
    </div>
