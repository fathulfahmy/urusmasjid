<div>
    @php
        $media_items = $record->getMedia()->take(5);
    @endphp

    @foreach ($media_items as $media)
        @php
            $is_image = str_starts_with($media->mime_type, 'image/');
            $is_pdf = $media->mime_type === 'application/pdf';

            $link = $media->getUrl();

            if ($is_image) {
                $thumb = $media->getUrl();
            } elseif ($is_pdf) {
                $thumb = $media->getUrl('pdf-thumb');
            } else {
                $thumb = null;
            }

        @endphp
        @if ($thumb)
            <a href="{{ $link }}">
                <img class="inline h-10 object-cover" src="{{ $thumb }}" alt="{{ $media->file_name }}">
            </a>
        @endif
    @endforeach
</div>
