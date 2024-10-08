<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="mx-auto text-center">
        <h1 class="font-bold mt-2">THIS IS CALCULATOR PAGE</h1>
        <form action="{{ route('callcalculate') }}" method="POST" class="mt-5">
            @csrf
            <label class="mt-5" for="num1">Number 1:</label>
            <input type="text" name="number1" id="num1" autofocus>
            @if($errors->has('number1'))
                <span class="text-danger">{{ $errors->first('number1') }}</span>
            @endif
            <div class="mt-4"></div>
            <label for="num2">Number 2:</label>
            <input type="text" name="number2" id="num2" >
            @if($errors->has('number2'))
                <span class="text-danger">{{ $errors->first('number2') }}</span>
            @endif
            <br>
            <button type="submit" class="w-24  px-4 text-white bg-blue-800 mt-5 mb-4">ADD</button>
        </form>
        
    </div>
        @if($result !=null)
        <span class="text-x1">SUM: {{ $result }}</span>
        @else
        <span class="text-x1">SUM: Not Yet Calculated!</span>
        @endif



</body>
</html> -->
