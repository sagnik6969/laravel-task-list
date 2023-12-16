<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @forelse($tasks as $task)
    <div>
    <a href="{{ route('tasks.show',['id' => $task->id]) }}">{{ $task -> title }}</a>
    </div>
    <!-- <div>{{ $task -> title }}</div> -->
    @empty
    <div>No task found</div>
    @endforelse
</body>

</html>