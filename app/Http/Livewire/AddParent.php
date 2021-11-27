<?php

namespace App\Http\Livewire;

use App\Models\Blood;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\ParentAttachment;
use App\Models\Religion;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParent extends Component
{
    use WithFileUploads;

    public $currentStep = 1;
    public $successMessages = '';

    // father inputs
    public $email,$password,$father_name,$father_name_en,$father_job,$father_job_en,
           $father_id,$father_passport,$father_phone,$father_nationality_id,$father_blood_id,
           $father_religion_id,$father_address,
    // mother inputs
           $mother_name,$mother_name_en,$mother_job,$mother_job_en,
           $mother_id,$mother_passport,$mother_phone,$mother_nationality_id,$mother_blood_id,
           $mother_religion_id,$mother_address;

    public $photos,$show_table = true,$edit_mode = false,$parent_id;

    /**
     * this method for real time validation for this inputs
     */
    public function updated($propertyName)
    {
        $rules = [
            'email'             => 'required|email',
            'father_id'         => 'required|string|min:14|max:14|regex:/[0-9]{9}/',
            'father_passport'   => 'min:9|max:9',
            'father_phone'      => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'mother_id'         => 'required|string|min:14|max:14|regex:/[0-9]{9}/',
            'mother_passport'   => 'min:9|max:9',
            'mother_phone'      => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:11'
        ];
        $validate_messages = [
            'email.required'        => 'يجب كتابه بريد الكتروني',
            'email.email'           => 'يجب ان يكون البريد علي هذه الصيغه ( m@yahoo.com )',
            'father_id.required'    => 'يجب كتابه الرقم القومي',
            'father_id.min'         => 'لا يجب ان يكون الرقم القومي اقل من 14 رقم',
            'father_id.max'         => 'لا يجب ان يكون الرقم القومي اكثر من 14 رقم',
            'father_id.regex'       => 'يجب ان يكون الرقم القومي من ارقام فقط',
            'father_passport.min'   => 'لا يجب ان يكون رقم الباسبور اقل من 9 ارقام',
            'father_passport.max'   => 'لا يجب ان يكون رقم الباسبور اكثر من 9 ارقام',
            'father_phone.regex'    => 'يجب ان يكون رقم الهاتف من ارقام فقط',
            'father_phone.min'      => 'لا يجب ان يكون رقم الهاتف اقل من 11 ارقام',
            'mother_id.required'    => 'يجب كتابه الرقم القومي',
            'mother_id.min'         => 'لا يجب ان يكون الرقم القومي اقل من 14 رقم',
            'mother_id.max'         => 'لا يجب ان يكون الرقم القومي اكثر من 14 رقم',
            'mother_id.regex'       => 'يجب ان يكون الرقم القومي من ارقام فقط',
            'mother_passport.min'   => 'لا يجب ان يكون رقم الباسبور اقل من 9 ارقام',
            'mother_passport.max'   => 'لا يجب ان يكون رقم الباسبور اكثر من 9 ارقام',
            'mother_phone.regex'    => 'يجب ان يكون رقم الهاتف من ارقام فقط',
            'mother_phone.min'      => 'لا يجب ان يكون رقم الهاتف اقل من 11 ارقام',
        ];

        $this->validateOnly($propertyName, $rules,$validate_messages);
    }

    public function render()
    {
        $nationalities = Nationality::all();
        $religions     = Religion::all();
        $bloods        = Blood::all();
        $all_parent    = MyParent::all();
        return view('livewire.add-parent',compact('nationalities','religions','bloods','all_parent'));
    }

    /**
     * this method to show add parent form
     */
    public function show_add_form(){
        $this->show_table = false;
    }

    /**
     * this method to hide add parent form and return to parent table
     */
    public function hide_add_form(){
        $this->show_table = true;
    }

    /**
     * this method for first step fill father inputs and validate all inputs
     */
    public function firstStep(){
        $rules = [
            'email'                   => 'required|email|unique:my_parents,email,'.$this->id,
            'password'                => 'required|min:6',
            'father_name'             => 'required',
            'father_name_en'          => 'required',
            'father_job'              => 'required',
            'father_job_en'           => 'required',
            'father_id'               => 'required|string|min:14|max:14|regex:/[0-9]{9}/|unique:my_parents,father_id,'.$this->id,
            'father_passport'         => 'required|min:9|max:9|unique:my_parents,father_passport,'.$this->id,
            'father_phone'            => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:my_parents,father_phone,'.$this->id,
            'father_nationality_id'   => 'required',
            'father_blood_id'         => 'required',
            'father_religion_id'      => 'required',
            'father_address'          => 'required'
        ];
        $validate_messages = [
            'email.required'                   => 'يجب كتابه بريد الكتروني',
            'email.email'                      => 'يجب ان يكون البريد علي هذه الصيغه ( m@yahoo.com )',
            'email.unique'                     => 'البريد الالكتروني مسجل مسبقا',
            'password.required'                => 'يجب كتابه كلمه مرور',
            'password.min'                     => 'يجب ان تكون كلمه المرور علي الاقل من 6 احرف',
            'father_name.required'             => 'يجب كتابه اسم الاب بالعربيه',
            'father_name_en.required'          => 'يجب كتابه اسم الاب بالانجليزيه',
            'father_job.required'              => 'يجب كتابه وظيفه الاب بالعربيه',
            'father_job_en.required'           => 'يجب كتابه وظيفه الاب بالانجليزيه',
            'father_id.required'               => 'يجب كتابه الرقم القومي',
            'father_id.unique'                 => 'الرقم القومي مسجل مسبقا',
            'father_id.min'                    => 'لا يجب ان يكون الرقم القومي اقل من 14 رقم',
            'father_id.max'                    => 'لا يجب ان يكون الرقم القومي اكثر من 14 رقم',
            'father_id.regex'                  => 'يجب ان يكون الرقم القومي من ارقام فقط',
            'father_passport.required'         => 'يجب كتابه رقم الباسبور',
            'father_passport.unique'           => 'رقم الباسبور مسجل مسبقا',
            'father_passport.min'              => 'لا يجب ان يكون رقم الباسبور اقل من 9 ارقام',
            'father_passport.max'              => 'لا يجب ان يكون رقم الباسبور اكثر من 9 ارقام',
            'father_phone.required'            => 'يجب كتابه رقم الهاتف',
            'father_phone.unique'              => 'رقم الهاتف مسجل مسبقا',
            'father_phone.regex'               => 'يجب ان يكون رقم الهاتف من ارقام فقط',
            'father_phone.min'                 => 'لا يجب ان يكون رقم الهاتف اقل من 11 ارقام',
            'father_nationality_id.required'   => 'يجب اختيار الجنسيه',
            'father_blood_id.required'         => 'يجب اختيار فصيله الدم',
            'father_religion_id.required'      => 'يجب اختيار الديانه',
            'father_address.required'          => 'يجب كتابه العنوان'
        ];
        $this->validate($rules,$validate_messages);

        $this->currentStep = 2;
    }

    /**
     * this method for second step fill mother inputs and validate all inputs
     */
    public function secondStep(){
        $rules = [
            'mother_name'             => 'required',
            'mother_name_en'          => 'required',
            'mother_job'              => 'required',
            'mother_job_en'           => 'required',
            'mother_id'               => 'required|string|min:14|max:14|regex:/[0-9]{9}/|unique:my_parents,mother_id,'.$this->id,
            'mother_passport'         => 'required|min:9|max:9|unique:my_parents,mother_passport,'.$this->id,
            'mother_phone'            => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|unique:my_parents,mother_phone,'.$this->id,
            'mother_nationality_id'   => 'required',
            'mother_blood_id'         => 'required',
            'mother_religion_id'      => 'required',
            'mother_address'          => 'required'
        ];
        $validate_messages = [
            'mother_name.required'             => 'يجب كتابه اسم الام بالعربيه',
            'mother_name_en.required'          => 'يجب كتابه اسم الام بالانجليزيه',
            'mother_job.required'              => 'يجب كتابه وظيفه الام بالعربيه',
            'mother_job_en.required'           => 'يجب كتابه وظيفه الام بالانجليزيه',
            'mother_id.required'               => 'يجب كتابه الرقم القومي',
            'mother_id.unique'                 => 'الرقم القومي مسجل مسبقا',
            'mother_id.min'                    => 'لا يجب ان يكون الرقم القومي اقل من 14 رقم',
            'mother_id.max'                    => 'لا يجب ان يكون الرقم القومي اكثر من 14 رقم',
            'mother_id.regex'                  => 'يجب ان يكون الرقم القومي من ارقام فقط',
            'mother_passport.required'         => 'يجب كتابه رقم الباسبور',
            'mother_passport.unique'           => 'رقم الباسبور مسجل مسبقا',
            'mother_passport.min'              => 'لا يجب ان يكون رقم الباسبور اقل من 9 ارقام',
            'mother_passport.max'              => 'لا يجب ان يكون رقم الباسبور اكثر من 9 ارقام',
            'mother_phone.required'            => 'يجب كتابه رقم الهاتف',
            'mother_phone.unique'              => 'رقم الهاتف مسجل مسبقا',
            'mother_phone.regex'               => 'يجب ان يكون رقم الهاتف من ارقام فقط',
            'mother_phone.min'                 => 'لا يجب ان يكون رقم الهاتف اقل من 11 ارقام',
            'mother_nationality_id.required'   => 'يجب اختيار الجنسيه',
            'mother_blood_id.required'         => 'يجب اختيار فصيله الدم',
            'mother_religion_id.required'      => 'يجب اختيار الديانه',
            'mother_address.required'          => 'يجب كتابه العنوان'
        ];
        $this->validate($rules,$validate_messages);

        $this->currentStep = 3;
    }

    /**
     * this method for save all inputs into database
     */
    public function submitForm(){
        $my_parent = new MyParent();
        $my_parent->email                   = $this->email;
        $my_parent->password                = Hash::make($this->password); // or use bcrypt($this->>password)
        $my_parent->father_name             = ['ar' => $this->father_name,'en' => $this->father_name_en];
        $my_parent->father_job              = ['ar' => $this->father_job,'en' => $this->father_job_en];
        $my_parent->father_id               = $this->father_id;
        $my_parent->father_passport         = $this->father_passport;
        $my_parent->father_phone            = $this->father_phone;
        $my_parent->father_nationality_id   = $this->father_nationality_id;
        $my_parent->father_blood_id         = $this->father_blood_id;
        $my_parent->father_religion_id      = $this->father_religion_id;
        $my_parent->father_address          = $this->father_address;
        $my_parent->mother_name             = ['ar' => $this->mother_name,'en' => $this->mother_name_en];;
        $my_parent->mother_job              = ['ar' => $this->mother_job,'en' => $this->mother_job_en];;
        $my_parent->mother_id               = $this->mother_id;
        $my_parent->mother_passport         = $this->mother_passport;
        $my_parent->mother_phone            = $this->mother_phone;
        $my_parent->mother_nationality_id   = $this->mother_nationality_id;
        $my_parent->mother_blood_id         = $this->mother_blood_id;
        $my_parent->mother_religion_id      = $this->mother_religion_id;
        $my_parent->mother_address          = $this->mother_address;

        $my_parent->save();

        if (!empty($this->photos)){
            foreach ($this->photos as $photo){
                $photo->storeAs($this->father_id ,$photo->getClientOriginalName() ,$disk = 'parent_attach_path');
                ParentAttachment::create([
                    'file_name'  => $photo->getClientOriginalName(),
                    'parent_id'  => MyParent::latest()->first()->id
                ]);
            }
        }

        $this->successMessages = 'تم حفظ البيانات بنجاح';
        $this->clearForm();
        $this->currentStep = 1;
    }

    /**
     * this method for editing
     */
    public function edit($id){
        $this->show_table = false;
        $this->edit_mode  = true;
        $my_parent        = MyParent::where('id',$id)->first();
        $this->parent_id               = $id;
        $this->email                   = $my_parent->email;
        $this->password                = $my_parent->password;
        $this->father_name             = $my_parent->getTranslation('father_name','ar');
        $this->father_name_en          = $my_parent->getTranslation('father_name','en');
        $this->father_job              = $my_parent->getTranslation('father_job','ar');
        $this->father_job_en           = $my_parent->getTranslation('father_job','en');
        $this->father_id               = $my_parent->father_id;
        $this->father_passport         = $my_parent->father_passport;
        $this->father_phone            = $my_parent->father_phone;
        $this->father_nationality_id   = $my_parent->father_nationality_id;
        $this->father_blood_id         = $my_parent->father_blood_id;
        $this->father_religion_id      = $my_parent->father_religion_id;
        $this->father_address          = $my_parent->father_address;
        $this->mother_name             = $my_parent->getTranslation('mother_name','ar');
        $this->mother_name_en          = $my_parent->getTranslation('mother_name','en');
        $this->mother_job              = $my_parent->getTranslation('mother_job','ar');
        $this->mother_job_en           = $my_parent->getTranslation('mother_job','en');
        $this->mother_id               = $my_parent->mother_id;
        $this->mother_passport         = $my_parent->mother_passport;
        $this->mother_phone            = $my_parent->mother_phone;
        $this->mother_nationality_id   = $my_parent->mother_nationality_id;
        $this->mother_blood_id         = $my_parent->mother_blood_id;
        $this->mother_religion_id      = $my_parent->mother_religion_id;
        $this->mother_address          = $my_parent->mother_address;
    }

    /**
     * this method for first step when edit
     */
    public function firstStep_edit(){
        $this->edit_mode   = true;
        $this->currentStep = 2;
    }

    /**
     * this method for second step when edit
     */
    public function secondStep_edit(){
        $this->edit_mode   = true;
        $this->currentStep = 3;
    }

    /**
     * this method for update database when edit
     */
    public function submitForm_edit(){
        if ($this->parent_id){
            $parent = MyParent::find($this->parent_id);
            $parent->update([
                'email'                   => $this->email,
                'father_name'             => ['ar' => $this->father_name,'en' => $this->father_name_en],
                'father_job'              => ['ar' => $this->father_job,'en' => $this->father_job_en],
                'father_id'               => $this->father_id,
                'father_passport'         => $this->father_passport,
                'father_phone'            => $this->father_phone,
                'father_nationality_id'   => $this->father_nationality_id,
                'father_blood_id'         => $this->father_blood_id,
                'father_religion_id'      => $this->father_religion_id,
                'father_address'          => $this->father_address,
                'mother_name'             => ['ar' => $this->mother_name,'en' => $this->mother_name_en],
                'mother_job'              => ['ar' => $this->mother_job,'en' => $this->mother_job_en],
                'mother_id'               => $this->mother_id,
                'mother_passport'         => $this->mother_passport,
                'mother_phone'            => $this->mother_phone,
                'mother_nationality_id'   => $this->mother_nationality_id,
                'mother_blood_id'         => $this->mother_blood_id,
                'mother_religion_id'      => $this->mother_religion_id,
                'mother_address'          => $this->mother_address,
            ]);
        }
        toastr()->success(trans('messages.update'));
        return redirect()->to('/parent');
    }

    /**
     * this method for update database when edit
     */
    public function delete($id){
        MyParent::find($id)->delete();
        toastr()->success(trans('messages.delete'));
        return redirect()->to('/parent');
    }

    /**
     * this method for clear all inputs
     */
    public function clearForm(){
        $this->email = '';
        $this->password = '';
        $this->father_name = '';
        $this->father_name_en = '';
        $this->father_job = '';
        $this->father_job_en = '';
        $this->father_id = '';
        $this->father_passport = '';
        $this->father_phone = '';
        $this->father_nationality_id = '';
        $this->father_blood_id = '';
        $this->father_religion_id = '';
        $this->father_address = '';
        $this->mother_name = '';
        $this->mother_name_en = '';
        $this->mother_job = '';
        $this->mother_job_en = '';
        $this->mother_id = '';
        $this->mother_passport = '';
        $this->mother_phone = '';
        $this->mother_nationality_id = '';
        $this->mother_blood_id = '';
        $this->mother_religion_id = '';
        $this->mother_address = '';
        $this->photos = '';
    }

    /**
     * this method for return to back
     */
    public function back($step){
         $this->currentStep = $step;
    }
}
