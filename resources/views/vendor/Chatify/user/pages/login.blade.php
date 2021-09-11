<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Chat Support</title>
    <script src="//code.jquery.com/jquery-1.11.1.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

    </style>
</head>
<body>
<div class="container" style="padding-top: 50px">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{trans('web.chat.enter_detailes_title')}}</h3>
                </div>
                <div class="panel-body">
                    <form role="form" id="frm-login" method="post" action="{{route('chat.login-user')}}">
                        @csrf
                        @method('post')
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Nickname" name="name" id="nickname" type="text" autofocus required="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Email" name="email" id="nickname" type="text" autofocus required="">
                            </div>
                            <button type="submit" class="btn btn-lg btn-block" style="background: #18385f; color: white">Enter Chat</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
