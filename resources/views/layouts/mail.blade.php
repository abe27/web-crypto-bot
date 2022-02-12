<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
</head>
<body>
    <div style="margin-left: 10px;">
        <h2>สวัสดีคุณ @yield('username')</h2>
    </div>
    <div style="margin-left: 35px;">
        @yield('content')
    </div>
    <div>
        <hr />
        <div style="margin: 10px;">
            <p>Best regards.</p>
            <p style="color:red;font-weight:bold;">We apologize if the response to the email was too late.</p>
            Administrator
            <br />
            <br />
            Blue Sky co,.th<br />
            103/1&nbsp;&nbsp;Moo&nbsp;&nbsp;1&nbsp;&nbsp;K.36.<br />
            Hom Sin Bang Pakong <br />
            Chachoengsao&nbsp;&nbsp;24180<br />
            <br />
            Tel:&nbsp;&nbsp;038562395&nbsp;&nbsp;ต่อ&nbsp;&nbsp;310<br />
            E-Mail:&nbsp;&nbsp;<a href="#">{{ env('MAIL_USERNAME') }}</a><br />
        </div>
    </div>
</body>
</html>
