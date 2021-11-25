<div>

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
                <p>تأكيد البيانات</p>
            </div>
        </div>
    </div>

    @include('livewire.father_form')

    @include('livewire.mother_form')


    @if ($currentStep != 3)
        <div style="display: none" class="row setup-content" id="step-3">
    @endif
            <div class="col-xs-12">
                <div class="col-md-12" style="margin-top: 35px;">
                    <h3 style="font-family: 'Cairo', sans-serif;">هل انت متاكد من حفظ البيانات ؟</h3><br>
                    <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                            wire:click="back(2)">السابق</button>
                    <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                            type="button">تاكيد</button>
                </div>
            </div>
        </div>

</div>
