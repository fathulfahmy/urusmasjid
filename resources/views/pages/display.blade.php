<?php

use App\Models\Gallery;
use App\Models\Mosque;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

new class extends Component {
    #[Computed]
    public function galleries()
    {
        return Gallery::all();
    }

    #[Computed]
    public function mosque()
    {
        return Mosque::latest()->first();
    }

    #[Computed]
    public function prayer_times()
    {
        try {
            $mosque = $this->mosque;
            if (!$mosque || !$mosque->location) {
                return [];
            }

            $response = Http::get("https://www.e-solat.gov.my/index.php?r=esolatApi/takwimsolat&zone={$mosque->location}&period=today");
            if (!$response->successful()) {
                return [];
            }

            $data = $response->json()['prayerTime'][0] ?? null;
            if (!$data) {
                return [];
            }

            $map = [
                __('Fajr') => 'fajr',
                __('Dhuhr') => 'dhuhr',
                __('Asr') => 'asr',
                __('Maghrib') => 'maghrib',
                __('Isha') => 'isha',
            ];

            return collect($map)
                ->map(function ($map_value, $map_key) use ($data) {
                    $prayer_time = Carbon::createFromFormat('H:i:s', $data[$map_value]);
                    return [
                        'label' => $map_key,
                        'time' => $prayer_time->format('h:i A'),
                        'timestamp' => $prayer_time->timestamp,
                    ];
                })
                ->toArray();
        } catch (\Exception $e) {
            return [];
        }
    }
};
?>

<div class="relative m-0 h-screen w-screen overflow-hidden bg-black text-white">

    <div class="absolute inset-0 z-50 hidden flex-col items-center justify-center bg-black text-white" id="overlay">
        <h1 class="text-9xl font-semibold uppercase">{{ __('Pray') }}</h1>
    </div>

    <div class="relative h-screen w-full overflow-hidden">
        <div class="flex h-full w-full transition-transform duration-1000 ease-in-out" id="carousel">
            @foreach ($this->galleries as $gallery)
                @php
                    $media = $gallery->getMedia();
                    $url = $media && count($media) > 0 ? $media[0]->getUrl() : null;
                    $duration = $gallery->duration ?: 5;
                @endphp
                <div class="slide-item h-full w-full flex-none" data-duration="{{ $duration }}">
                    <img class="h-full w-full object-contain" src="{{ $url }}" alt="Gallery Image">
                </div>
            @endforeach
        </div>

        <div class="absolute bottom-0 left-0 right-0 z-40 flex gap-2 bg-black p-2 text-center text-white">
            @forelse ($this->prayer_times as $prayer_time)
                <div class="prayer-card flex-1 rounded-3xl bg-neutral-800 p-4 transition-all"
                    data-timestamp="{{ $prayer_time['timestamp'] }}">
                    <p class="pb-2 font-semibold uppercase">{{ $prayer_time['label'] }}</p>
                    <p class="text-5xl font-semibold">{{ $prayer_time['time'] }}</p>
                    <p class="prayer-time-diff">0 {{ __('hour') }} 0 {{ __('minute') }} 0 {{ __('second') }}</p>
                </div>
            @empty
            @endforelse
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const carousel = document.getElementById('carousel');
            const overlay = document.getElementById('overlay');
            const prayerCards = document.querySelectorAll('.prayer-card');

            const prayerUnit = {
                'hour': "{{ __('hour') }}",
                'minute': "{{ __('minute') }}",
                'second': "{{ __('second') }}",
            };

            const iqamatDuration = 10 * 60;
            const prayerDuration = 10 * 60;

            if (carousel && carousel.children.length > 1) {
                let index = 0;
                const slides = carousel.querySelectorAll('.slide-item');

                function showNextMedia() {
                    const carouselDuration = parseInt(slides[index].dataset.duration) || 5;

                    setTimeout(() => {
                        index = (index + 1) % slides.length;
                        carousel.style.transform = `translateX(-${index * 100}%)`;
                        showNextMedia();
                    }, carouselDuration * 1000);
                }

                showNextMedia();
            }

            function updatePrayerTime() {
                const now = Math.floor(Date.now() / 1000);
                let showOverlay = false;

                prayerCards.forEach(card => {
                    const targetTime = parseInt(card.dataset.timestamp);
                    const diffTime = targetTime - now;
                    const diffText = card.querySelector('.prayer-time-diff');

                    if (diffTime > 0) {
                        const hour = Math.floor(diffTime / 3600);
                        const minute = Math.floor((diffTime % 3600) / 60);
                        const second = diffTime % 60;
                        diffText.innerText =
                            `${hour} ${prayerUnit.hour} ${minute} ${prayerUnit.minute} ${second} ${prayerUnit.second}`;
                    } else if (diffTime <= 0 && diffTime > -iqamatDuration) {
                        diffText.innerText = "Iqamat";
                    } else if (diffTime <= -iqamatDuration && diffTime > -(iqamatDuration +
                            prayerDuration)) {
                        diffText.innerText =
                            `0 ${prayerUnit.hour} 0 ${prayerUnit.minute} 0 ${prayerUnit.second}`;
                        showOverlay = true;
                    } else {
                        diffText.innerText =
                            `0 ${prayerUnit.hour} 0 ${prayerUnit.minute} 0 ${prayerUnit.second}`;
                    }
                });

                if (showOverlay) {
                    overlay.classList.remove('hidden');
                    overlay.classList.add('flex');
                } else {
                    overlay.classList.add('hidden');
                    overlay.classList.remove('flex');
                }
            }

            updatePrayerTime();
            setInterval(updatePrayerTime, 1000);
        });
    </script>
</div>
