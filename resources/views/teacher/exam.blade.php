<div class="add-question py-3 my-4">
    <h4><span>Add a New Question : </span>
        <select  id="question-type" >
            <option value="test-form">Test</option>
            <option value="descriptive-form">Descriptive</option>
        </select>
    </h4>
    <form action="{{route('teacher.questions.store')}}" method="post" id="descriptive-form" class="d-none">
        @csrf 
        <label>
            <span>Title : </span><input type="text" name="title" class="form-control">
        </label>
        <label>
            <span>Question : </span><textarea name="content[question]" cols="30" rows="5" class="form-control"></textarea>
        </label>
        <label>
            <span>Score : </span><input type="number" step="0.01" name="score" class="form-control">
        </label>
        <input type="hidden" name="type" value="descriptive"> <input type="hidden" name="course_id" value="{{$exam->course->id}}">
        <input type="hidden" name="exam_id" value="{{$exam->id}}">
        <input type="submit" value="Create" class="form-control w-25 rounded-pill">
    </form>

    <form action="{{route('teacher.questions.store')}}" method="post" id="test-form" class="">
        @csrf 
        <label>
            <span>Title : </span><input type="text" name="title" class="form-control">
        </label>
        <label>
            <span>Question : </span><textarea name="content[question]" cols="30" rows="5" class="form-control"></textarea>
        </label>
        <label id="tests">
            <span>Options :</span>
            <button id="add-option-btn" class="d-inline-block rounded-pill p-1 bg-light">+ option</button>
            <input type="text" name="content[options][1]" class="form-control my-1">
        </label>
        <label>
            <span>Correct Answer : </span><input type="number" name="answer[key]" class="form-control">
        </label>
        <label>
            <span>Score : </span><input type="number" step="0.01" name="score" class="form-control">
        </label>
        <input type="hidden" name="type" value="test"> <input type="hidden" name="course_id" value="{{$exam->course->id}}">
        <input type="hidden" name="exam_id" value="{{$exam->id}}">
        <input type="submit" value="Create" class="form-control w-25 rounded-pill">
    </form>

    
</div>
<div class="row">
<div class="question-bank col-12 col-md-8  d-inline-flex flex-column p-3">
    <h3>{{$exam->course->title." Question Bank"}}</h3>
    @foreach($exam->course->questions as $question)
    @if(!in_array($question->id,$exam->questions()->pluck('questions.id')->toArray()))
    <div class="row align-items-center my-1">

    <div class="Q-item d-flex justify-content-between align-items-center my-1 col-12 col-sm-8">
        <span>{{$question->title}}</span>
        <input type="checkbox" name="question_id[]" value="{{$question->id}}" form="bank-q">
    </div>

    <div class="col-12 col-sm-3 d-inline-flex justify-content-around">
    <form action="{{route('teacher.questions.edit',[$question->id])}}" method="GET" class="d-inline-block ">
     <input type="submit" value="Edit" class="bg-primary rounded-pill px-2">
    </form>
    <form action="{{route('teacher.questions.destroy',[$question->id])}}" method="post" class="d-inline-block ">
        @csrf @method('delete') <input type="submit" value="Delete" class="bg-danger rounded-pill px-2">
    </form>
    </div>

    </div>
    @endif
    @endforeach
    <div class="row">
    <form action="{{route('teacher.exam-question',[$exam->id])}}" method="post" class="my-3 col-8" id="bank-q">
        @csrf
        <input type="submit" value="Add To Exam" class="bg-primary px-2 py-1 rounded-pill ">
    </form>
    </div>
</div>

<div class="exam-questions col-12 col-md-4 d-inline-flex flex-column p-3">
    <h3>Exam's Questions</h3>
    <h5>Select To Remove</h5>
    @foreach($exam->questions as $question)
    <div class="Q-item d-flex justify-content-between align-items-center my-1">
        <span>{{$question->title}}</span>
        <input type="checkbox" name="question_id[]" value="{{$question->id}}" form="exam-q">
    </div>
    @endforeach
    <form action="{{route('teacher.exam-question',[$exam->id])}}" method="post" class="mt-2" id="exam-q">
        @csrf
        <input type="submit" value="Remove From Exam" class="bg-danger rounded-pill px-2">
    </form>
</div>
</div>