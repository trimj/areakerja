@extends('templates.mitra.page')

@section('content')
    <section>
        <div class="flex justify-between items-center mb-5">
            <form action="{{ route('mitra.lowongan.candidate.index') }}" method="get" class="flex space-y-0 space-x-2">
                <div class="flex items-center justify-center space-x-2 space-y-0">
                    <div class="textbox-group">
                        <select name="sort" id="sort">
                            <option value="name" @if(request()->sort == 'name') selected @endif>Name</option>
                            <option value="skill" @if(request()->sort == 'skill') selected @endif>Skill</option>
                            <option value="birthDate" @if(request()->sort == 'birthDate') selected @endif>Birth Date</option>
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
        </div>
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
    <section>
        <div class="text-center">{{ $candidates->links() }}</div>
    </section>
@endsection
