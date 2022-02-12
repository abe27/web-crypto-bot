@extends('layouts.mail')

@section('title', 'รอยืนยันบัณชีผู้ใช้งาน')
@section('username', $user->name)

@section('content')
<p>
    ขณะนี้ระบบได้ทำการส่งข้อมูลการลงทะเบียนของคุณถึงผู้ดูแลระบบเรียบร้อยแล้ว<br />
    กรุณารอผู้ดูแลระบบทำการ&nbsp;&nbsp;<strong><span style="color:red;">`ทำการยืนยันบัญชีผู้ใช้งาน`</span></strong>&nbsp;&nbsp;ก่อนการเข้าใช้งานระบบครับ<br />
</p>
<p>
    กระบวนการนี้อาจจะใช้เวลา<strong style="color:red;">&nbsp;&nbsp;1-2&nbsp;ชั่วโมง</strong><br />
    ขอ&nbsp;&nbsp;อภัย&nbsp;&nbsp;หากดำเนินการล่าช้า
</p>
@endsection
