<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Q&A</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(to right, red, yellow);
            display:flex;
            justify-content:center;
            
        }
        .container{
            width:800px;
            background-color:white;
            border-radius:5px;
            border:2px solid white;
            margin-top:300px;
            padding-top:30px;
            padding-left:80px;
            padding-bottom:80px;
            color:orangered;

        }
        .container li{
            list-style-type:none;
            font-size:20px;
        }

    </style>
</head>
<body>
    
    <div class="container">
        
    @if($question['type'] === 'text')
    <div>
        <h2 class='test'>{{$question['label']}} ? </h2>
        <div>
            @foreach ($question['answers'] as $answer)
            <li>
                <label value='repondre'></label>
                <input type='text'></input>
                <span>{{$answer['label']}}</span>
            </li>
            @endforeach
        </div>
    </div>

    @elseif($question['type'] === 'radio')
    <div>
        <h2 class='test'>{{$question['label']}} ? </h2>
        <div>
            @foreach ($question['answers'] as $answer)
            <li>
                <input type='radio'></input>
                <span>{{$answer['label']}}</span>
            </li>    
            @endforeach
        </div>
    </div>

    @else
    <div>
        <h2 class='test'>{{$question['label']}} ? </h2>
        <div>
            @foreach ($question['answers'] as $answer)
            <li>
                <input type='checkbox'></input>
                <span>{{$answer['label']}}</span>
            </li>
            @endforeach
        </div>
    </div>
    @endif
    </div>    
</body>
</html>