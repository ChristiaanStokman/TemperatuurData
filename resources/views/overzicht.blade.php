<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <title>2010 temperaturen</title>
        <style>
            table {border : 1px solid black}
            td {text-align : right}
        </style>
    </head>
    <body>                                                                          <!-- resources\views\overzicht.blade.php -->   
        <form action="overzicht" method="get">                                                                       <!--VIEW-->
            <select name="maand" onchange="submit()">
                @for ($i = 0; $i <= 12; $i++)
                    <option value="{{$i}}" >{{$maandnamen[$i]}}</option>
                @endfor
            </select>
        </form>
        
        <h1>{{ $maandnamen[$maand] }}</h1>
        <table>
            <tr>
                <th>Dag</th>
                <th>Minimum</th>
                <th>Maximum</th>
            </tr>
            @foreach($metingen as $m)
                <tr>
                    <td>{{ $m->dagnr }}</td>
                    <td>{{ Number_format($m->minimum,1) }}&deg;C</td>
                    <td>{{ Number_format($m->maximum,1) }}&deg;C</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>