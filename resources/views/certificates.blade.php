@extends('layout.main')

@section('content')
<section class="portofolio" id="portofolio">
    <h2 class="heading">My <span>{{ $title }} </span> </h2>
    <div class="portofolio-container">
        @foreach($certificates as $certificate)
            <div class="portofolio-box">
                <img src="{{ asset('storage/' . $certificate->image) }}" alt="{{ $certificate->title }}">
                <div class="portofolio-layer">
                    <h4>{{ $certificate->title }}</h4>
                    <a href="{{ asset('storage/' . $certificate->image) }}" target="_blank"><i class='bx bx-link-external'></i></a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
