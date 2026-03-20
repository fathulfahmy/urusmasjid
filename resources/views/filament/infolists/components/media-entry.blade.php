<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div class="flex flex-col gap-2">
        @php
            $media_items = $record->getMedia();
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

            <a href="{{ $link }}">
                <img src="{{ $thumb }}" alt="{{ $media->file_name }}">
            </a>
        @endforeach
    </div>
</x-dynamic-component>
