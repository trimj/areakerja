@extends('templates.candidate.page')

@section('content')
    <section>
        <div class="flex justify-between items-center mb-5">
            <form action="{{ route('kandidat.lowongan.index') }}" method="get" class="flex space-y-0 space-x-2">
                <div class="flex items-center justify-center space-x-2 space-y-0">
                    <div class="textbox-group">
                        <select name="sort" id="sort">
                            <option value="job" @if(request()->sort == 'job') selected @endif>Job</option>
                            <option value="mitra" @if(request()->sort == 'mitra') selected @endif>Mitra</option>
                            <option value="lamarDate" @if(request()->sort == 'lamarDate') selected @endif>Date</option>
                        </select>
                    </div>
                    <div class="textbox-group">
                        <select name="order" id="order">
                            <option value="asc" @if(request()->order == 'asc') selected @endif>Ascending</option>
                            <option value="desc" @if(request()->order == 'desc') selected @endif>Descending</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Filter</button>
                    </div>
                </div>
            </form>
            <div>
                <a class="btn btn-primary" href="{{ route('public.lowongan.index') }}">Cari Lowongan</a>
            </div>
        </div>
        <div class="table-group">
            <table class="table-auto">
                <thead>
                <tr>
                    <th>Job Vacancy</th>
                    <th>Mitra</th>
                    <th>Request Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($jobCandidate as $job)
                    <tr>
                        <td>
                            <a href="{{ route('public.lowongan.show', $job->vacancy->id) }}" target="_blank">{{ $job->vacancy->title }}</a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('public.mitra.show', $job->vacancy->mitra->id) }}" target="_blank">{{ $job->vacancy->mitra->user->name }}</a>
                        </td>
                        <td class="text-center">{{ date_format($job->s_mitra ?? $job->s_candidate, 'd F Y') }}</td>
                        <td class="text-center">
                            @if(!empty($job->s_mitra) && empty($job->a_candidate) && empty($job->r_candidate))
                                <div class="badge badge-warning">Requested by Mitra</div>
                            @elseif(!empty($job->s_mitra) && !empty($job->a_candidate) && empty($job->r_candidate))
                                <div class="badge badge-success">Accepted by Candidate</div>
                            @elseif(!empty($job->s_mitra) && empty($job->a_candidate) && !empty($job->r_candidate))
                                <span class="badge badge-error">Rejected by Candidate</span>
                            @elseif(!empty($job->s_candidate) && empty($job->a_mitra) && empty($job->r_mitra))
                                <div class="badge badge-warning">Requested by Candidate</div>
                            @elseif(!empty($job->s_candidate) && !empty($job->a_mitra) && empty($job->r_mitra))
                                <div class="badge badge-success">Accepted by Mitra</div>
                            @elseif(!empty($job->s_candidate) && empty($job->a_mitra) && !empty($job->r_mitra))
                                <span class="badge badge-error">Rejected by Mitra</span>
                            @endif
                        </td>
                        <td class="flex items-center justify-center space-x-2">
                            @if(!empty($job->s_mitra) && empty($job->a_candidate) && empty($job->r_candidate))
                                @can('accept-job-from-mitra')
                                    <form action="{{ route('kandidat.lowongan.acceptJobFromMitra', $job->id) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-small btn-success"><i class="fas fa-check fa-fw"></i></button>
                                    </form>
                                @endcan
                                @can('reject-job-from-mitra')
                                    <form action="{{ route('kandidat.lowongan.rejectJobFromMitra', $job->id) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-small btn-error"><i class="fas fa-close fa-fw"></i></button>
                                    </form>
                                @endcan
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="100%">Nothing here</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
