<section class="w-full py-10">
    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-6 gap-4 lg:place-items-center max-h-32 sm:max-h-full overflow-auto p-2">
        <div class="flex items-center space-x-2">
            <div class="h-10 w-10 flex items-center justify-center font-semibold rounded @if ($step[1] == 'done') bg-areakerja/40 @elseif($step[1] == 'active') bg-white ring ring-areakerja/50 @else bg-white ring ring-storm1 @endif">1</div>
            <div>
                <div class="text-xs">Step 1</div>
                <div class="font-semibold text-base">
                    <a href="{{ route('member.daftar.kandidat.information.index') }}">Information</a>
                </div>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <div class="h-10 w-10 flex items-center justify-center font-semibold rounded @if ($step[2] == 'done') bg-areakerja/40 @elseif($step[2] == 'active') bg-white ring ring-areakerja/50 @else bg-white ring ring-storm1 @endif">2</div>
            <div>
                <div class="text-xs">Step 2</div>
                <div class="font-semibold text-base">
                    <a href="{{ route('member.daftar.kandidat.skill.index') }}">Skill</a>
                </div>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <div class="h-10 w-10 flex items-center justify-center font-semibold rounded @if ($step[3] == 'done') bg-areakerja/40 @elseif($step[3] == 'active') bg-white ring ring-areakerja/50 @else bg-white ring ring-storm1 @endif">3</div>
            <div>
                <div class="text-xs">Step 3</div>
                <div class="font-semibold text-base">
                    <a href="{{ route('member.daftar.kandidat.education.index') }}">Education</a>
                </div>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <div class="h-10 w-10 flex items-center justify-center font-semibold rounded @if ($step[4] == 'done') bg-areakerja/40 @elseif($step[4] == 'active') bg-white ring ring-areakerja/50 @else bg-white ring ring-storm1 @endif">4</div>
            <div>
                <div class="text-xs">Step 4</div>
                <div class="font-semibold text-base">
                    <a href="{{ route('member.daftar.kandidat.certificate.index') }}">Certificate</a>
                </div>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <div class="h-10 w-10 flex items-center justify-center font-semibold rounded @if ($step[5] == 'done') bg-areakerja/40 @elseif($step[5] == 'active') bg-white ring ring-areakerja/50 @else bg-white ring ring-storm1 @endif">5</div>
            <div>
                <div class="text-xs">Step 5</div>
                <div class="font-semibold text-base">
                    <a href="{{ route('member.daftar.kandidat.experience.index') }}">Experience</a>
                </div>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <div class="h-10 w-10 flex items-center justify-center font-semibold rounded @if ($step[6] == 'done') bg-areakerja/40 @elseif($step[6] == 'active') bg-white ring ring-areakerja/50 @else bg-white ring ring-storm1 @endif">6</div>
            <div>
                <div class="text-xs">Step 6</div>
                <div class="font-semibold text-base">
                    <a href="{{ route('member.daftar.kandidat.agreement.index') }}">Agreement</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    @if(!empty($candidate->approved_at))
        <div class="alert alert-success">Approved at {{ date_format($candidate->approved_at, 'd F Y H:i:s') }}</div>
    @elseif(!empty($candidate->rejected_at))
        <div class="alert alert-error">Rejected at {{ date_format($candidate->rejected_at, 'd F Y H:i:s') }}</div>
    @elseif(!empty($candidate->submitted_at))
        <div class="alert alert-success">Submitted at {{ date_format($candidate->submitted_at, 'd F Y H:i:s A') }}</div>
    @endif
</section>
