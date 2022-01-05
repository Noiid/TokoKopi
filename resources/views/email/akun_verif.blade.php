@extends('email.template_email')
@section('content-core')
<div class="container-fluid marketing p-5 pt-0">

    <div class="row">
        <div class="col-sm-8">
            <p>Hello, {{ $receiver }}</p>
            <p>{{ $keterangan }}</p>
            <p>Klik link verifikasi ini <a href="{{ $url }}">{{ $url }}</a></p>
        </div>
        
    </div>
</div><!-- /.container -->
@endsection
