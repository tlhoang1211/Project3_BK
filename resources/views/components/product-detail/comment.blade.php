@props(['title' => 'No Title', 'date' => 'No Date', 'rate' => 0])

<div class="col-lg-6">
    <div class="review_content">
        <div class="clearfix add_bottom_10">
            <x-product-detail.rating :rate="$rate"/>
            <em>{{ $date }}</em>
        </div>
        <h4>"{{ $title }}"</h4>
        <p>{{ $slot }}</p>
    </div>
</div>
