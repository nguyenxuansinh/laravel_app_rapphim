<!DOCTYPE html>
<html>
<head>
    <title>{{$tieude}}</title>
</head>
<body>
    
   <a  href="{{ route('user.change',['email' => $user->email]) }}"><div style="cursor: pointer; padding: 40px; background-color: antiquewhite">Click here to change password</div></a>
</body>
</html>