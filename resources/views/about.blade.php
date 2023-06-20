@extends('layouts.landing-main')

@section('content')
<div class="container p-5 min-vh-100">
    <div class="row mb-3">
        <div class="col-md-8">
            <h3 class="section-header">About JaceInstrumental</h3>
        </div>
        <div class="col-md-4 text-end">
            <img src="{{ asset('storage/logo.png') }}" alt="logo" class="logo-img">
        </div>
    </div>
    <div class="row">
        <p>Welcome to JaceInstrumental, a leading provider of high-quality musical instruments. We are passionate about music and dedicated to delivering the best musical instruments to our customers.</p>
        <p>At JaceInstrumental, we understand the importance of quality when it comes to musical instruments. That's why we carefully select and curate our collection to ensure that each instrument meets the highest standards of craftsmanship and performance.</p>
        <p>Our team of experienced musicians and experts is committed to helping musicians of all levels find the perfect instrument. Whether you're a beginner looking to start your musical journey or a seasoned musician seeking an upgrade, we have a wide range of instruments to suit your needs.</p>
        <p>Customer satisfaction is our top priority. We strive to provide exceptional customer service, quick and reliable shipping, and flexible return policies to ensure that you have a seamless shopping experience with us.</p>
        <p>At JaceInstrumental, we believe in the power of music to inspire, connect, and bring joy. We are dedicated to supporting the music community and fostering a love for music in people of all ages.</p>
        <p>Contact us today to learn more about our products and services. We look forward to assisting you on your musical journey!</p>                      
    </div>
</div>
@endsection