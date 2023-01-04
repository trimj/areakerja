@extends('templates.admin.page')

@section('content')
    <section>
        <div class="table-group">
            <table class="table-auto">
                <thead>
                <th>Name</th>
                <th>Action</th>
                </thead>
                <tbody>
                @forelse($partners as $partner)
                    <tr>
                        <td>
                            <a href="{{ route('public.mitra.showWithSlug', ['mitra' => $partner->id, 'slug' => Str::slug($partner->user->name)]) }}" target="_blank">{{ $partner->user->name }}</a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.partner.show', ['partner' => $partner->id]) }}" class="btn btn-small btn-tertiary"><i class="fas fa-eye"></i></a>
                            @can('edit-partner')
                                <a href="{{ route('admin.partner.edit', ['partner' => $partner->id]) }}" class="btn btn-small btn-secondary"><i class="fas fa-edit"></i></a>
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
        <div class="text-center">{{ $partners->links() }}</div>
    </section>
@endsection
