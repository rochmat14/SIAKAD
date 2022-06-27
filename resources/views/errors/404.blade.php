@extends('errors.illustrated-layout')

@section('code', 'Kosong')
@section('title', __('Page Not Found'))

@section('image')
<div style="background-image: url({{ asset('/svg/404.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('Maaf, data yang kamu cari tidak dapat di temukan.'))
