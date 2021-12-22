<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Repositories\QuestionsRepositoryInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    private $question;
    public function __construct(QuestionsRepositoryInterface $question){
        $this->question = $question;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->question->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->question->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title'           => 'required',
            'title_en'        => 'required',
            'answers'         => 'required',
            'right_answer'    => 'required',
            'score'           => 'required',
            'exam_id'         => 'required',
        ];
        $validate_msg_ar = [
            'title.required'             => 'يجب كتابه السؤال بالعربيه',
            'title_en.required'          => 'يجب كتابه السؤال الانجليزيه',
            'answers.required'           => 'يجب كتابه الاجابات',
            'right_answer.required'      => 'يجب كتابه الاجابه الصحيحه',
            'score.required'             => 'يجب اختيار درجه السؤال',
            'exam_id.required'           => 'يجب اختيار الامتحان',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->question->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->question->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'title'           => 'required',
            'title_en'        => 'required',
            'answers'         => 'required',
            'right_answer'    => 'required',
            'score'           => 'required',
            'exam_id'         => 'required',
        ];
        $validate_msg_ar = [
            'title.required'             => 'يجب كتابه السؤال بالعربيه',
            'title_en.required'          => 'يجب كتابه السؤال الانجليزيه',
            'answers.required'           => 'يجب كتابه الاجابات',
            'right_answer.required'      => 'يجب كتابه الاجابه الصحيحه',
            'score.required'             => 'يجب اختيار درجه السؤال',
            'exam_id.required'           => 'يجب اختيار الامتحان',
        ];
        $data = $this->validate($request,$rules,$validate_msg_ar);

        return $this->question->update($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->question->delete($request);
    }
}
