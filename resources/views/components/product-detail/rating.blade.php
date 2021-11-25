@props(['rate' => 0])

<span class="rating">
    @for ($i = 0; $i < $rate; $i++)
        <i class="icon-star"></i>
    @endfor
    @if ($rate < 5)
        @for ($i = 0; $i < 5-$rate; $i++)
            <i class="icon-star empty"></i>
        @endfor
    @endif
    <em>{{ number_format((float)$rate, 1, '.', '') }}/5.0</em>
</span>
