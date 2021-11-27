@props(['rate' => 0, 'isOverview' => false])

@php
    $floor_rate = floor($rate);
    $float_rate = (float) $rate;
@endphp

<span class="rating">
        @for ($i = 0; $i < $floor_rate; $i++)
        @if ($isOverview)
            <i class="icon-star voted"></i>
        @else
            <i class="icon-star"></i>
        @endif
    @endfor
    @if ($rate < 5)
        @for ($i = 0; $i < 5-$floor_rate; $i++)
            @if ($isOverview)
                <i class="icon-star"></i>
            @else
                <i class="icon-star empty"></i>
            @endif
        @endfor
    @endif
        <em>{{ number_format($float_rate, 1, '.', '') }}/5.0</em>
</span>
