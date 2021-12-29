<div class="row p-2 bg-light fs-4 fw-bold question">
    {{$question[0]->content['question']}}
</div>
<hr class="my-3">
<h5>answer here :</h5>
<textarea name="answer" form="send-answer-form"  cols="30" rows="7" class="w-100 p-3 "></textarea>
<input type="hidden" name="question_id" value="{{$question[0]->id}}" form="send-answer-form">

<style>
    .question{
        box-shadow: 0 0 1rem gray;
    }
    textarea{
        font-size: 1.2rem;
    }
</style>