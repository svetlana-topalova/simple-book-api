<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Test Mail</title>
    </head>
    <body>
        <p>
            Hello {{$name}},<br/>
            New book with title <b>'{{$book->title}}'</b> was published.
        </p>
        <p>
            Book Decription:<br/>
            {{$book->description}}
        </p>

        <img width="300px" src="{{ $message->embed($image) }}" />
    </body>
</html>