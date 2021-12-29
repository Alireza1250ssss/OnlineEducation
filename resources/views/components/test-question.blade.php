<div class="row p-2 bg-light fs-4 fw-bold question">
    {{$question[0]->content['question']}}
</div>
<hr class="my-3">
<h5 class="my-3">choose the correct one :</h5>
<div class="option-container row">
@foreach($question[0]->content['options'] as $key=>$option)
<label class="option d-flex text-wrap justify-content-between align-items-center rounded bg-light text-dark col-7 p-2 m-1 mx-2">
    <span class="fw-bold w-75 text-wrap">{{$option}}</span>
    <input type="radio" name="answer" value="{{$key}}" form="send-answer-form">
</label>
@endforeach
<input type="hidden" name="question_id" value="{{$question[0]->id}}" form="send-answer-form">
</div>

<style>
    .option span{
        overflow-wrap: break-word;
    }
</style>