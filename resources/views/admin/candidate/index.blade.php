@extends('templates.admin.page')

@section('content')
    <section>
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
                @forelse($candidates as $candidate)
                    <tr>
                        <td>{{ $candidate->user->name }}</td>
                        <td>{{ $candidate->main_skill->name }}</td>
                        <td class="text-center">{{ $candidate->user->getRoleNames()->first() }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.candidate.show', ['candidate' => $candidate->id]) }}" class="btn btn-small btn-tertiary"><i class="fas fa-eye"></i></a>
                            @can('edit-candidate')
                                <a href="{{ route('admin.candidate.edit', ['candidate' => $candidate->id]) }}" class="btn btn-small btn-secondary"><i class="fas fa-edit"></i></a>
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
