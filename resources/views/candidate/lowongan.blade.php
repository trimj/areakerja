@extends('templates.candidate.page')

@section('content')
    <section>
        <div class="mb-3">
            <div class="text-xl font-semibold">Requested by Mitra</div>
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
                @forelse($jobsbymitra as $job)
                    <tr>
                        <td>
                            <a href="#" target="_blank">{{ $job->vacancy->title }}</a>
                        </td>
                        <td class="text-center">
                            <a href="#" target="_blank">{{ $job->vacancy->mitra->user->name }}</a>
                        </td>
                        <td class="text-center">{{ date_format($job->s_mitra, 'd F Y') }}</td>
                        <td class="text-center">
                            @if(!empty($job->s_mitra) && empty($job->a_candidate) && empty($job->r_candidate))
                                <div class="badge badge-warning">Waiting Answer</div>
                            @elseif(!empty($job->s_mitra) && !empty($job->a_candidate) && empty($job->r_candidate))
                                <div class="badge badge-success">Accepted</div>
                            @elseif(!empty($job->s_mitra) && empty($job->a_candidate) && !empty($job->r_candidate))
                                <span class="badge badge-error">Rejected</span>
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
                                    <form action="#" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
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
    <section>
        <div class="mb-3">
            <div class="text-xl font-semibold">Requested by Me</div>
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
                @forelse($jobsbyme as $job)
                    <tr>
                        <td>
                            <a href="#" target="_blank">{{ $job->vacancy->title }}</a>
                        </td>
                        <td class="text-center">
                            <a href="#" target="_blank">{{ $job->vacancy->mitra->user->name }}</a>
                        </td>
                        <td class="text-center">{{ date_format($job->s_mitra, 'd F Y') }}</td>
                        <td class="text-center">#</td>
                        <td class="text-center">#</td>
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
