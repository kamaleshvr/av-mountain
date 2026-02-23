@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container page-header">
    <h1 class="text-center">Get in Touch</h1>
</div>

<div class="container pb-5">
    <div class="row g-4">

        {{-- Contact Info --}}
        <div class="col-12 col-md-5">
            <div class="glass-card h-100">
                <h2>Contact Information</h2>
                <div class="mt-4" style="display:flex;flex-direction:column;gap:1.5rem;">
                    <div>
                        <p class="mb-1"><strong>&#128205; Address:</strong></p>
                        <p style="color:var(--text-gray);">
                            AV Mountain Private Limited<br>
                            Perumagoundanur, Periyasoragai post,<br>
                            Salem District - 636502,<br>
                            Tamil Nadu, India
                        </p>
                    </div>
                    <div>
                        <p class="mb-1"><strong>&#128222; Phone / &#128246; WhatsApp:</strong></p>
                        <p>
                            <a href="tel:9688268925" style="color:var(--primary-gold);">9688268925</a>,&nbsp;
                            <a href="tel:7539946303" style="color:var(--primary-gold);">7539946303</a>
                        </p>
                    </div>
                    <div>
                        <p class="mb-1"><strong>&#128231; Email:</strong></p>
                        <a href="mailto:av23mountain@gmail.com" style="color:var(--primary-gold);">av23mountain@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contact Form --}}
        <div class="col-12 col-md-7">
            <div class="glass-card h-100">
                <h2>Send us a Message</h2>

                @if(session('success'))
                    <div class="alert" style="background:rgba(16,185,129,0.2);border:1px solid #10b981;color:#fff;padding:1rem;border-radius:8px;margin-top:1rem;">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" required class="form-control">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Message</label>
                        <textarea name="message" rows="5" required class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Send Message</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection