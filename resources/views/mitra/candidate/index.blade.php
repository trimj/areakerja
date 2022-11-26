@extends('templates.mitra.page')

@section('content')
    <section>
        <div class="mb-3">
            <div class="text-xl font-semibold">{{ $job->title }}</div>
            <div class="text-sm text-gray-400">{{ $job->main_skill->name }}</div>
        </div>
        <div class="table-group">
            <table class="table-auto">
                <thead>
                <tr>
                    <th class="text-left">Name</th>
                    <th class="text-left">Main Skill</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($job->candidates as $candidate)
                    <tr>
                        <td>{{ $candidate->user->name }}</td>
                        <td>{{ $candidate->main_skill->name }}</td>
                        <td class="text-center">{{ $candidate->user->getRoleNames()->first() }}</td>
                        <td class="text-center">
                            @can('view-job-candidate')
                                <a href="{{ route('mitra.lowongan.candidate.show', ['job' => $job->id, 'candidate' => $candidate->id]) }}" class="btn btn-small btn-secondary"><i class="fas fa-eye"></i></a>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5">Nothing Here</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
