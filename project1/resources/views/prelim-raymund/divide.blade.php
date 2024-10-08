<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
    <h1>This Division Page</h1>   
<body>

    
<h1>Simple Calculator</h1>
    <form method="POST" action="{{ route('divide') }}">
        @csrf
        <label for="num1">Number 1:</label>
        <input type="number" id="num1" name="num1" ><br><br>
        <label for="num2">Number 2:</label>
        <input type="number" id="num2" name="num2"><br><br>
        <input type="submit" value="Add"><br><br>
    </form>
    @if(isset($result))
        <p>The result is: {{ $result }}</p>
    @endif

    <a href="{{ route('home1') }}">Back to page</a><br><br>
    
</body>
</html>