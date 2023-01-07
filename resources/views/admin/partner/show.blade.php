@extends('templates.admin.page')

@section('content')
    <section>
        <div class="table-group">
            <table class="table-auto">
                <thead>
                <th>Attribute</th>
                <th>Value</th>
                </thead>
                <tbody>
                <tr>
                    <td class="font-semibold">Photo</td>
                    <td>
                        <img class="rounded-md w-32 h-32" src="{{ asset('assets/public/photo' . '/' . $partner->user->photo) }}" alt="photo" onerror="this.src='{{ asset('assets/public/photo/default_photo.png') }}';">
                    </td>
                </tr>
                <tr>
                    <td class="font-semibold">Name</td>
                    <td>{{ $partner->user->name }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Coins</td>
                    <td>{{ number_format($partner->coins) }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Email</td>
                    <td>{{ $partner->email ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Website</td>
                    <td>{{ $partner->website ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Phone</td>
                    <td>{{ $partner->phone ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="font-semibold">Address</td>
                    <td><span>{{ $partner->address['jalan'] }}</span>, <span id="kelurahan">{{ $partner->address['kelurahan'] }}</span>, <span id="kecamatan">{{ $partner->address['kecamatan'] }}</span>, <span id="kota">{{ $partner->address['kota'] }}</span>, <span id="provinsi">{{ $partner->address['provinsi'] }}</span></td>
                </tr>
                <tr>
                    <td class="font-semibold">Description</td>
                    <td>{{ $partner->description ?? '-' }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
    <section>
        <div class="flex justify-center items-center space-x-2">
            @if(!empty($partner->submitted_at) && !$partner->user->hasRole(4))
                @can('accept-pre-partner')
                    <form action="{{ route('admin.partner.acceptPrePartner', ['partner' => $partner->id]) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-success">Accept as Partner</button>
                    </form>
                @endcan
                @can('reject-pre-partner')
                    <form action="{{ route('admin.partner.rejectPrePartner', ['partner' => $partner->id]) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                        @csrf
                        @method('patch')
                        <button type="submit" class="btn btn-error">Reject as Partner</button>
                    </form>
                @endcan
            @endif
        </div>
    </section>
    <section>
        <div class="flex justify-center items-center space-x-2">
            @can('edit-partner')
                <a class="btn btn-secondary" href="{{ route('admin.partner.edit', ['partner' => $partner->id]) }}">Edit Partner</a>
            @endcan
            @can('delete-partner')
                <form action="{{ route('admin.partner.destroy', ['partner' => $partner->id]) }}" method="post" onsubmit="return confirm('Are you sure?');" class="space-y-0">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-error">Delete Partner</button>
                </form>
            @endcan
        </div>
    </section>
@endsection

@section('footerJS')
    <script>
        function Provinsi(id) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/provinsi/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                document.getElementById('provinsi').innerHTML = data.nama;
            });
        }

        function Kota(id) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kota/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                document.getElementById('kota').innerHTML = data.nama;
            });
        }

        function Kecamatan(id) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kecamatan/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                document.getElementById('kecamatan').innerHTML = data.nama;
            });
        }

        function Kelurahan(id) {
            fetch('https://dev.farizdotid.com/api/daerahindonesia/kelurahan/' + id).then((response) => {
                return response.json();
            }).then((data) => {
                document.getElementById('kelurahan').innerHTML = data.nama;
            });
        }
    </script>
    <script>
        window.addEventListener("load", (event) => {
            Provinsi({{ $partner->address['provinsi'] ?? null }});
            Kota({{ $partner->address['kota'] ?? null }});
            Kecamatan({{ $partner->address['kecamatan'] ?? null }});
            Kelurahan({{ $partner->address['kelurahan'] ?? null }});
        });
    </script>
@endsection
