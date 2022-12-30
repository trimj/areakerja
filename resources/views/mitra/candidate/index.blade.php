@extends('templates.mitra.page')

@section('content')
    <section>
        <div class="table-group">
            <table class="table-auto">
                <thead>
                <tr>
                    <th class="text-left">Name</th>
                    <th class="text-left">Main Skill</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($candidates as $candidate)
                    <tr>
                        <td>{{ $candidate->user->name }}</td>
                        <td>{{ $candidate->main_skill->name }}</td>
                        <td class="text-center">{{ $candidate->user->getRoleNames()->first() }}</td>
                        <td class="text-center">
                            @if(!empty($candidate->jobCandidate) && $candidate->jobCandidate->unlock_id == $candidate->unlocked->id)
                                @if(!empty($candidate->jobCandidate->s_mitra) && empty($candidate->jobCandidate->a_candidate) && empty($candidate->jobCandidate->r_candidate))
                                    <span class="badge badge-warning">Requested by Mitra</span>
                                @elseif(!empty($candidate->jobCandidate->s_mitra) && !empty($candidate->jobCandidate->a_candidate) && empty($candidate->jobCandidate->r_candidate))
                                    <span class="badge badge-success">Accepted by Candidate</span>
                                @elseif(!empty($candidate->jobCandidate->s_mitra) && empty($candidate->jobCandidate->a_candidate) && !empty($candidate->jobCandidate->r_candidate))
                                    <span class="badge badge-error">Rejected by Candidate</span>
                                @elseif(!empty($candidate->jobCandidate->s_candidate) && empty($candidate->jobCandidate->a_mitra) && empty($candidate->jobCandidate->r_mitra))
                                    <span class="badge badge-warning">Requested by Candidate</span>
                                @elseif(!empty($candidate->jobCandidate->s_candidate) && !empty($candidate->jobCandidate->a_mitra) && empty($candidate->jobCandidate->r_mitra))
                                    <span class="badge badge-success">Accepted by Mitra</span>
                                @elseif(!empty($candidate->jobCandidate->s_candidate) && empty($candidate->jobCandidate->a_mitra) && !empty($candidate->jobCandidate->r_mitra))
                                    <span class="badge badge-error">Rejected by Mitra</span>
                                @endif
                            @elseif(empty($candidate->jobCandidate) && !empty($candidate->unlocked->id))
                                <span class="badge badge-info">Unlocked</span>
                            @else
                                <span class="badge badge-secondary">Locked</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @can('view-job-candidate')
                                <a href="{{ route('mitra.lowongan.candidate.show', ['candidate' => $candidate->id]) }}" class="btn btn-small btn-secondary"><i class="fas fa-eye"></i></a>
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
