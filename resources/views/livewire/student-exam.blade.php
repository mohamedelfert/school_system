<div>
    @if(isset($data[$counter]))
        <h5 class="card-title text-primary">{{ $data[$counter]->title }}</h5>
        @foreach(preg_split('/(-)/', $data[$counter]->answers) as $index => $answer)
            <div class="custom-control custom-radio">
                <input type="radio" id="answer{{ $index }}" name="answer" class="custom-control-input">
                <label class="custom-control-label" for="answer{{ $index }}"
                       wire:click="nextQuestion('{{ $data[$counter]->id }}','{{ $data[$counter]->score }}','{{ $answer }}','{{ $data[$counter]->right_answer }}')">{{ $answer }}</label>
            </div>
        @endforeach
    @else
        <div class="custom-control">
            <h5 class="text-center text-danger">لا يوجد اي أسئله في هذا الاختبار بعد</h5>
        </div>
    @endif
</div>
