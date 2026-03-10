@extends('front.layout')
@section('content')

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5 wow fadeInUp" data-wow-delay="0.2s">
            <h4 class="text-primary">Get In Touch</h4>
            <h1 class="display-4 mb-4">Contact Nutech Office System Pvt. Ltd.</h1>
            <p class="text-muted mb-0">Have a question or want to request a quote? Fill the form below or use our contact details.</p>
        </div>

        <div class="row g-5">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <form action="{{ url('/contact/submit') }}" method="POST" class="p-4 border rounded bg-light">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 px-4">Send Message</button>
                </form>
            </div>

            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <div class="mb-4">
                    <h4 class="text-primary">Contact Details</h4>
                    <p><strong>Address:</strong> Sreema Complex, Near Mahendra Showroom, Jalkal, Maheshtala, Kolkata-700141, West Bengal</p>
                    <p><strong>Email:</strong> <a href="mailto:info@nutechoffice.com">info@nutechoffice.com</a></p>
                    <p><strong>Phone:</strong> +91-1234567890</p>
                    <p><strong>GST No:</strong> 19AAECN4657P2ZN</p>
                </div>

                <div class="ratio ratio-16x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3688.715066217858!2d88.31212641505156!3d22.51249488521854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0273c8c99b1f13%3A0x6fa23946da7a5c3d!2sSreema%20Complex%2C%20Maheshtala%2C%20Kolkata%2C%20West%20Bengal%20700141!5e0!3m2!1sen!2sin!4v1697645600000!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection