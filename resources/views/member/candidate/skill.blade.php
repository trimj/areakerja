@extends('templates.public.page')

@section('content')
    @include('templates.member.candidate.steps')
    <section>
        <div class="font-bold text-2xl mb-5">Skill</div>
        <form action="{{ route('member.daftar.kandidat.skill.store') }}" method="post">
            @csrf
            @method('put')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 space-y-0" x-data="handler()">
                <div class="textbox-group">
                    <label for="mainSkill">Main Skill</label>
                    <select name="mainSkill" id="mainSkill">
                        @if (!empty($candidate->skill_id))
                            <option value="{{ $candidate->skill_id }}">{{ $candidate->skill_list->name }}</option>
                        @endif
                        <optgroup>
                            @foreach ($mainSkills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    @error('mainSkill')
                    <span class="text-error">{{ $errors->first('mainSkill') }}</span>
                    @enderror
                </div>
                <template x-for="(field, index) in fields" :key="index">
                    <div class="flex items-center space-x-5 control-group">
                        <div class="textbox-group w-full">
                            <label>Other Skill</label>
                            <input type="text" x-bind:name="`otherSkill[]`">
                        </div>
                        <div>
                            <button type="button" class="btn btn-error" @click="removeField(index)">&times;</button>
                        </div>
                    </div>
                    @error('mainSkill')
                    <span class="text-error">{{ $errors->first('mainSkill') }}</span>
                    @enderror
                </template>
                @if (!empty($candidate->skill))
                    @foreach ($candidate->skill as $key => $skill)
                        <div class="flex items-center space-x-5 control-group" id="{{ 'otherSkill' . $key }}">
                            <div class="textbox-group w-full">
                                <label>Other Skill</label>
                                <input type="text" x-bind:name="`otherSkill[]`" value="{{ $skill }}">
                            </div>
                            <div>
                                <button type="button" class="btn btn-error" onclick="document.getElementById('{{ 'otherSkill' . $key }}').remove();">&times;</button>
                            </div>
                        </div>
                        @error('mainSkill')
                        <span class="text-error">{{ $errors->first('mainSkill') }}</span>
                        @enderror
                    @endforeach
                @endif
                <div>
                    <button type="button" class="btn btn-success w-full" @click="addNewField()">Add Row</button>
                </div>
            </div>
            <div class="text-center space-x-2">
                <a href="{{ route('member.daftar.kandidat.information.index') }}" class="btn btn-tertiary">Previous Step</a>
                <button class="btn btn-primary">Next Step</button>
            </div>
        </form>
    </section>
    <div class="mt-20 md:mt-32 lg:mt-40">
        <img src="{{ asset('assets/public/images/daftar-kandidat.png') }}" alt="Daftar Kandidat" class=" w-[50%]">
    </div>
@endsection
@section('footerJS')
    <script>
        function handler() {
            return {
                fields: [],
                addNewField() {
                    this.fields.push({
                        txt1: '',
                        txt2: ''
                    });
                },
                removeField(index) {
                    this.fields.splice(index, 1);
                }
            }
        }
    </script>
@endsection
