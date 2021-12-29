<x-header title="Correcting Section" css="teacher/course" />

<header class="fixed-top p-2 text-center">
@if(session('status'))
<p class="text-success">{{session('status')}}</p>
@endif
</header>
<form action="" method="post" class="d-flex flex-column align-items-center w-100">@csrf
    @php $i=0; @endphp
@foreach($questions as $question)
@if(!isset($question->answer))
<div class="question-item my-2 p-3">
    <p>{{$question->content['question']}}</p><hr>
    <textarea class="p-1"  cols="30" rows="4" disabled>{{$responses[$question->id]->answer}}</textarea>
    <input type="hidden" name="ceil[]" value="{{$question->temp_score}}">
    <div class="score-details my-1 d-flex justify-content-around">
        <span>ceil of Score : {{$question->temp_score}}</span>
        <input type="number" name="score[]" step='0.01' value="0">
        @error('score.'.$i)<span class="text-danger">{{$message}}</span>@enderror
        @php $i++; @endphp
    </div>
</div>
@endif
@endforeach
<button type="submit" class="rounded-pill px-2 py-1 bg-info my-2">Set Scores</button>
</form>
<style>
    
    .question-item{
        width: 50%;
        background-color: rgba(255, 212, 128,0.7);
    }
    .question-item textarea{
        background-color: rgb(255, 247, 230);
        outline: none;
        border: 1px solid #333;
        border-radius: 0.3rem;
        font-size: 1.2rem;
    }
</style>