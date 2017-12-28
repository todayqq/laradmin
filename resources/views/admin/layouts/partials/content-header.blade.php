<section class="content-header">
    <h1>
        {{ $header or null }}
        <small>{{ $description or null }}</small>
    </h1>

    {{ $slot }}
</section>
