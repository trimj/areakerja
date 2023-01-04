@extends('templates.admin.page')

@section('content')
    <section>
        <div class="table-group">
            <table class="table-auto">
                <thead>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
                </thead>
                <tbody>
                @forelse($skills as $key => $skill)
                    <tr>
                        <td class="text-center">{{ $skills->firstItem() + $key }}</td>
                        <td>
                            <a href="{{ route('public.lowongan.indexSkill', ['skill' => $skill->slug]) }}" target="_blank">{{ $skill->name }}</a>
                        </td>
                        <td>{{ $skill->slug }}</td>
                        <td class="text-center">
                            @can('edit-skill')

                            @endcan
                            @can('delete-skill')
                                <form action="{{ route('admin.skill.destroy', $skill->id) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-small btn-error"><i class="fas fa-trash"></i></button>
                                </form>
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
    <section>
        <div class="text-center">{{ $skills->links() }}</div>
    </section>
@endsection
