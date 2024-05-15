<!DOCTYPE html>
<html>
<head>
    <title>{{$tieude}}</title>
</head>
<body>
    
   <a  href="{{ route('user.verify',['email' => $user->email]) }}"><div style="cursor: pointer; padding: 40px; background-color: antiquewhite">Click here to verify your account</div></a>
</body>
</html>