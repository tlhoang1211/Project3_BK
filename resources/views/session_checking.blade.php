{{-- {{ Session::get('current_account')}}--}}
 {{ dd(auth()->user()->orders->pluck('product_id')->contains('19')) }}
{{--{{dd(Session::get('shoppingCart'))}}--}}
{{--{{ dd(Session::get('shoppingCart', 'default')) }}--}}
