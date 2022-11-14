@extends('templates.mitra.page')

@section('content')
    <div class="text-right mb-5">
        <a class="btn btn-primary" href="{{ route('mitra.lowongan.create') }}">Add New</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
        @forelse ($jobs as $job)
            <div class="card-group">
                <img class="thumbnail p-5" src="{{ asset('assets/public/avatar') . '/' . $job->mitra->user->avatar }}" alt="image" loading="lazy" onerror="this.src='{{ asset('assets/public/images/logo.png') }}'">
                <div class="body">
                    <div class="title">
                        <a href="{{ route('public.lowongan.show', $job->id) }}">{{ $job->title }}</a>
                    </div>
                    <div class="desc">
                        <div class="jobdesc">
                            <div class="font-semibold">Main Skill:</div>
                            <div>{{ $job->skill_list->name }}</div>
                        </div>
                        <div class="jobdesc">
                            <div class="font-semibold">Salary:</div>
                            <div>Rp. {{ number_format($job->maxSalary, 0) }}</div>
                        </div>
                        <div class="jobdesc">
                            <div class="font-semibold">Location:</div>
                            <div>{{ $job->province }}</div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="information">
                        <div class="author">
                            <img src="{{ asset('assets/public/avatar') . '/' . $job->mitra->user->avatar }}" alt="avatar" loading="lazy" onerror="this.src='{{ asset('assets/public/avatar/default_avatar.png') }}'">
                            <div>
                                <div class="name">Seven Inc</div>
                                <div class="created">{{ date_format(date_create(now()), 'd F Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center">Nothing Here</div>
        @endforelse
    </div>
@endsection
