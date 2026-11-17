<?php
/**
 * Database Wilayah & Tarif Dasar Ekspedisi For The Little (FTL)
 * Terkoneksi otomatis untuk cek ongkir J&T, JNE, SiCepat
 */

$SHIPPING_DATA = [
    'DKI Jakarta' => [
        'base' => ['jnt' => 10000, 'jne' => 10000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
        'cities' => [
            'Kota Jakarta Selatan' => ['jnt' => 10000, 'jne' => 10000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
            'Kota Jakarta Pusat'   => ['jnt' => 10000, 'jne' => 10000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
            'Kota Jakarta Barat'   => ['jnt' => 10000, 'jne' => 10000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
            'Kota Jakarta Timur'   => ['jnt' => 10000, 'jne' => 10000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
            'Kota Jakarta Utara'   => ['jnt' => 10000, 'jne' => 10000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
            'Kepulauan Seribu'     => ['jnt' => 18000, 'jne' => 20000, 'sicepat' => 19000, 'etd' => '2-3 Hari'],
        ]
    ],
    'Banten' => [
        'base' => ['jnt' => 11000, 'jne' => 12000, 'sicepat' => 11000, 'etd' => '1-2 Hari'],
        'cities' => [
            'Kota Tangerang Selatan' => ['jnt' => 10000, 'jne' => 10000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
            'Kota Tangerang'         => ['jnt' => 10000, 'jne' => 11000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
            'Kab. Tangerang'         => ['jnt' => 10000, 'jne' => 11000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
            'Kota Serang'            => ['jnt' => 11000, 'jne' => 12000, 'sicepat' => 11000, 'etd' => '1-2 Hari'],
            'Kota Cilegon'           => ['jnt' => 12000, 'jne' => 13000, 'sicepat' => 12000, 'etd' => '1-2 Hari'],
            'Kab. Serang'            => ['jnt' => 12000, 'jne' => 13000, 'sicepat' => 12000, 'etd' => '2-3 Hari'],
            'Kab. Lebak'             => ['jnt' => 13000, 'jne' => 14000, 'sicepat' => 13000, 'etd' => '2-3 Hari'],
            'Kab. Pandeglang'        => ['jnt' => 13000, 'jne' => 14000, 'sicepat' => 13000, 'etd' => '2-3 Hari'],
        ]
    ],
    'Jawa Barat' => [
        'base' => ['jnt' => 12000, 'jne' => 13000, 'sicepat' => 12000, 'etd' => '1-2 Hari'],
        'cities' => [
            'Kota Bekasi'         => ['jnt' => 10000, 'jne' => 10000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
            'Kota Depok'          => ['jnt' => 10000, 'jne' => 10000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
            'Kota Bogor'          => ['jnt' => 11000, 'jne' => 11000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
            'Kab. Bogor'          => ['jnt' => 11000, 'jne' => 12000, 'sicepat' => 11000, 'etd' => '1-2 Hari'],
            'Kab. Bekasi'         => ['jnt' => 10000, 'jne' => 11000, 'sicepat' => 10000, 'etd' => '1-2 Hari'],
            'Kota Bandung'        => ['jnt' => 11000, 'jne' => 12000, 'sicepat' => 11000, 'etd' => '1-2 Hari'],
            'Kota Cimahi'         => ['jnt' => 11000, 'jne' => 12000, 'sicepat' => 11000, 'etd' => '1-2 Hari'],
            'Kab. Bandung'        => ['jnt' => 12000, 'jne' => 13000, 'sicepat' => 12000, 'etd' => '1-2 Hari'],
            'Kab. Bandung Barat'  => ['jnt' => 12000, 'jne' => 13000, 'sicepat' => 12000, 'etd' => '1-2 Hari'],
            'Kab. Karawang'       => ['jnt' => 11000, 'jne' => 12000, 'sicepat' => 11000, 'etd' => '1-2 Hari'],
            'Kab. Purwakarta'     => ['jnt' => 11000, 'jne' => 12000, 'sicepat' => 11000, 'etd' => '1-2 Hari'],
            'Kab. Subang'         => ['jnt' => 12000, 'jne' => 13000, 'sicepat' => 12000, 'etd' => '1-2 Hari'],
            'Kota Cirebon'        => ['jnt' => 12000, 'jne' => 13000, 'sicepat' => 12000, 'etd' => '1-2 Hari'],
            'Kab. Cirebon'        => ['jnt' => 13000, 'jne' => 14000, 'sicepat' => 13000, 'etd' => '2-3 Hari'],
            'Kota Sukabumi'       => ['jnt' => 12000, 'jne' => 13000, 'sicepat' => 12000, 'etd' => '1-2 Hari'],
            'Kab. Sukabumi'       => ['jnt' => 13000, 'jne' => 14000, 'sicepat' => 13000, 'etd' => '2-3 Hari'],
            'Kab. Cianjur'        => ['jnt' => 12000, 'jne' => 13000, 'sicepat' => 12000, 'etd' => '2-3 Hari'],
            'Kota Tasikmalaya'    => ['jnt' => 13000, 'jne' => 14000, 'sicepat' => 13000, 'etd' => '2-3 Hari'],
            'Kab. Tasikmalaya'    => ['jnt' => 14000, 'jne' => 15000, 'sicepat' => 14000, 'etd' => '2-3 Hari'],
            'Kab. Garut'          => ['jnt' => 13000, 'jne' => 14000, 'sicepat' => 13000, 'etd' => '2-3 Hari'],
            'Kab. Sumedang'       => ['jnt' => 13000, 'jne' => 14000, 'sicepat' => 13000, 'etd' => '2-3 Hari'],
            'Kab. Indramayu'      => ['jnt' => 13000, 'jne' => 14000, 'sicepat' => 13000, 'etd' => '2-3 Hari'],
            'Kab. Kuningan'       => ['jnt' => 13000, 'jne' => 14000, 'sicepat' => 13000, 'etd' => '2-3 Hari'],
            'Kab. Majalengka'     => ['jnt' => 13000, 'jne' => 14000, 'sicepat' => 13000, 'etd' => '2-3 Hari'],
            'Kab. Ciamis'         => ['jnt' => 14000, 'jne' => 15000, 'sicepat' => 14000, 'etd' => '2-3 Hari'],
            'Kota Banjar'         => ['jnt' => 14000, 'jne' => 15000, 'sicepat' => 14000, 'etd' => '2-3 Hari'],
            'Kab. Pangandaran'    => ['jnt' => 15000, 'jne' => 16000, 'sicepat' => 15000, 'etd' => '2-3 Hari'],
        ]
    ],
    'Jawa Tengah' => [
        'base' => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
        'cities' => [
            'Kota Semarang'         => ['jnt' => 15000, 'jne' => 16000, 'sicepat' => 15000, 'etd' => '1-2 Hari'],
            'Kota Surakarta (Solo)' => ['jnt' => 15000, 'jne' => 16000, 'sicepat' => 15000, 'etd' => '1-2 Hari'],
            'Kota Tegal'            => ['jnt' => 14000, 'jne' => 15000, 'sicepat' => 14000, 'etd' => '1-2 Hari'],
            'Kota Pekalongan'       => ['jnt' => 15000, 'jne' => 16000, 'sicepat' => 15000, 'etd' => '2-3 Hari'],
            'Kota Magelang'         => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
            'Kota Salatiga'         => ['jnt' => 15000, 'jne' => 16000, 'sicepat' => 15000, 'etd' => '2-3 Hari'],
            'Kab. Banyumas'         => ['jnt' => 15000, 'jne' => 16000, 'sicepat' => 15000, 'etd' => '2-3 Hari'],
            'Kab. Cilacap'          => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
            'Kab. Brebes'           => ['jnt' => 14000, 'jne' => 15000, 'sicepat' => 14000, 'etd' => '2-3 Hari'],
            'Kab. Kudus'            => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
            'Kab. Klaten'           => ['jnt' => 15000, 'jne' => 16000, 'sicepat' => 15000, 'etd' => '2-3 Hari'],
            'Kab. Boyolali'         => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
            'Kab. Sukoharjo'        => ['jnt' => 15000, 'jne' => 16000, 'sicepat' => 15000, 'etd' => '2-3 Hari'],
            'Kab. Karanganyar'      => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
            'Kab. Sragen'           => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
            'Kab. Jepara'           => ['jnt' => 17000, 'jne' => 18000, 'sicepat' => 17000, 'etd' => '2-3 Hari'],
            'Kab. Pati'             => ['jnt' => 17000, 'jne' => 18000, 'sicepat' => 17000, 'etd' => '2-3 Hari'],
            'Kab. Kendal'           => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
            'Kab. Demak'            => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
            'Kab. Kebumen'          => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
            'Kab. Purworejo'        => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
            'Kab. Wonosobo'         => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
        ]
    ],
    'DI Yogyakarta' => [
        'base' => ['jnt' => 15000, 'jne' => 16000, 'sicepat' => 15000, 'etd' => '1-2 Hari'],
        'cities' => [
            'Kota Yogyakarta'   => ['jnt' => 15000, 'jne' => 16000, 'sicepat' => 15000, 'etd' => '1-2 Hari'],
            'Kab. Sleman'       => ['jnt' => 15000, 'jne' => 16000, 'sicepat' => 15000, 'etd' => '1-2 Hari'],
            'Kab. Bantul'       => ['jnt' => 15000, 'jne' => 16000, 'sicepat' => 15000, 'etd' => '1-2 Hari'],
            'Kab. Kulon Progo'  => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
            'Kab. Gunungkidul'  => ['jnt' => 16000, 'jne' => 17000, 'sicepat' => 16000, 'etd' => '2-3 Hari'],
        ]
    ],
    'Jawa Timur' => [
        'base' => ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '2-3 Hari'],
        'cities' => [
            'Kota Surabaya'     => ['jnt' => 17000, 'jne' => 18000, 'sicepat' => 17000, 'etd' => '1-2 Hari'],
            'Kab. Sidoarjo'     => ['jnt' => 17000, 'jne' => 18000, 'sicepat' => 17000, 'etd' => '1-2 Hari'],
            'Kab. Gresik'       => ['jnt' => 17000, 'jne' => 18000, 'sicepat' => 17000, 'etd' => '2-3 Hari'],
            'Kota Malang'       => ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '2-3 Hari'],
            'Kab. Malang'       => ['jnt' => 19000, 'jne' => 20000, 'sicepat' => 19000, 'etd' => '2-3 Hari'],
            'Kota Batu'         => ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '2-3 Hari'],
            'Kota Kediri'       => ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '2-3 Hari'],
            'Kota Madiun'       => ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '2-3 Hari'],
            'Kota Blitar'       => ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '2-3 Hari'],
            'Kota Pasuruan'     => ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '2-3 Hari'],
            'Kota Probolinggo'  => ['jnt' => 19000, 'jne' => 20000, 'sicepat' => 19000, 'etd' => '2-3 Hari'],
            'Kota Mojokerto'    => ['jnt' => 17000, 'jne' => 18000, 'sicepat' => 17000, 'etd' => '2-3 Hari'],
            'Kab. Jember'       => ['jnt' => 20000, 'jne' => 21000, 'sicepat' => 20000, 'etd' => '2-3 Hari'],
            'Kab. Banyuwangi'   => ['jnt' => 21000, 'jne' => 22000, 'sicepat' => 21000, 'etd' => '2-3 Hari'],
            'Kab. Bojonegoro'   => ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '2-3 Hari'],
            'Kab. Tuban'        => ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '2-3 Hari'],
            'Kab. Lamongan'     => ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '2-3 Hari'],
        ]
    ],
    'Bali' => [
        'base' => ['jnt' => 21000, 'jne' => 22000, 'sicepat' => 21000, 'etd' => '2-3 Hari'],
        'cities' => [
            'Kota Denpasar' => ['jnt' => 20000, 'jne' => 21000, 'sicepat' => 20000, 'etd' => '2-3 Hari'],
            'Kab. Badung'   => ['jnt' => 20000, 'jne' => 21000, 'sicepat' => 20000, 'etd' => '2-3 Hari'],
            'Kab. Gianyar'  => ['jnt' => 21000, 'jne' => 22000, 'sicepat' => 21000, 'etd' => '2-3 Hari'],
            'Kab. Tabanan'  => ['jnt' => 22000, 'jne' => 23000, 'sicepat' => 22000, 'etd' => '2-3 Hari'],
            'Kab. Buleleng' => ['jnt' => 23000, 'jne' => 24000, 'sicepat' => 23000, 'etd' => '2-4 Hari'],
        ]
    ],
    'Lampung' => [
        'base' => ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '1-2 Hari'],
        'cities' => [
            'Kota Bandar Lampung' => ['jnt' => 17000, 'jne' => 18000, 'sicepat' => 17000, 'etd' => '1-2 Hari'],
            'Kota Metro'          => ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '2-3 Hari'],
            'Kab. Lampung Selatan'=> ['jnt' => 18000, 'jne' => 19000, 'sicepat' => 18000, 'etd' => '2-3 Hari'],
        ]
    ],
    'Sumatera Selatan' => [
        'base' => ['jnt' => 21000, 'jne' => 22000, 'sicepat' => 21000, 'etd' => '2-3 Hari'],
        'cities' => [
            'Kota Palembang' => ['jnt' => 20000, 'jne' => 21000, 'sicepat' => 20000, 'etd' => '2-3 Hari'],
            'Kota Prabumulih'=> ['jnt' => 22000, 'jne' => 24000, 'sicepat' => 23000, 'etd' => '2-3 Hari'],
        ]
    ],
    'Sumatera Utara' => [
        'base' => ['jnt' => 30000, 'jne' => 32000, 'sicepat' => 30000, 'etd' => '2-3 Hari'],
        'cities' => [
            'Kota Medan'            => ['jnt' => 28000, 'jne' => 30000, 'sicepat' => 28000, 'etd' => '2-3 Hari'],
            'Kab. Deli Serdang'     => ['jnt' => 30000, 'jne' => 32000, 'sicepat' => 30000, 'etd' => '2-3 Hari'],
            'Kota Pematangsiantar'  => ['jnt' => 32000, 'jne' => 34000, 'sicepat' => 32000, 'etd' => '2-4 Hari'],
            'Kota Binjai'           => ['jnt' => 30000, 'jne' => 32000, 'sicepat' => 30000, 'etd' => '2-3 Hari'],
        ]
    ],
    'Sumatera Barat' => [
        'base' => ['jnt' => 27000, 'jne' => 29000, 'sicepat' => 28000, 'etd' => '2-3 Hari'],
        'cities' => [
            'Kota Padang'       => ['jnt' => 26000, 'jne' => 28000, 'sicepat' => 27000, 'etd' => '2-3 Hari'],
            'Kota Bukittinggi'  => ['jnt' => 28000, 'jne' => 30000, 'sicepat' => 29000, 'etd' => '2-3 Hari'],
        ]
    ],
    'Riau' => [
        'base' => ['jnt' => 28000, 'jne' => 30000, 'sicepat' => 28000, 'etd' => '2-3 Hari'],
        'cities' => [
            'Kota Pekanbaru' => ['jnt' => 26000, 'jne' => 28000, 'sicepat' => 27000, 'etd' => '2-3 Hari'],
            'Kota Dumai'     => ['jnt' => 30000, 'jne' => 32000, 'sicepat' => 30000, 'etd' => '2-4 Hari'],
        ]
    ],
    'Kepulauan Riau' => [
        'base' => ['jnt' => 30000, 'jne' => 32000, 'sicepat' => 30000, 'etd' => '2-3 Hari'],
        'cities' => [
            'Kota Batam'            => ['jnt' => 28000, 'jne' => 30000, 'sicepat' => 29000, 'etd' => '2-3 Hari'],
            'Kota Tanjungpinang'    => ['jnt' => 32000, 'jne' => 34000, 'sicepat' => 32000, 'etd' => '2-4 Hari'],
        ]
    ],
    'Kalimantan Timur' => [
        'base' => ['jnt' => 36000, 'jne' => 38000, 'sicepat' => 36000, 'etd' => '2-4 Hari'],
        'cities' => [
            'Kota Balikpapan' => ['jnt' => 34000, 'jne' => 36000, 'sicepat' => 35000, 'etd' => '2-4 Hari'],
            'Kota Samarinda'  => ['jnt' => 35000, 'jne' => 38000, 'sicepat' => 36000, 'etd' => '2-4 Hari'],
        ]
    ],
    'Kalimantan Barat' => [
        'base' => ['jnt' => 30000, 'jne' => 32000, 'sicepat' => 31000, 'etd' => '2-4 Hari'],
        'cities' => [
            'Kota Pontianak' => ['jnt' => 29000, 'jne' => 31000, 'sicepat' => 30000, 'etd' => '2-4 Hari'],
        ]
    ],
    'Kalimantan Selatan' => [
        'base' => ['jnt' => 32000, 'jne' => 34000, 'sicepat' => 32000, 'etd' => '2-4 Hari'],
        'cities' => [
            'Kota Banjarmasin' => ['jnt' => 30000, 'jne' => 32000, 'sicepat' => 31000, 'etd' => '2-4 Hari'],
            'Kota Banjarbaru'  => ['jnt' => 31000, 'jne' => 33000, 'sicepat' => 32000, 'etd' => '2-4 Hari'],
        ]
    ],
    'Sulawesi Selatan' => [
        'base' => ['jnt' => 34000, 'jne' => 36000, 'sicepat' => 34000, 'etd' => '2-4 Hari'],
        'cities' => [
            'Kota Makassar' => ['jnt' => 32000, 'jne' => 34000, 'sicepat' => 33000, 'etd' => '2-4 Hari'],
            'Kab. Gowa'     => ['jnt' => 35000, 'jne' => 37000, 'sicepat' => 36000, 'etd' => '2-4 Hari'],
        ]
    ],
    'Nusa Tenggara Barat' => [
        'base' => ['jnt' => 26000, 'jne' => 28000, 'sicepat' => 26000, 'etd' => '2-4 Hari'],
        'cities' => [
            'Kota Mataram'  => ['jnt' => 24000, 'jne' => 26000, 'sicepat' => 25000, 'etd' => '2-4 Hari'],
            'Kota Bima'     => ['jnt' => 28000, 'jne' => 30000, 'sicepat' => 29000, 'etd' => '3-5 Hari'],
            'Kab. Lombok Barat' => ['jnt' => 26000, 'jne' => 28000, 'sicepat' => 26000, 'etd' => '2-4 Hari'],
            'Kab. Lombok Tengah'=> ['jnt' => 26000, 'jne' => 28000, 'sicepat' => 26000, 'etd' => '2-4 Hari'],
            'Kab. Lombok Timur' => ['jnt' => 26000, 'jne' => 28000, 'sicepat' => 26000, 'etd' => '2-4 Hari'],
        ]
    ],
    'Nusa Tenggara Timur' => [
        'base' => ['jnt' => 45000, 'jne' => 48000, 'sicepat' => 46000, 'etd' => '3-5 Hari'],
        'cities' => [
            'Kota Kupang'      => ['jnt' => 42000, 'jne' => 45000, 'sicepat' => 43000, 'etd' => '3-5 Hari'],
            'Kab. Manggarai Barat (Labuan Bajo)' => ['jnt' => 46000, 'jne' => 50000, 'sicepat' => 48000, 'etd' => '3-5 Hari'],
            'Kab. Sumba Timur' => ['jnt' => 48000, 'jne' => 52000, 'sicepat' => 50000, 'etd' => '4-6 Hari'],
        ]
    ],
    'Aceh' => [
        'base' => ['jnt' => 36000, 'jne' => 38000, 'sicepat' => 37000, 'etd' => '3-4 Hari'],
        'cities' => [
            'Kota Banda Aceh'   => ['jnt' => 34000, 'jne' => 36000, 'sicepat' => 35000, 'etd' => '2-3 Hari'],
            'Kota Lhokseumawe'  => ['jnt' => 38000, 'jne' => 40000, 'sicepat' => 39000, 'etd' => '3-4 Hari'],
        ]
    ],
    'Jambi' => [
        'base' => ['jnt' => 23000, 'jne' => 25000, 'sicepat' => 24000, 'etd' => '2-3 Hari'],
        'cities' => [
            'Kota Jambi'        => ['jnt' => 22000, 'jne' => 24000, 'sicepat' => 23000, 'etd' => '2-3 Hari'],
        ]
    ],
    'Bengkulu' => [
        'base' => ['jnt' => 25000, 'jne' => 27000, 'sicepat' => 26000, 'etd' => '2-3 Hari'],
        'cities' => [
            'Kota Bengkulu'     => ['jnt' => 24000, 'jne' => 26000, 'sicepat' => 25000, 'etd' => '2-3 Hari'],
        ]
    ],
    'Kepulauan Bangka Belitung' => [
        'base' => ['jnt' => 24000, 'jne' => 26000, 'sicepat' => 25000, 'etd' => '2-3 Hari'],
        'cities' => [
            'Kota Pangkal Pinang' => ['jnt' => 22000, 'jne' => 24000, 'sicepat' => 23000, 'etd' => '2-3 Hari'],
            'Kab. Belitung (Tanjung Pandan)' => ['jnt' => 25000, 'jne' => 27000, 'sicepat' => 26000, 'etd' => '2-3 Hari'],
        ]
    ],
    'Kalimantan Tengah' => [
        'base' => ['jnt' => 33000, 'jne' => 35000, 'sicepat' => 34000, 'etd' => '2-4 Hari'],
        'cities' => [
            'Kota Palangka Raya' => ['jnt' => 32000, 'jne' => 34000, 'sicepat' => 33000, 'etd' => '2-4 Hari'],
            'Kab. Kotawaringin Barat' => ['jnt' => 34000, 'jne' => 36000, 'sicepat' => 35000, 'etd' => '3-5 Hari'],
        ]
    ],
    'Kalimantan Utara' => [
        'base' => ['jnt' => 44000, 'jne' => 47000, 'sicepat' => 45000, 'etd' => '3-5 Hari'],
        'cities' => [
            'Kota Tarakan'      => ['jnt' => 42000, 'jne' => 45000, 'sicepat' => 43000, 'etd' => '3-5 Hari'],
        ]
    ],
    'Sulawesi Utara' => [
        'base' => ['jnt' => 42000, 'jne' => 45000, 'sicepat' => 43000, 'etd' => '3-5 Hari'],
        'cities' => [
            'Kota Manado'       => ['jnt' => 40000, 'jne' => 43000, 'sicepat' => 41000, 'etd' => '2-4 Hari'],
            'Kota Bitung'       => ['jnt' => 42000, 'jne' => 45000, 'sicepat' => 43000, 'etd' => '3-5 Hari'],
        ]
    ],
    'Sulawesi Tengah' => [
        'base' => ['jnt' => 38000, 'jne' => 41000, 'sicepat' => 39000, 'etd' => '3-5 Hari'],
        'cities' => [
            'Kota Palu'         => ['jnt' => 37000, 'jne' => 40000, 'sicepat' => 38000, 'etd' => '2-4 Hari'],
        ]
    ],
    'Sulawesi Tenggara' => [
        'base' => ['jnt' => 38000, 'jne' => 41000, 'sicepat' => 39000, 'etd' => '3-5 Hari'],
        'cities' => [
            'Kota Kendari'      => ['jnt' => 37000, 'jne' => 40000, 'sicepat' => 38000, 'etd' => '2-4 Hari'],
        ]
    ],
    'Gorontalo' => [
        'base' => ['jnt' => 42000, 'jne' => 45000, 'sicepat' => 43000, 'etd' => '3-5 Hari'],
        'cities' => [
            'Kota Gorontalo'    => ['jnt' => 41000, 'jne' => 44000, 'sicepat' => 42000, 'etd' => '3-5 Hari'],
        ]
    ],
    'Sulawesi Barat' => [
        'base' => ['jnt' => 38000, 'jne' => 41000, 'sicepat' => 39000, 'etd' => '3-5 Hari'],
        'cities' => [
            'Kab. Mamuju'       => ['jnt' => 38000, 'jne' => 41000, 'sicepat' => 39000, 'etd' => '3-5 Hari'],
        ]
    ],
    'Maluku' => [
        'base' => ['jnt' => 55000, 'jne' => 60000, 'sicepat' => 57000, 'etd' => '3-6 Hari'],
        'cities' => [
            'Kota Ambon'        => ['jnt' => 52000, 'jne' => 58000, 'sicepat' => 55000, 'etd' => '3-5 Hari'],
        ]
    ],
    'Maluku Utara' => [
        'base' => ['jnt' => 58000, 'jne' => 63000, 'sicepat' => 60000, 'etd' => '3-6 Hari'],
        'cities' => [
            'Kota Ternate'      => ['jnt' => 56000, 'jne' => 61000, 'sicepat' => 58000, 'etd' => '3-5 Hari'],
        ]
    ],
    'Papua' => [
        'base' => ['jnt' => 78000, 'jne' => 85000, 'sicepat' => 80000, 'etd' => '3-6 Hari'],
        'cities' => [
            'Kota Jayapura' => ['jnt' => 75000, 'jne' => 82000, 'sicepat' => 78000, 'etd' => '3-6 Hari'],
            'Kota Sorong'   => ['jnt' => 68000, 'jne' => 74000, 'sicepat' => 70000, 'etd' => '3-6 Hari'],
            'Kab. Mimika'   => ['jnt' => 80000, 'jne' => 88000, 'sicepat' => 82000, 'etd' => '4-7 Hari'],
        ]
    ]
];

function getShippingDestinations($shippingData) {
    $destinations = [];
    foreach ($shippingData as $province => $data) {
        $cities = array_keys($data['cities'] ?? []);
        $destinations[] = [
            'province' => $province,
            'cities'   => $cities,
            'count'    => count($cities)
        ];
    }
    return $destinations;
}
