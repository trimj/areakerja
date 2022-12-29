@extends('templates.mitra.page')

@section('content')
    <section>
        <div class="table-group">
            <table class="table-auto">
                <thead>
                <tr>
                    <th class="text-left">Name</th>
                    <th class="text-left">Main Skill</th>
                    <th>Lowongan</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($candidates as $candidate)
                    <tr>
                        <td>{{ $candidate->candidate->user->name }}</td>
                        <td>{{ $candidate->candidate->main_skill->name }}</td>
                        <td class="text-center"><a href="{{ route('public.lowongan.show', $candidate->vacancy->id) }}" target="_blank">{{ $candidate->vacancy->title }}</a></td>
                        <td class="text-center">{{ $candidate->candidate->user->getRoleNames()->first() }}</td>
                        <td class="text-center">
                            @if(!empty($candidate->s_mitra) && empty($candidate-->a_candidate) && empty($candidate->r_candidate))
                                <span class="badge badge-warning">Requested by Mitra</span>
                            @elseif(!empty($candidate->s_mitra) && !empty($candidate->a_candidate) && empty($candidate->r_candidate))
                                <span class="badge badge-success">Accepted by Candidate</span>
                            @elseif(!empty($candidate->s_mitra) && empty($candidate->a_candidate) && !empty($candidate->r_candidate))
                                <span class="badge badge-error">Rejected by Candidate</span>
                            @elseif(!empty($candidate->s_candidate) && empty($candidate->a_mitra) && empty($candidate->r_mitra))
                                <span class="badge badge-warning">Requested by Candidate</span>
                            @elseif(!empty($candidate->s_candidate) && !empty($candidate->a_mitra) && empty($candidate->r_mitra))
                                <span class="badge badge-success">Accepted by Mitra</span>
                            @elseif(!empty($candidate->s_candidate) && empty($candidate->a_mitra) && !empty($candidate->r_mitra))
                                <span class="badge badge-error">Rejected by Mitra</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @can('view-job-candidate')
                                <a href="{{ route('mitra.lowongan.pelamar.show', ['jobCandidate' => $candidate->id]) }}" class="btn btn-small btn-secondary"><i class="fas fa-eye"></i></a>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="100%">Nothing Here</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
