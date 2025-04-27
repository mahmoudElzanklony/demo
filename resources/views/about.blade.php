<html>
    <head>
        <title>Test</title>
    </head>
    <body>
       <h1>Test</h1>
        @foreach($data as $item)
            <h1>{{  $item->user_id }}</h1>
            <h1>{{  $item->name }}</h1>
        @endforeach
    </body>
</html>
