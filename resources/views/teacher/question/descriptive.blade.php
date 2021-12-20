<x-header title="{!!$question->title!!}" css="teacher/course" />

  <form action="{{route('teacher.questions.update',[$question->id])}}" method="post" id="descriptive-form" 
  class="container d-flex flex-column">
        @csrf @method('put')
        <label>
            <span class="fw-bold">Title : </span><input type="text" name="title" value="{{$question->title}}" class="form-control">
        </label>
        <label>
            <span class="fw-bold">Question : </span>
            <textarea name="content[question]" cols="30" rows="5" class="form-control">{{$question->content['question']}}</textarea>
        </label>
        <label>
            <span class="fw-bold">Score : </span><input type="number" step="0.01" name="score" value="{{$question->score}}" class="form-control">
        </label>
        <input type="submit" value="Update" class="form-control w-25 rounded-pill align-self-center my-3">
    </form>