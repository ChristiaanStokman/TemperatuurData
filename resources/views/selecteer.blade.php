<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Temperaturen</title>
</head>
<body>
    <form action="overzicht" method="get">                                                          <!-- selecteer.blade.php -->
        <select name="maand" onchange="submit()">                                                                  <!-- VIEW -->
            @for ($i = 0; $i <= 12; $i++)
                <option required value="{{$i}}" >{{$maandnamen[$i]}}</option>
            @endfor
        </select>
    </form>
    <form action="nieuwsbrief" method="post">                                                <!-- novalidate later uitzetten -->
        @csrf                                                                                    <!-- bescherming tegen CSRF -->
        <label>E-mailadres:</label>
        <input type="email" required name="emailadres"/>
        <button type="submit">Vraag nieuwsbrief aan</button>
    </form>
</body>
</html>