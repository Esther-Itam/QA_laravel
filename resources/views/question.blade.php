<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Q&A</title>
</head>
<body>
    @if($question['type'] === 'text')
    <div>
        <h2 class='test'>{{$question['label']}} ? </h2>
        <div>
            @foreach ($question['answers'] as $answer)
                <label value='repondre'></label>
                <input type='text'></input>
                <span>{{$answer['label']}}</span>
            @endforeach
        </div>
    </div>

    @elseif($question['type'] === 'radio')
    <div>
        <h2 class='test'>{{$question['label']}} ? </h2>
        <div>
            @foreach ($question['answers'] as $answer)
                <input type='radio'></input>
                <span>{{$answer['label']}}</span>
            @endforeach
        </div>
    </div>

    @else
    <div>
        <h2 class='test'>{{$question['label']}} ? </h2>
        <div>
            @foreach ($question['answers'] as $answer)
                <input type='checkbox'></input>
                <span>{{$answer['label']}}</span>
            @endforeach
        </div>
    </div>
    @endif
</body>
</html>