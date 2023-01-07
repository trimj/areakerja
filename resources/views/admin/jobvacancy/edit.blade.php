@extends('templates.admin.page')

@section('content')
    <section>
        <form action="{{ route('admin.lowongan.update', $job->id) }}" method="post">
            @csrf
            @method('put')
            <div class="textbox-group">
                <label for="partner">Mitra</label>
                <select name="partner" id="partner">
                    @foreach($partners as $partner)
                        <option value="{{ $partner->id }}" @if($partner->id == $job->partner_id) selected @endif>{{ $partner->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="textbox-group">
                <label for="jobTitle">Job Title</label>
                <input type="text" name="jobTitle" id="jobTitle" value="{{ old('jobTitle') ?? $job->title }}" @error('jobTitle') class="textbox-error" @enderror>
                @error('jobTitle')
                <span class="text-error">{{ $errors->first('jobTitle') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="jobDesc">Job Description</label>
                <textarea name="jobDesc" id="jobDesc" rows="10" @error('jobDesc') class="textbox-error" @enderror>{{ old('jobDesc') ?? $job->description }}</textarea>
                @error('jobDesc')
                <span class="text-error">{{ $errors->first('jobDesc') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="jobMainSkill">Main Skill</label>
                <select name="jobMainSkill" id="jobMainSkill" @error('jobMainSkill') class="textbox-error" @enderror>
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}" @if($skill->id == $job->mainSkill) selected @endif>{{ $skill->name }}</option>
                    @endforeach
                </select>
                @error('jobMainSkill')
                <span class="text-error">{{ $errors->first('jobMainSkill') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="jobOtherSkill">Other Skill <span class="text-gray-400 text-xs ml-1">Opsional</span></label>
                <select name="jobOtherSkill[]" id="jobOtherSkill" @error('jobOtherSkill') class="textbox-error" @enderror multiple size="5">
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}" @if(in_array($skill->id, $job->otherSkill ?? [])) selected @endif>{{ $skill->name }}</option>
                    @endforeach
                </select>
                @error('jobOtherSkill')
                <span class="text-error">{{ $errors->first('jobOtherSkill') }}</span>
                @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 space-y-0">
                <div class="textbox-group">
                    <label for="provinsi">Provinsi</label>
                    <select name="address[provinsi]" id="provinsi" onchange="Kota();" onclick="Provinsi();">
                        <option>Pilih Provinsi</option>
                    </select>
                    @error('address.provinsi')
                    <span class="text-error">{{ $errors->first('address.provinsi') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="kota">Kota/Kabupaten</label>
                    <select name="address[kota]" id="kota" onchange="Kecamatan();">
                        <option>Pilih Kota/Kabupaten</option>
                    </select>
                    @error('address.kota')
                    <span class="text-error">{{ $errors->first('address.kota') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="kecamatan">Kecamatan</label>
                    <select name="address[kecamatan]" id="kecamatan" onchange="Kelurahan();">
                        <option>Pilih Kecamatan</option>
                    </select>
                    @error('address.kecamatan')
                    <span class="text-error">{{ $errors->first('address.kecamatan') }}</span>
                    @enderror
                </div>
                <div class="textbox-group">
                    <label for="kelurahan">Kelurahan</label>
                    <select name="address[kelurahan]" id="kelurahan">
                        <option>Pilih Kelurahan</option>
                    </select>
                    @error('address.kelurahan')
                    <span class="text-error">{{ $errors->first('address.kelurahan') }}</span>
                    @enderror
                </div>
            </div>
            <div class="textbox-group">
                <label for="jobMinSalary">Minimum Salary</label>
                <input type="number" name="jobMinSalary" id="jobMinSalary" value="{{ old('jobMinSalary') ?? $job->minSalary }}" @error('jobMinSalary') class="textbox-error" @enderror>
                @error('jobMinSalary')
                <span class="text-error">{{ $errors->first('jobMinSalary') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="jobMaxSalary">Maximum Salary</label>
                <input type="number" name="jobMaxSalary" id="jobMaxSalary" value="{{ old('jobMaxSalary') ?? $job->maxSalary }}" @error('jobMaxSalary') class="textbox-error" @enderror>
                @error('jobMaxSalary')
                <span class="text-error">{{ $errors->first('jobMaxSalary') }}</span>
                @enderror
            </div>
            <div class="textbox-group">
                <label for="jobDeadline">Deadline</label>
                <input type="datetime-local" name="jobDeadline" id="jobDeadline" value="{{ old('jobDeadline') ?? date_format($job->deadline, 'Y-m-d H:i') }}" min="{{ date('Y-m-d H:i', time() + 86400) }}" @error('jobDeadline') class="textbox-error" @enderror>
                @error('jobDeadline')
                <span class="text-error">{{ $errors->first('jobDeadline') }}</span>
                @enderror
            </div>
            <div class="text-right">
                <button class="btn btn-primary">Perbarui Lowongan</button>
            </div>
        </form>
    </section>
@endsection

@section('headerJS')
    <link rel="stylesheet" href="{{ asset('sceditor/themes/default.min.css') }}"/>
    <script src="{{ asset('sceditor/sceditor.min.js') }}"></script>
    <script src="{{ asset('sceditor/formats/bbcode.js') }}"></script>
@endsection

@section('footerJS')
    @include('templates.member.location.provinsi')
    @include('templates.member.location.kota')
    @include('templates.member.location.kecamatan')
    @include('templates.member.location.kelurahan')
    <script>
        window.addEventListener("load", (event) => {
            Provinsi({{ $job->address['provinsi'] ?? null }});
            Kota({{ $job->address['kota'] ?? null }});
            Kecamatan({{ $job->address['kecamatan'] ?? null }});
            Kelurahan({{ $job->address['kelurahan'] ?? null }});
        });
    </script>
    <script>
        var textarea = document.getElementById('jobDesc');
        sceditor.create(textarea, {
            format: 'bbcode',
            plugins: 'undo,plaintext',
            width: '100%',
            bbcodeTrim: false,
            toolbar: "bold,italic,underline,strike|left,center,right,justify|size,color,removeformat|bulletlist,orderedlist|code,quote,horizontalrule|image,link,unlink,youtube|emoticon,source",
            resizeWidth: false,
            emoticonsEnabled: true,
            emoticonsRoot: "{{ asset('sceditor') . '/' }}",
            style: "{{ asset('sceditor/themes/content/default.min.css') }}",
        });
    </script>
@endsection
