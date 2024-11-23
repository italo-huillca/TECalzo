@extends('layouts.app')

@section('content')
    <x-product-carousel :randomProducts="$randomProducts" />
@endsection
