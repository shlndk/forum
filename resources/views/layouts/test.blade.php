<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест: Вопрос и ответ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5>Ответьте на вопрос</h5>
        </div>
        <div class="card-body">
            <p class="fs-5">Вопрос: <strong>{{$question->question}}</strong></p>

            <form action="{{ route('checkAnswer')}}" method="POST">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <div class="mb-3">
                    <label for="answer" class="form-label">Ваш ответ:</label>
                    <input type="text" class="form-control" id="answer"  name="answer" placeholder="Введите ответ">
                </div>
                <button type="submit" class="btn btn-success">Проверить</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
