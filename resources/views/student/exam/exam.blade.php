<x-header title="Student Dashboard" css='dashboard/managerDashboard' />

<body>
    <header class="fixed-top text-center pt-2 w-50">
        <h2>{{$exam->title}} </h2>
        <h4>time : {{$exam->duration}} minute</h4>
    </header>

    <div class="container">

        @if($question[0]->answer)
        <x-test-question :question="$question" />
        @else
        <x-desc-question :question="$question" />
        @endif

    </div>
    <div class="line"></div>
    <div class="pag-btns d-flex justify-content-between px-3 mt-3 w-75 ">
        <a href="{{$question->previousPageUrl()}}" class="rounded-pill px-3 py-1 mt-2 bg-light text-dark">previous</a>

            @if($question->lastPage() == $question->currentPage())
            <form action="{{route('student.finish-exam',[$exam->id])}}" method="post" id="send-answer-form">@csrf
            <input type="submit" class="rounded-pill px-3 py-1 mt-2 bg-light text-dark" value="Finish">
            @else
            <form action="" method="post" id="send-answer-form">@csrf
            <input type="hidden" name="page" value="{{$question->currentPage()+1}}">
            <input type="submit" class="rounded-pill px-3 py-1 mt-2 bg-light text-dark" value="next">
            @endif
        </form>
    </div>





</body>

<style>
    header {
        border-left: 2px solid #333;
        border-right: 2px solid #333;
        margin: auto;
    }

    body {
        background-color: burlywood;
    }

    .pag-btns a:hover {
        background-color: greenyellow !important;
    }

    .line {
        width: 100%;
        height: 3px;
        background-color: #333;
        margin: 3rem 0;
    }

    form input[type=submit] {
        outline: none;
        border: none;
    }

    form input[type=submit]:hover {
        background-color: greenyellow !important;
    }
</style>