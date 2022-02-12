@extends('layouts.mail')

@section('title', 'ตรวจสอบ Anti-Span')
@section('username', $user->name)

@section('content')
<p>
    ตรวจพบมีการเข้าสู่ระบบของผู้ใช้งานชื่อ&nbsp;&nbsp;<strong style="color:red;">{{$user->email}}</strong><br />
    ณ&nbsp;เวลา&nbsp;&nbsp;<strong style="color:red;">{{ date('Y-m-d H:i:s') }}</strong><br />
    จากหมายเลยไอพี&nbsp;&nbsp;<strong style="color:red;">{{ $ipAddress }}</strong><br />
    หากไม่ใช่ท่านกรุณาเข้าสู่ระบบและทำ&nbsp;<strong style="color:red;">การเปลี่ยนรหัสผ่าน</strong>&nbsp;ใหม่ด้วย
</p>
<p>
    anti-spam:&nbsp;&nbsp;<strong style="color:red">{{ $antispam }}</strong>
</p>
@endsection
