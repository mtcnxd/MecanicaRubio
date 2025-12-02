<h6 class="window-title shadow text-uppercase fw-bold">
    <span class="ms-3">{{ $title }}</span>
</h6>
<div {{ $attributes->merge(['class' => 'window-body shadow']) }}>
    {{ $slot }}
</div>