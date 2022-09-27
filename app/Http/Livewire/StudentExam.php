<?php

namespace App\Http\Livewire;

use App\Models\Degree;
use App\Models\Question;
use Livewire\Component;

class StudentExam extends Component
{
    public $exam_id, $student_id, $data, $counter = 0, $questionsCount = 0;

    public function render()
    {
        // get data ( all questions for specified exam )
        $this->data = Question::where('exam_id', $this->exam_id)->get();
        // get count of all questions
        $this->questionsCount = $this->data->count();
        return view('livewire.student-exam', ['data']);
    }

    public function nextQuestion($question_id, $score, $answer, $right_answer)
    {
        // get student degrees
        $studentDegree = Degree::where('student_id', $this->student_id)
            ->where('exam_id', $this->exam_id)
            ->first();

        if ($studentDegree === null) {

            // insert new degree if no degree for student in this exam
            $degree = new Degree();
            $degree->exam_id = $this->exam_id;
            $degree->student_id = $this->student_id;
            $degree->question_id = $question_id;
            /*
             * strcmp(string1 , string2 , ...) this for comparison
             * Returns < 0 if string1 is less than string2; > 0 if string1 is greater than string2, and 0 if they are equal
             * */
            if (strcmp(trim($answer), trim($right_answer)) === 0) {
                $degree->score += $score;
            } else {
                $degree->score += 0;
            }
            $degree->date = date('Y-m-d');
            $degree->save();

        } else {

            if ($studentDegree->question_id >= $this->data[$this->counter]->id) {

                $studentDegree->score = 0;
                $studentDegree->abuse = 1;
                $studentDegree->save();
                toastr()->warning(trans('تم اكتشاف تلاعب في النظام وتم إلغاء الامتحان'));
                return redirect()->to('student-exams');

            } else {

                // update if student has degree
                $studentDegree->question_id = $question_id;
                if (strcmp(trim($answer), trim($right_answer)) == 0) {
                    $studentDegree->score += $score;
                } else {
                    $studentDegree->score += 0;
                }
                $studentDegree->save();

            }

        }

        // this for next question or end exam بتشوف السؤال التالي علي حسب عدد الأسئلة اللي جاي وتزود تجيب اللي بعده أو تنهي الأسئلة تخرج
        if ($this->counter < $this->questionsCount - 1) {
            $this->counter++;
        } else {
            toastr()->success(trans('تم إجراء الامتحان بنجاح'));
            return redirect()->to('student-exams');
        }
    }
}
