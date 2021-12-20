<x-header title="{!!$question->title!!}" css="teacher/course" />

<form action="{{route('teacher.questions.update',[$question->id])}}" method="post" id="test-form" class="container d-flex flex-column">
    @csrf @method('put')
    <label>
        <span class="fw-bold">Title : </span><input type="text" name="title" class="form-control" value="{{$question->title}}">
    </label>
    <label>
        <span class="fw-bold">Question : </span>
        <textarea name="content[question]" cols="30" rows="5" class="form-control">{{$question->content['question']}}</textarea>
    </label>
    <label id="tests" class="my-1">
        <span class="fw-bold">Options :</span>
        <button id="add-option-btn" class="d-inline-block rounded-pill py-1 px-2 border border-dark bg-light">+ option</button><br>
        @foreach($question->content['options'] as $key=>$option)
        <input type="text" name='{{"content[options][$key]"}}' value="{{$option}}" class="form-control my-1 w-75 d-inline-block">
        <button type="button" class="text-danger d-inline-block mx-2 delete-opt-btn">&#8855;</button>
        @endforeach
    </label>
    <label>
        <span class="fw-bold">Correct Answer : </span><input type="number" name="answer[key]" value="{{$question->answer['key']}}" class="form-control">
    </label>
    <label>
        <span class="fw-bold">Score : </span><input type="number" step="0.01" name="score" value="{{$question->score}}" class="form-control">
    </label>

    <input type="submit" value="Update" class="form-control w-25 rounded-pill my-3 align-self-center">
</form>

<script>
    var testLabel = document.getElementById('tests');
    var addoptionbtn = document.getElementById('add-option-btn');
    addoptionbtn.addEventListener('click', function(e) {
        e.preventDefault();
        var newOption = document.createElement('input');
        newOption.setAttribute('type', 'text');
        newOption.setAttribute('name', "content[options][]");
        newOption.setAttribute('class', 'form-control my-1');
        testLabel.appendChild(newOption);
    })

    var deleteoptbtns = document.querySelectorAll(".delete-opt-btn");
    deleteoptbtns.forEach(element => {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            var respectiveIpnput = this.previousElementSibling;
            respectiveIpnput.remove();
            this.remove();
        })
    });
</script>