<?php

namespace Database\Factories;

use App\Models\Mosque;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mosque>
 */
class MosqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $names = [
            'Masjid Zahir',
            'Masjid Abu Bakar',
            'Masjid Abidin',
            'Masjid Kampung Laut',
        ];

        $locations = [
            // JOHOR
            'JHR01' => 'JHR01 - Pulau Aur dan Pulau Pemanggil',
            'JHR02' => 'JHR02 - Johor Bahru, Kota Tinggi, Mersing',
            'JHR03' => 'JHR03 - Kluang, Pontian',
            'JHR04' => 'JHR04 - Batu Pahat, Muar, Segamat, Gemas Johor',

            // KEDAH
            'KDH01' => 'KDH01 - Kota Setar, Kubang Pasu, Pokok Sena (Daerah Kecil)',
            'KDH02' => 'KDH02 - Kuala Muda, Yan, Pendang',
            'KDH03' => 'KDH03 - Padang Terap, Sik',
            'KDH04' => 'KDH04 - Baling',
            'KDH05' => 'KDH05 - Bandar Baharu, Kulim',
            'KDH06' => 'KDH06 - Langkawi',
            'KDH07' => 'KDH07 - Puncak Gunung Jerai',

            // KELANTAN
            'KTN01' => 'KTN01 - Bachok, Kota Bharu, Machang, Pasir Mas, Pasir Puteh, Tanah Merah, Tumpat, Kuala Krai, Mukim Chiku',
            'KTN03' => 'KTN03 - Gua Musang (Daerah Galas Dan Bertam), Jeli',

            // MELAKA
            'MLK01' => 'MLK01 - Seluruh Negeri Melaka',

            // NEGERI SEMBILAN
            'NGS01' => 'NGS01 - Tampin, Jempol',
            'NGS02' => 'NGS02 - Jelebu, Kuala Pilah, Port Dickson, Rembau, Seremban',

            // PAHANG
            'PHG01' => 'PHG01 - Pulau Tioman',
            'PHG02' => 'PHG02 - Kuantan, Pekan, Rompin, Muadzam Shah',
            'PHG03' => 'PHG03 - Jerantut, Temerloh, Maran, Bera, Chenor, Jengka',
            'PHG04' => 'PHG04 - Bentong, Lipis, Raub',
            'PHG05' => 'PHG05 - Genting Sempah, Janda Baik, Bukit Tinggi',
            'PHG06' => 'PHG06 - Cameron Highlands, Genting Higlands, Bukit Fraser',

            // PERLIS
            'PLS01' => 'PLS01 - Kangar, Padang Besar, Arau',

            // PULAU PINANG
            'PNG01' => 'PNG01 - Seluruh Negeri Pulau Pinang',

            // PERAK
            'PRK01' => 'PRK01 - Tapah, Slim River, Tanjung Malim',
            'PRK02' => 'PRK02 - Kuala Kangsar, Sg. Siput (Daerah Kecil), Ipoh, Batu Gajah, Kampar',
            'PRK03' => 'PRK03 - Lenggong, Pengkalan Hulu, Grik',
            'PRK04' => 'PRK04 - Temengor, Belum',
            'PRK05' => 'PRK05 - Kg Gajah, Teluk Intan, Bagan Datuk, Seri Iskandar, Beruas, Parit, Lumut, Sitiawan, Pulau Pangkor',
            'PRK06' => 'PRK06 - Selama, Taiping, Bagan Serai, Parit Buntar',
            'PRK07' => 'PRK07 - Bukit Larut',

            // SABAH
            'SBH01' => 'SBH01 - Bahagian Sandakan (Timur), Bukit Garam, Semawang, Temanggong, Tambisan, Bandar Sandakan, Sukau',
            'SBH02' => 'SBH02 - Beluran, Telupid, Pinangah, Terusan, Kuamut, Bahagian Sandakan (Barat)',
            'SBH03' => 'SBH03 - Lahad Datu, Silabukan, Kunak, Sahabat, Semporna, Tungku, Bahagian Tawau (Timur)',
            'SBH04' => 'SBH04 - Bandar Tawau, Balong, Merotai, Kalabakan, Bahagian Tawau (Barat)',
            'SBH05' => 'SBH05 - Kudat, Kota Marudu, Pitas, Pulau Banggi, Bahagian Kudat',
            'SBH06' => 'SBH06 - Gunung Kinabalu',
            'SBH07' => 'SBH07 - Kota Kinabalu, Ranau, Kota Belud, Tuaran, Penampang, Papar, Putatan, Bahagian Pantai Barat',
            'SBH08' => 'SBH08 - Pensiangan, Keningau, Tambunan, Nabawan, Bahagian Pendalaman (Atas)',
            'SBH09' => 'SBH09 - Beaufort, Kuala Penyu, Sipitang, Tenom, Long Pa Sia, Membakut, Weston, Bahagian Pendalaman (Bawah)',

            // SELANGOR
            'SGR01' => 'SGR01 - Gombak, Petaling, Sepang, Hulu Langat, Hulu Selangor, S.Alam',
            'SGR02' => 'SGR02 - Kuala Selangor, Sabak Bernam',
            'SGR03' => 'SGR03 - Klang, Kuala Langat',

            // SARAWAK
            'SWK01' => 'SWK01 - Limbang, Lawas, Sundar, Trusan',
            'SWK02' => 'SWK02 - Miri, Niah, Bekenu, Sibuti, Marudi',
            'SWK03' => 'SWK03 - Pandan, Belaga, Suai, Tatau, Sebauh, Bintulu',
            'SWK04' => 'SWK04 - Sibu, Mukah, Dalat, Song, Igan, Oya, Balingian, Kanowit, Kapit',
            'SWK05' => 'SWK05 - Sarikei, Matu, Julau, Rajang, Daro, Bintangor, Belawai',
            'SWK06' => 'SWK06 - Lubok Antu, Sri Aman, Roban, Debak, Kabong, Lingga, Engkelili, Betong, Spaoh, Pusa, Saratok',
            'SWK07' => 'SWK07 - Serian, Simunjan, Samarahan, Sebuyau, Meludam',
            'SWK08' => 'SWK08 - Kuching, Bau, Lundu, Sematan',
            'SWK09' => 'SWK09 - Zon Khas (Kampung Patarikan)',

            // TERENGGANU
            'TRG01' => 'TRG01 - Kuala Terengganu, Marang, Kuala Nerus',
            'TRG02' => 'TRG02 - Besut, Setiu',
            'TRG03' => 'TRG03 - Hulu Terengganu',
            'TRG04' => 'TRG04 - Dungun, Kemaman',

            // WILAYAH PERSEKUTUAN
            'WLY01' => 'WLY01 - Kuala Lumpur, Putrajaya',
            'WLY02' => 'WLY02 - Labuan',
        ];

        return [
            'name' => fake()->randomElement($names),
            'location' => fake()->randomElement($locations),
        ];
    }
}
