@extends('templates.mitra.page')

@section('content')
    <section>
        <div class="flex justify-between items-center mb-5">
            <form action="{{ route('mitra.lowongan.index') }}" method="get" class="flex space-y-0 space-x-2">
                <div class="textbox-group">
                    <input type="text" name="q" id="q" placeholder="Kotak Pencarian" value="{{ request()->get('q') }}">
                </div>
                <div class="flex items-center justify-center space-x-2 space-y-0">
                    <div class="textbox-group">
                        <select name="sort" id="sort">
                            <option value="judul" @if(request()->sort == 'judul') selected @endif>Judul</option>
                            <option value="skill" @if(request()->sort == 'skill') selected @endif>Skill</option>
                            <option value="deadline" @if(request()->sort == 'deadline') selected @endif>Deadline</option>
                            <option value="minimumSalary" @if(request()->sort == 'minimumSalary') selected @endif>Minimum Salary</option>
                            <option value="maximumSalary" @if(request()->sort == 'maximumSalary') selected @endif>Maximum Salary</option>
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
            @can('create-job-vacancy')
                <div>
                    <a class="btn btn-primary" href="{{ route('mitra.lowongan.create') }}">Add New</a>
                </div>
            @endcan
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
            @forelse ($jobs as $job)
                <div class="card-group">
                    <div class="body">
                        <div class="title">
                            <a href="{{ route('public.lowongan.show', $job->id) }}">{{ $job->title }}</a>
                        </div>
                        <div class="desc mt-5">
                            <div class="jobdesc">
                                <div class="font-semibold">Main Skill:</div>
                                <div>{{ $job->main_skill->name }}</div>
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
                                @can('manage-job-candidate')
                                    <a href="{{ route('mitra.lowongan.candidate.show', $job->id) }}" class="btn btn-small btn-primary"><i class="fas fa-user"></i></a>
                                @endcan
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
                <div class="col-span-full text-center text-gray-400 mt-10">Nothing Here</div>
            @endforelse
        </div>
    </section>
    <section>
        <div class="text-center">{{ $jobs->links() }}</div>
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
