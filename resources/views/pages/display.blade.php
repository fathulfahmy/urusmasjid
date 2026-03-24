<?php

use App\Models\Gallery;
use App\Models\Mosque;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Livewire\Attributes\Title;

new #[Title('Display')] class extends Component {
    #[Computed]
    public function galleries()
    {
        return Gallery::orderBy('order_column')->get();
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
            if (!$mosque || !$mosque->address) {
                return [];
            }

            $cache_key = 'prayer_times_' . md5($mosque->address . $mosque->method . $mosque->school);

            return Cache::remember($cache_key, now()->endOfDay(), function () use ($mosque) {
                $timezone = $mosque->timezone ?? config('app.timezone');
                $date = now()->timezone($timezone)->format('d-m-Y');

                $response = Http::get("https://api.aladhan.com/v1/timingsByAddress/{$date}", [
                    'address' => $mosque->address,
                    'method' => $mosque->method ?? 17,
                    'school' => $mosque->school ?? 0,
                    'timezonestring' => $timezone,
                    'tune' => $mosque->tune,
                ]);

                if (!$response->successful()) {
                    return [];
                }

                $data = $response->json()['data']['timings'] ?? null;
                if (!$data) {
                    return [];
                }

                $map = [
                    __('Fajr') => 'Fajr',
                    __('Dhuhr') => 'Dhuhr',
                    __('Asr') => 'Asr',
                    __('Maghrib') => 'Maghrib',
                    __('Isha') => 'Isha',
                ];

                return collect($map)
                    ->map(function ($api_key, $label) use ($data, $date, $timezone) {
                        $prayer_time = Carbon::createFromFormat('d-m-Y H:i', "{$date} {$data[$api_key]}", $timezone);

                        return [
                            'label' => $label,
                            'time' => $prayer_time->format('h:i A'),
                            'timestamp' => $prayer_time->timestamp,
                        ];
                    })
                    ->toArray();
            });
        } catch (\Exception $e) {
            return [];
        }
    }
};
?>

<div class="relative flex h-screen w-screen flex-col overflow-hidden bg-white dark:bg-zinc-900">

    {{-- OVERLAY --}}
    <div class="absolute inset-0 z-50 hidden flex-col items-center justify-center bg-white dark:bg-zinc-900"
        id="overlay">
        <h1 class="text-9xl font-semibold uppercase text-zinc-900 dark:text-white">{{ __('Pray') }}</h1>
    </div>

    {{-- CAROUSEL --}}
    <div class="relative flex-1 overflow-hidden">
        <div class="flex h-full w-full transition-transform duration-1000 ease-in-out" id="carousel">
            @foreach ($this->galleries as $gallery)
                <div class="slide-item h-full w-full flex-none" data-duration="{{ $gallery->duration ?: 5 }}">
                    <img class="h-full w-full object-contain" src="{{ $gallery->getFirstMediaUrl() }}"
                        alt="Gallery Image">
                </div>
            @endforeach
        </div>
    </div>

    {{-- PRAYER TIMES --}}
    <div class="flex flex-col gap-1 p-2 md:flex-row md:gap-2">
        <div
            class="grid flex-1 grid-cols-12 items-center rounded-xl bg-zinc-100 px-4 py-4 text-zinc-900 transition-all md:flex md:flex-col md:rounded-2xl md:px-2 md:text-center dark:bg-zinc-800 dark:text-white">

            <p class="col-span-8 md:pb-2 md:text-xs lg:text-sm xl:text-base 2xl:text-lg">
                {{ __('Clock') }}
            </p>
            <p class="col-span-4 text-right font-semibold md:text-center md:text-xl lg:text-2xl xl:text-3xl 2xl:text-4xl"
                id="clock">
                00:00 AM
            </p>
            <p class="hidden text-zinc-700 md:block md:text-xs lg:text-sm xl:text-base 2xl:text-lg dark:text-zinc-200">
                {{ now()->format('D d/m/y') }}
            </p>
        </div>

        @forelse ($this->prayer_times as $prayer_time)
            <div class="prayer-card grid flex-1 grid-cols-12 items-center rounded-xl bg-zinc-100 px-4 py-4 text-zinc-900 transition-all md:flex md:flex-col md:rounded-2xl md:px-2 md:text-center dark:bg-zinc-800 dark:text-white"
                data-timestamp="{{ $prayer_time['timestamp'] }}">

                <p class="col-span-8 md:pb-2 md:text-xs lg:text-sm xl:text-base 2xl:text-lg">
                    {{ $prayer_time['label'] }}
                </p>

                <p
                    class="col-span-4 text-right font-semibold md:text-center md:text-xl lg:text-2xl xl:text-3xl 2xl:text-4xl">
                    {{ $prayer_time['time'] }}
                </p>

                <p
                    class="prayer-time-diff hidden text-zinc-700 md:block md:text-xs lg:text-sm xl:text-base 2xl:text-lg dark:text-zinc-200">
                    0{{ __('h') }} 0{{ __('m') }} 0{{ __('s') }}
                </p>
            </div>
        @empty
        @endforelse
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // RELOAD AT MIDNIGHT
            function reloadAtMidnight() {
                const now = new Date();
                const midnight = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1, 0, 0, 5);
                const midnightDuration = midnight.getTime() - now.getTime();

                setTimeout(() => {
                    window.location.reload();
                }, midnightDuration);
            }
            reloadAtMidnight();

            // CAROUSEL
            const carousel = document.getElementById('carousel');
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

            // PRAYER TIMES
            const prayerCards = document.querySelectorAll('.prayer-card');
            const overlay = document.getElementById('overlay');

            if (prayerCards && overlay) {
                const adhanDuration = {{ $this->mosque->adhan_duration }} * 60;
                const prayerDuration = {{ $this->mosque->prayer_duration }} * 60;
                const prayerUnit = {
                    'hour': "{{ __('h') }}",
                    'minute': "{{ __('m') }}",
                    'second': "{{ __('s') }}",
                };

                function updatePrayerTime() {
                    const isMobile = window.innerWidth < 768;

                    const clock = document.getElementById('clock');
                    if (clock) {
                        clock.innerText = new Date().toLocaleTimeString('en-US', {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: true
                        });
                    }

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
                                `${hour}${prayerUnit.hour} ${minute}${prayerUnit.minute} ${second}${prayerUnit.second}`;
                        } else if (diffTime <= 0 && diffTime > -adhanDuration) {
                            diffText.innerText = "Adhan";
                        } else if (diffTime <= -adhanDuration && diffTime > -(adhanDuration +
                                prayerDuration)) {
                            diffText.innerText =
                                `0${prayerUnit.hour} 0${prayerUnit.minute} 0${prayerUnit.second}`;
                            showOverlay = true;
                        } else {
                            diffText.innerText =
                                `0${prayerUnit.hour} 0${prayerUnit.minute} 0${prayerUnit.second}`;
                        }
                    });

                    if (showOverlay && !isMobile) {
                        overlay.classList.remove('hidden');
                        overlay.classList.add('flex');
                    } else {
                        overlay.classList.add('hidden');
                        overlay.classList.remove('flex');
                    }
                }

                updatePrayerTime();
                setInterval(updatePrayerTime, 1000);
            }
        });
    </script>
</div>
