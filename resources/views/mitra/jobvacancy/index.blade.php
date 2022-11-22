@extends('templates.mitra.page')

@section('content')
    @can('create-job-vacancy')
        <section class="text-right mb-5">
            <a class="btn btn-primary" href="{{ route('mitra.lowongan.create') }}">Add New</a>
        </section>
    @endcan
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
        @forelse ($jobs as $job)
            <div class="card-group">
                <div class="body">
                    <div class="title">
                        <a href="{{ route('public.lowongan.show', $job->id) }}">{{ $job->title }}</a>
                    </div>
                    <div class="desc mt-5">
                        <div class="jobdesc">
                            <div class="font-semibold">Main Skill:</div>
                            <div>{{ $job->skill_list->name }}</div>
                        </div>
                        <div class="jobdesc">
                            <div class="font-semibold">Salary:</div>
                            <div>Rp. {{ number_format($job->maxSalary, 0) }}</div>
                        </div>
                        <div class="jobdesc">
                            <div class="font-semibold">Location:</div>
                            <div id="{{ 'provinsi' . $job->id }}"></div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="information">
                        <div class="author"></div>
                        <div class="another">
                            @can('edit-job-vacancy')
                                <a href="{{ route('mitra.lowongan.edit', $job->id) }}" class="btn btn-small btn-secondary"><i class="fas fa-edit"></i></a>
                            @endcan
                            @can('delete-job-vacancy')
                                <form action="{{ route('mitra.lowongan.destroy', $job->id) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-small btn-error"><i class="fas fa-trash"></i></button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center">Nothing Here</div>
        @endforelse
    </section>
@endsection

@section('footerJS')
    <script>
        function Provinsi(divId, id) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                document.getElementById(divId).innerHTML = data.nama;
            });
        }
    </script>
    <script>
        window.addEventListener("load", (event) => {
            @foreach($jobs as $job)
            Provinsi('{{ 'provinsi' . $job->id }}', {{ $job->address['provinsi'] }})
            @endforeach
        });
    </script>
@endsection
