@extends('layouts.landing-main')

@section('content')
<div class="container p-5 min-vh-100">
    <div class="row">
        <div class="col-lg-6">
            <h3>Contact Us</h3>
            <p>If you have any questions or inquiries, feel free to get in touch with us.</p>
            <ul class="list-unstyled">
                <li><i class="bi bi-envelope"></i> Email: info@jaceinstrumental.com</li>
                <li><i class="bi bi-phone"></i> Phone: +1 123 456 7890</li>
                <li><i class="bi bi-geo-alt"></i> Address: 123 Music Street, City, Country</li>
            </ul>
        </div>
        <div class="col-lg-6">
            <h3>Send Message</h3>
            <form action="#" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group mb-2">
                    <label for="email">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group mb-2">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn text-white" style="background-color: #742317;">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection
