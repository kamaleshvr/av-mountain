@extends('layouts.app')

@section('title', 'Export Process')

@section('content')

{{-- Mini Hero --}}
<section class="hero" style="min-height:60vh;">
    <div class="hero-content container">
        <h1 class="animate-zoom-in">Our Export Process</h1>
        <p class="animate-fade-up delay-200">From Indian Farms to Global Markets &ndash; A Journey of Quality &amp; Trust</p>
    </div>
</section>

{{-- Process Steps --}}
<section class="section-padding">
    <div class="container" style="max-width:960px;">

        @php
        $steps = [
            ['num'=>1,'title'=>'Direct Sourcing from Farmers','img'=>'images/export-process/step-1.png','side'=>'right',
             'desc'=>'We believe quality starts at the source. Our procurement team works directly with certified farmers in Tamil Nadu and across India to select the finest produce.',
             'points'=>['Direct purchase ensuring fair trade prices for farmers.','On-field quality inspection before harvesting.','Selection of organic and chemical-free produce.']],
            ['num'=>2,'title'=>'Quality Testing &amp; Packaging','img'=>'images/export-process/step-2.png','side'=>'left',
             'desc'=>'Once sourced, the produce undergoes rigorous cleaning, sorting, and grading processes at our facility to meet international standards.',
             'points'=>['Advanced grading and moisture control systems.','Hygienic processing to retain freshness.','Export-grade packaging (Jute, Mesh, Vacuum-packed) to prevent damage.']],
            ['num'=>3,'title'=>'Export Documentation','img'=>'images/export-process/step-3.png','side'=>'right',
             'desc'=>'We handle all regulatory formalities to ensure a hassle-free import experience for you. Our team is expert in global trade compliance.',
             'points'=>['Phytosanitary Certification &amp; Country of Origin.','Customs Clearance &amp; Insurance handling.','Complete transparency with Invoice &amp; Packing Lists.']],
            ['num'=>4,'title'=>'Secure Shipping','img'=>'images/export-process/step-4.png','side'=>'left',
             'desc'=>'We partner with leading logistics providers for Air and Sea freight to ensure your cargo reaches safely and on time.',
             'points'=>['Container Loading supervision.','Temperature-controlled containers (Reefer) for perishables.','Live tracking updates until arrival.']],
            ['num'=>5,'title'=>'Delivery &amp; Partnership','img'=>'images/export-process/step-5.png','side'=>'right',
             'desc'=>"Our job doesn't end at shipping. We ensure you are satisfied with the delivery and aim to build a lasting business relationship.",
             'points'=>['On-time delivery confirmation.','Post-shipment support and feedback.','Long-term contracts for consistent supply.']],
        ];
        @endphp

        @foreach($steps as $step)
        <div class="glass-card animate-fade-up mb-4" style="animation-delay:{{ ($loop->index) * 0.1 }}s;">
            {{-- Step number badge --}}
            <div class="d-flex align-items-center mb-3" style="gap:0.75rem;">
                <div style="background:var(--primary-gold);color:var(--primary-black);width:38px;height:38px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:1.1rem;flex-shrink:0;">{{ $step['num'] }}</div>
                <h2 class="mb-0" style="font-size:1.4rem;">{!! $step['title'] !!}</h2>
            </div>

            <div class="row g-3 align-items-center {{ $step['side'] === 'left' ? 'flex-md-row-reverse' : '' }}">
                <div class="col-12 col-md-7">
                    <p class="mb-3">{!! $step['desc'] !!}</p>
                    <ul style="list-style:disc;padding-left:1.5rem;color:var(--text-gray);">
                        @foreach($step['points'] as $point)
                            <li class="mb-1">{!! $point !!}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-md-5">
                    <div style="border-radius:12px;overflow:hidden;box-shadow:0 8px 24px rgba(0,0,0,0.4);">
                        <img src="{{ asset($step['img']) }}"
                             alt="Step {{ $step['num'] }} - {{ $step['title'] }}"
                             style="width:100%;height:220px;object-fit:cover;display:block;transition:transform 0.5s ease;"
                             onmouseover="this.style.transform='scale(1.05)'"
                             onmouseout="this.style.transform='scale(1)'">
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {{-- CTA --}}
        <div class="text-center mt-5">
            <h3 class="mb-4">Ready to Import from India?</h3>
            <a href="{{ route('contact') }}" class="btn btn-primary">Start Your Order</a>
        </div>

    </div>
</section>

@endsection