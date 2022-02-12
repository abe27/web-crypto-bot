@extends('layouts.mail')

@section('title', 'รอยืนยันบัณชีผู้ใช้งาน')
@section('username', 'ผู้ดูแลระบบ')

@section('content')
<p>
    ขณะนี้ได้มีผู้ใช้งาน(<strong style="color:red;">{{$userName}}</strong>)ใหม่<br />
    รบกวนช่วยกด&nbsp;<strong>Verify</strong>&nbsp;ให้ด้วย
</p>
<p>
    anti-spam:&nbsp;<strong style="color:red;">{{ $antispam }}</strong>
</p>
@endsection
