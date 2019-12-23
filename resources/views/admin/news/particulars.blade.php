<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <table border='1'> 
                <tr>
                    <td>标题</td>
                    <td>{{$newsInfo->title}}</td>
                </tr>
                <tr>
                    <td>访问量</td>
                    <td>{{$visit}}</td>
                </tr>
                <tr>
                    <td>内容</td>
                    <td><textarea name="" id="" cols="30" rows="10">{{$newsInfo->content}}</textarea></td>
                </tr>
        </table>
</body>
</html>