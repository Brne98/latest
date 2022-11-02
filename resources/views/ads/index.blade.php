<html>
<head>
    <title>Ads</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        html{
            scroll-behavior: smooth;
        }

        .block{
            width: 700px;
            border: 1px solid red;
            margin-left: 300px;
            padding: 10px;
            margin-bottom: 5px;
        }

        select{
            margin-left: 300px;
            margin-bottom: 5px;
        }

        img{
            width: 100px;
            margin-left: 25px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .flex{
            display: inline-flex;
        }

        h1, hr{
            width: 720px;
            margin-left: 300px;
        }
    </style>
</head>
<body>
<h1>Practice</h1>
<hr>
    <select>
        @foreach($categories as $category)
        <option>{{ $category->name }}</option>
        @endforeach
    </select>
    @foreach($ads as $ad)
    <div class="block">
        <a href="ad/{{$ad->title}}">
            <h1 >{{ $ad['title'] }}</h1>
        </a>

    <p>{{ $ad['description'] }}</p>
    <p>Price: {{ $ad->price . '.oo ' . $ad->currency }}</p>
        <p>Price type: {{ $ad->price_type }}</p>
    <span>
        Owner: {{ $ad->user['name'] }}
        | Category: {{ $ad->category->name }}
    </span>
    <br>
        <div class="flex">
            @foreach($pictures as $picture)
            <img src="{{ $picture->path }}" alt="owner picture">
            @endforeach
        </div>
</div>
    @endforeach

</body>
</html>

