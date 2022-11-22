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
                    <th class="text-left">Other Skill</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($job->candidates as $candidate)
                    <tr>
                        <td>{{ $candidate->user->name }}</td>
                        <td>{{ $candidate->skill_list->name }}</td>
                        <td>
                            @foreach($candidate->skill as $skill)
                                <div>{{ $skill }}</div>
                            @endforeach
                        </td>
                        <td class="text-center">{{ $candidate->user->getRoleNames()->first() }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-small btn-primary"><i class="fas fa-unlock"></i></a>
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
