@extends('templates.candidate.page')

@section('content')
    <section>
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
                            <a href="#" target="_blank">{{ $job->vacancy->mitra->user->name }}</a>
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
