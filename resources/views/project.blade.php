@extends('layout.main')
@section('content')
    <section class="portofolio" id="portofolio">
        <h2 class="heading">My <span>Project</span></h2>

        <div class="portofolio-container">
            @foreach ($projects as $project)
                <div class="portofolio-box">
                    {{-- <img src="{{ asset('/images/project/' . $project->image) }}" alt="{{ $project->title }}"> --}}
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">

                    <div class="portofolio-layer">
                        <h4>{{ $project->title }}</h4>
                        {{-- <p>{{ $project->body }}</p> --}}
                        <a href="{{ $project->link_project }}" target="_blank"><i
                                class='bx bx-link-external'></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
