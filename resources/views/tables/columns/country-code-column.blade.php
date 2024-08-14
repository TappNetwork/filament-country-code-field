<div class="flex fi-ta-text gap-x-2 gap-y-1 px-3 py-4">
    @if($getFlags() && $getState())
        <div class="">
            <x-filament::icon
                alias="flags::{{ $getIsoCodeByCountryCode($getState())  }}"
                class="h-5 w-6"
            />
        </div>
    @endif
    <div class="">
        <span class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white">
            {{ $getState() }}
        </span>
    </div>
</div>
