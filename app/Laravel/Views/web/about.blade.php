@extends('web._layouts.main')

@section('content')

<section class="about-hero">
    <div class="container">
        <div class="about-hero-content">
            <span class="section-label">
                {!! ($about_settings['hero']['label'] ?? '') ?: $default['hero']['label'] !!}
            </span>
            <h1 class="mt-3 d-flex gap-3">
                {!! ($about_settings['hero']['title'] ?? '') ?: $default['hero']['title'] !!}
                <span class="text-accent"> 
                    {!! ($about_settings['hero']['accent'] ?? '') ?: $default['hero']['accent'] !!}
                </span></h1>
            <p class="about-hero-description mt-4">
                {!! ($about_settings['hero']['description'] ?? '') ?: $default['hero']['description'] !!}
            </p>
        </div>

        <div class="mt-5">
            <img
                src="{{ asset('../assets/img/building-hallway.jpg') }}"
                alt="Creative workspace"
                class="about-hero-image"
            >
        </div>
    </div>

</section>

<section class="about-story">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="about-story-image-wrapper">
                    <img
                        src="{{ asset('../assets/img/pen-writing.jpg') }}"
                        alt="Writing and creativity"
                        class="about-story-image"
                        loading="lazy"
                    >
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-story-content">
                    <span class="section-label">
                        {!! ($about_settings['story']['label'] ?? '') ?: $default['story']['label'] !!}
                    </span>

                    <h2 class="mt-3">
                        {!! ($about_settings['story']['title'] ?? '') ?: $default['story']['title'] !!}
                    </h2>

                    <div class="class="mt-4"">
                        <p>
                            {!! ($about_settings['story']['paragraph1'] ?? '') ?: $default['story']['paragraph1'] !!}
                        </p>

                        <p>
                            {!! ($about_settings['story']['paragraph2'] ?? '') ?: $default['story']['paragraph2'] !!}
                        </p>

                        <p>
                            {!! ($about_settings['story']['paragraph3'] ?? '') ?: $default['story']['paragraph3'] !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="about-purpose">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">
                {!! ($about_settings['purpose']['label'] ?? '') ?: $default['purpose']['label'] !!}
            </span>
            <h2 class="editorial-heading section-title mt-3">
                {!! ($about_settings['purpose']['title'] ?? '') ?: $default['purpose']['title'] !!}
            </h2>
            <p class="section-description">
                {!! ($about_settings['purpose']['description'] ?? '') ?: $default['purpose']['description'] !!}
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="purpose-card">
                    <div class="purpose-icon">
                        <i class="bi bi-compass"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p class="mt-3">
                        {!! ($about_settings['purpose']['mission'] ?? '') ?: $default['purpose']['mission'] !!}
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="purpose-card">
                    <div class="purpose-icon">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p class="mt-3">
                       {!! ($about_settings['purpose']['vision'] ?? '') ?: $default['purpose']['vision'] !!}
                    </p>

                </div>
            </div>
        </div>
    </div>

</section>


<section class="about-values">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="editorial-heading section-title mt-3">
                {!! ($about_settings['values']['title'] ?? '') ?: $default['values']['title'] !!}
            </h2>
            <p {!! ($about_settings['values']['description'] ?? '') ?: $default['values']['description'] !!}</p>
        </div>


        <div class="row g-4">
            @for($i = 0; $i < 4; $i++)
                <div class="col-sm-6 col-lg-3">
                    <div class="value-item">
                        <span class="value-number">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h4>
                            {!! ($about_settings['values']['items'][$i]['title'] ?? '') ?: $default['values']['items'][$i]['title'] !!}
                        </h4>
                        <p class="mt-3">
                            {!! ($about_settings['values']['items'][$i]['description'] ?? '') ?: $default['values']['items'][$i]['description'] !!}
                        </p>
                    </div>
                </div>
            @endfor
        </div>

    </div>

</section>

<section class="about-cta">
    <div class="container">
        <h2 class="mt-3">{!! ($about_settings['cta']['title'] ?? '') ?: $default['cta']['title'] !!}</h2>
        <p>{!! ($about_settings['cta']['description'] ?? '') ?: $default['cta']['description'] !!}</p>

        <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="{{ route('web.articles') }}"
               class="btn btn-dark">
                Explore Articles &rarr;
            </a>
            <a href="{{ route('web.contact') }}"
               class="btn btn-outline-dark">
                Get in Touch
            </a>
        </div>
    </div>

</section>

@endsection

@section('page-styles')
<style>
.about-hero {
    padding: 0px 0 80px;
    background-color: var(--background-color);
}

.about-hero-content {
    max-width: 850px;
}

.about-hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(3rem, 6vw, 5rem);
    line-height: 1.15;
    letter-spacing: -2px;
    color: var(--primary-color);
}

.about-hero-description {
    max-width: 650px;
    color: var(--muted-color);
    font-size: 1.05rem;
    line-height: 1.9;
}

.about-hero-image {
    width: 100%;
    height: 460px;
    object-fit: cover;
    object-position: center;
    border-radius: 8px;
}

.about-story {
    padding: 90px 0;
    background-color: #FFFFFF;
}

.about-story-image-wrapper {
    overflow: hidden;
    border-radius: 8px;
}

.about-story-image {
    display: block;
    width: 100%;
    height: 480px;
    object-fit: cover;
}

.about-story-content {
    padding: 30px 35px;
}

.about-story-content h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem, 4vw, 2.8rem);
    line-height: 1.3;
    color: var(--primary-color);
}

.about-story-content p {
    /* color: var(--muted-color);
    font-size: 0.95rem; */
    line-height: 1.9;
}

.about-purpose {
    padding: 90px 0;
    background-color: #F2F0EB;
}

.purpose-card {
    height: 100%;
    padding: 40px;
    background-color: #FFFFFF;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    transition: transform 0.25s ease,
                box-shadow 0.25s ease;
}

.purpose-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.06);
}

.purpose-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 55px;
    height: 55px;
    margin-bottom: 25px;
    border-radius: 50%;
    background-color: #F8EEE8;
    color: var(--accent-color);
    font-size: 1.5rem;
}

.purpose-card h3 {
    font-family: 'Playfair Display', serif;
    font-size: 1.7rem;
    color: var(--primary-color);
}

.purpose-card p {
    color: var(--muted-color);
    font-size: 0.9rem;
    line-height: 1.9;
    margin-bottom: 0;
}

.about-values {
    padding: 100px 0;
    background-color: #FFFFFF;
}

.value-item {
    height: 100%;
    padding: 30px;
    border-top: 2px solid var(--accent-color);
    background-color: var(--background-color);
}

.value-number {
    display: block;
    margin-bottom: 25px;
    color: var(--accent-color);
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
}

.value-item h4 {
    font-family: 'Playfair Display', serif;
    font-size: 1.35rem;
    color: var(--primary-color);
}

.value-item p {
    color: var(--muted-color);
    font-size: 0.88rem;
    line-height: 1.8;
    margin-bottom: 0;
}

.about-cta {
    padding: 90px 0;
    background-color: var(--background-color);
    text-align: center;
}

.about-cta h2 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2rem, 4vw, 3rem);
    color: var(--primary-color);
}

.about-cta p {
    /* max-width: 600px; */
    /* margin: 18px auto 28px; */
    /* color: var(--muted-color); */
    line-height: 1.9;
}

@media (max-width: 992px) {

    .about-hero {
        padding: 0px 0 60px;
    }

    .about-hero-image {
        height: 380px;
    }

    .about-story-image {
        height: 380px;
    }

    .about-story-content {
        padding: 30px 10px;
    }

}

@media (max-width: 576px) {

    .about-hero {
        padding: 0;
    }

    .about-hero h1 {
        font-size: 3rem;
    }

    .about-hero-image {
        height: 280px;
    }

    .about-story,
    .about-purpose,
    .about-values {
        padding: 60px 0;
    }

    .about-story-image {
        height: 280px;
    }

    .purpose-card {
        padding: 30px 25px;
    }

    .value-item {
        padding: 25px;
    }

    .about-quote,
    .about-cta {
        padding: 65px 0;
    }

}

</style>
@endsection