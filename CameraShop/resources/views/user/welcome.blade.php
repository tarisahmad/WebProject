@extends('user.app')
@section('content')
<div class="site-blocks-cover" style="background-image: url({{ asset('shopper') }}/images/hero_2.jpg);" data-aos="fade">
    <div class="container">
    <div class="row align-items-start align-items-md-center justify-content-end">
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
        <h1 class="mb-2">Cari Kebutuhan Kamera Kamu Di Sini</h1>
        <div class="intro-text text-center text-md-left">
            <p class="mb-4">Kamera & Lensa original. Sekarang kamu bisa sewa alat dengan cepat dan mudah </p>
            <p>
            <a href="{{ route('user.produk') }}" class="btn btn-sm btn-primary">Sewa Sekarang</a>
            </p>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="site-section site-section-sm site-blocks-1">
    <div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
        <div class="icon mr-4 align-self-start">
            <span class="icon-camera"></span>
        </div>
        <div class="text">
            <h2 class="text-uppercase">Produk Lengkap</h2>
            <p>Cari peralatan secara otomatis dengan browse all, ketik nama alat, atau kategorinya, atau mereknya, kamu juga bisa cari manual lewat menu produk</p>
        </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
        <div class="icon mr-4 align-self-start">
            <span class="icon-star"></span>
        </div>
        <div class="text">
            <h2 class="text-uppercase">Stock Realtime</h2>
            <p>Tidak perlu lagi antri menunggu jawaban admin buat cek ketersediaan alat, cukup masukkan tanggal, langsung tau stock alat realtime</p>
        </div>
        </div>
        <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
        <div class="icon mr-4 align-self-start">
            <span class="icon-security"></span>
        </div>
        <div class="text">
            <h2 class="text-uppercase">Barang Terjamin</h2>
            <p>Jaminan barang original dan selalu dilakukan pengecekan kembali kondisi barang sehingga terbukti kualitasnya</p>
        </div>
        </div>
    </div>
    </div>
</div>
<div class="site-section block-3 site-blocks-2 bg-light"  data-aos="fade-up">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
        <h2>Produk Terlaris</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="nonloop-block-3 owl-carousel" >
            @foreach($produks as $produk)
            <div class="item">
            <div class="block-4 text-center">
                <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">
                <figure class="block-4-image">
                <img src="{{ asset('storage/'.$produk->image) }}" alt="Image placeholder" class="img-fluid" width="100%" style="height:300px">
                </figure>
                </a>
                <div class="block-4-text p-4">
                <h3><a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">{{ $produk->name }}</a></h3>
                <p class="mb-0">RP {{number_format ($produk->price,2) }}</p>
                <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}" class="btn btn-primary mt-2">Detail</a>
                </div>
            </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
    </div>
</div>
    @endsection