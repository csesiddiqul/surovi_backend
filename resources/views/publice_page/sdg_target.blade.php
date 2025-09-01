@extends('layouts.public')

@section('content')
<style>
    .goal-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease-out, padding 0.4s ease;
        padding: 0 15px;
        background: #fafafa;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 10px;
    }

    .goal-content.show {
        max-height: none;
        padding: 15px;
    }
</style>

<section class="main-about">
    <div class="about-bg">
        <div class="container">
            <h1 style="margin-top:8%; color:#d00b01; text-align: center;">
                <span class="about-color">SDG Target</span>
            </h1>
        </div>
    </div>
</section>

<section style="width: 100%; padding: 20px;">
    @foreach($results as $key => $sdg)
        @if($sdg->id == 1)
            <div style="
                width: 100%;
                border: 1px solid #ccc;
                border-radius: 10px;
                padding: 20px;
                background-color: #fefefe;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                text-align: center;
            ">
                <img src="{{ asset($sdg->img) }}" alt="SDG Image"
                    style="width: 100%; height: auto; border-radius: 8px; margin-bottom: 20px;">

                <a href="javascript:void(0)" class="title"
                   style="font-size: 26px; font-weight: bold; color: #222; text-decoration: none; display: block; margin-bottom: 15px;">
                    {!! \Illuminate\Support\Str::limit($sdg->title, 50) !!}
                </a>

                <p style="font-size: 16px; color: #444; line-height: 1.8; text-align: justify;">
                    {!! $sdg->description !!}
                </p>
            </div>
        @endif
    @endforeach
</section>

<section class="p-4">
    @foreach($results->reject(fn($sdg) => $sdg->id == 1) as $sdg)
        <div style="margin-bottom: 20px;">
            <!-- Goal Header (Clickable) -->
            <p onclick="toggleGoal({{ $sdg->id }})"
               style="cursor: pointer; font-weight: bold; font-size: 18px; background: #f0f0f0; padding: 10px; border-radius: 5px; display: flex; justify-content: space-between; align-items: center;">
                <span>{{ $sdg->goal }}</span>
                <span id="icon-{{ $sdg->id }}">+</span>
            </p>

            <!-- Hidden Content -->
            <div id="goal-{{ $sdg->id }}" class="goal-content">
                <p style="margin-bottom: 4px; font-size: 16px; font-weight: bold;">{{ $sdg->title }}</p>
                <img src="{{ asset($sdg->img) }}" alt="SDG Image"
                     style="max-width: 100%; height: auto; margin-bottom: 10px;">
                <div style="color: #444; line-height: 1.6;">
                    {!! $sdg->description !!}
                </div>
            </div>
        </div>
    @endforeach
</section>

<script>
    function toggleGoal(id) {
        const selected = document.getElementById('goal-' + id);
        const allGoals = document.querySelectorAll('.goal-content');
        const allIcons = document.querySelectorAll('[id^="icon-"]');

        allGoals.forEach(el => {
            if (el.id !== 'goal-' + id) {
                el.classList.remove('show');
            }
        });

        allIcons.forEach(icon => {
            if (icon.id !== 'icon-' + id) {
                icon.innerText = '+';
            }
        });

        selected.classList.toggle('show');
        const icon = document.getElementById('icon-' + id);
        icon.innerText = selected.classList.contains('show') ? '-' : '+';
    }
</script>
@endsection
