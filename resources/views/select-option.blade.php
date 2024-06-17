<div class="flex gap-x-2">
    @if ($hasFlags)
        <div>
            <x-filament::icon
                alias="flags::{{ $iso_code }}"
                class="h-5 w-6"
            />
        </div>
    @endif
    <div>
        {{ $label }}

        <span class="text-xs">
            {{ $country_code }}
        </span>
    </div>
</div>
