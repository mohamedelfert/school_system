<div>

    @if(!empty($successMessages))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessages }}
        </div>
    @endif

    @if($show_table)
        @include('livewire.parents_table')
    @else

        <div style="margin-bottom: 10px;">
            <button type="button" class="modal-effect btn btn-primary" wire:click="hide_add_form">
                <i class="ti-back-right"></i> رجوع للقائمه
            </button>
        </div>

        <hr>

        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                       class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                    <p>بيانات الاب</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                       class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                    <p>بيانات الام</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                       class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                       disabled="disabled">3</a>
                    <p>المرفقات و تأكيد البيانات</p>
                </div>
            </div>
        </div>

        @include('livewire.father_form')

        @include('livewire.mother_form')


        @if ($currentStep != 3)
            <div style="display: none" class="row setup-content" id="step-3">
        @endif
                <div class="col-xs-12">
                    <div class="col-md-12" style="margin-top: 30px;">
                        <label style="color: red">المرفقات :</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" wire:model="photos" accept="image/*" multiple>
                                <label class="custom-file-label" for="inputGroupFile01">اختر الملفات</label>
                            </div>
                        </div>
                        <input type="hidden" wire:model="parent_id">
                        <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                                wire:click="back(2)">السابق</button>
                        @if($edit_mode)
                            <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm_edit"
                                    type="button">تاكيد</button>
                        @else
                            <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                                    type="button">تاكيد</button>
                        @endif
                    </div>
                </div>
            </div>
    @endif
</div>
