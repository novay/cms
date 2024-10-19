<?php

return [

    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut ini berisi standar pesan kesalahan yang digunakan oleh
    | kelas validasi. Beberapa aturan mempunyai banyak versi seperti aturan 'size'.
    | Jangan ragu untuk mengoptimalkan setiap pesan yang ada di sini.
    |
    */

    'accepted'        => 'Kolom :attribute harus diterima.',
    'accepted_if'     => 'Kolom :attribute harus diterima jika :other adalah :value.',
    'active_url'      => 'Kolom :attribute bukan URL yang valid.',
    'after'           => 'Kolom :attribute harus berisi tanggal setelah :date.',
    'after_or_equal'  => 'Kolom :attribute harus berisi tanggal setelah atau sama dengan :date.',
    'alpha'           => 'Kolom :attribute hanya boleh berisi huruf.',
    'alpha_dash'      => 'Kolom :attribute hanya boleh berisi huruf, angka, strip, dan garis bawah.',
    'alpha_num'       => 'Kolom :attribute hanya boleh berisi huruf dan angka.',
    'array'           => 'Kolom :attribute harus berisi sebuah array.',
    'ascii'           => 'Kolom :attribute hanya boleh berisi karakter dan simbol alfanumerik byte tunggal.',
    'before'          => 'Kolom :attribute harus berisi tanggal sebelum :date.',
    'before_or_equal' => 'Kolom :attribute harus berisi tanggal sebelum atau sama dengan :date.',
    'between' => [
        'array'   => 'Kolom :attribute harus memiliki :min sampai :max anggota.',
        'file'    => 'Kolom :attribute harus berukuran antara :min sampai :max kilobita.',
        'numeric' => 'Kolom :attribute harus bernilai antara :min sampai :max.',
        'string'  => 'Kolom :attribute harus berisi antara :min sampai :max karakter.',
    ],
    'boolean'          => 'Kolom :attribute harus bernilai true atau false',
    'can'              => 'Kolom :attribute berisi nilai yang tidak sah.',
    'confirmed'        => 'Konfirmasi :attribute tidak cocok.',
    'current_password' => 'Kata sandinya salah.',
    'date'             => 'Kolom :attribute bukan tanggal yang valid.',
    'date_equals'      => 'Kolom :attribute harus berisi tanggal yang sama dengan :date.',
    'date_format'      => 'Kolom :attribute tidak cocok dengan format :format.',
    'decimal'          => 'Kolom :attribute harus memiliki :tempat desimal.',
    'declined'         => 'Kolom :attribute harus ditolak.',
    'declined_if'      => 'Kolom :attribute harus ditolak jika :other adalah :value.',
    'different'        => 'Kolom :attribute dan :other harus berbeda.',
    'digits'           => 'Kolom :attribute harus terdiri dari :digits angka.',
    'digits_between'   => 'Kolom :attribute harus terdiri dari :min sampai :max angka.',
    'dimensions'       => 'Kolom :attribute tidak memiliki dimensi gambar yang valid.',
    'distinct'         => 'Kolom :attribute memiliki nilai yang duplikat.',
    'doesnt_end_with'  => 'Kolom :attribute tidak boleh diakhiri dengan salah satu dari berikut ini: :values.',
    'doesnt_start_with' => 'Kolom :attribute tidak boleh diawali dengan salah satu dari berikut ini: :values.',
    'email'            => 'Kolom :attribute harus berupa alamat surel yang valid.',
    'ends_with'        => 'Kolom :attribute harus diakhiri salah satu dari berikut: :values',
    'enum' => 'Kolom :attribute yang dipilih tidak valid.',
    'exists'         => 'Kolom :attribute yang dipilih tidak valid.',
    'extensions' => 'Kolom :attribute harus memiliki salah satu ekstensi berikut: :values.',
    'file'           => 'Kolom :attribute harus berupa sebuah berkas.',
    'filled'         => 'Kolom :attribute harus memiliki nilai.',
    'gt' => [
        'array'   => 'Kolom :attribute harus memiliki lebih dari :value anggota.',
        'file'    => 'Kolom :attribute harus berukuran lebih besar dari :value kilobita.',
        'numeric' => 'Kolom :attribute harus bernilai lebih besar dari :value.',
        'string'  => 'Kolom :attribute harus berisi lebih besar dari :value karakter.',
    ],
    'gte' => [
        'array'   => 'Kolom :attribute harus terdiri dari :value anggota atau lebih.',
        'file'    => 'Kolom :attribute harus berukuran lebih besar dari atau sama dengan :value kilobita.',
        'numeric' => 'Kolom :attribute harus bernilai lebih besar dari atau sama dengan :value.',
        'string'  => 'Kolom :attribute harus berisi lebih besar dari atau sama dengan :value karakter.',
    ],
    'hex_color' => 'Kolom :attribute harus berupa warna heksadesimal yang valid.',
    'image'    => 'Kolom :attribute harus berupa gambar.',
    'in'       => 'Kolom :attribute yang dipilih tidak valid.',
    'in_array' => 'Kolom :attribute tidak ada di dalam :other.',
    'integer'  => 'Kolom :attribute harus berupa bilangan bulat.',
    'ip'       => 'Kolom :attribute harus berupa alamat IP yang valid.',
    'ipv4'     => 'Kolom :attribute harus berupa alamat IPv4 yang valid.',
    'ipv6'     => 'Kolom :attribute harus berupa alamat IPv6 yang valid.',
    'json'     => 'Kolom :attribute harus berupa JSON string yang valid.',
    'list' => 'Kolom :attribute harus berupa daftar.',
    'lowercase' => 'Kolom :attribute harus menggunakan huruf kecil.',
    'lt' => [
        'array'   => 'Kolom :attribute harus memiliki kurang dari :value anggota.',
        'file'    => 'Kolom :attribute harus berukuran kurang dari :value kilobita.',
        'numeric' => 'Kolom :attribute harus bernilai kurang dari :value.',
        'string'  => 'Kolom :attribute harus berisi kurang dari :value karakter.',
    ],
    'lte' => [
        'array'   => 'Kolom :attribute harus tidak lebih dari :value anggota.',
        'file'    => 'Kolom :attribute harus berukuran kurang dari atau sama dengan :value kilobita.',
        'numeric' => 'Kolom :attribute harus bernilai kurang dari atau sama dengan :value.',
        'string'  => 'Kolom :attribute harus berisi kurang dari atau sama dengan :value karakter.',
    ],
    'mac_address' => 'Kolom :attribute harus berupa alamat MAC yang valid.',
    'max' => [
        'array'             => 'Kolom :attribute maksimal terdiri dari :max anggota.',
        'file'              => 'Kolom :attribute maksimal berukuran :max kilobita.',
        'numeric'           => 'Kolom :attribute maskimal bernilai :max.',
        'string'            => 'Kolom :attribute maskimal berisi :max karakter.',
    ],
    'max_digits'            => 'Kolom :attribute tidak boleh lebih dari :max digit.',
    'mimes'                 => 'Kolom :attribute harus berupa berkas berjenis: :values.',
    'mimetypes'             => 'Kolom :attribute harus berupa berkas berjenis: :values.',
    'min' => [
        'array'             => 'Kolom :attribute minimal terdiri dari :min anggota.',
        'file'              => 'Kolom :attribute minimal berukuran :min kilobita.',
        'numeric'           => 'Kolom :attribute minimal bernilai :min.',
        'string'            => 'Kolom :attribute minimal berisi :min karakter.',
    ],
    'min_digits'            => 'Kolom :attribute harus memiliki setidaknya :min digit.',
    'missing'               => 'Kolom :attribute harus tidak ada.',
    'missing_if'            => 'Kolom :attribute harus tidak ada jika :other adalah :value.',
    'missing_unless'        => 'Kolom :attribute harus tidak ada kecuali :other adalah :value.',
    'missing_with'          => 'Kolom :attribute harus tidak ada jika :values ada.',
    'missing_with_all'      => 'Kolom :attribute harus tidak ada jika :values ada.',
    'multiple_of'           => 'Kolom :attribute harus merupakan kelipatan dari :value.',
    'not_in'                => 'Kolom :attribute yang dipilih tidak valid.',
    'not_regex'             => 'Format :attribute tidak valid.',
    'numeric'               => 'Kolom :attribute harus berupa angka.',
    'password' => [
        'letters'           => 'Kolom :attribute harus berisi setidaknya satu huruf.',
        'mixed'             => 'Kolom :attribute harus berisi setidaknya satu huruf besar dan satu huruf kecil.',
        'numbers'           => 'Kolom :attribute harus berisi setidaknya satu nomor.',
        'symbols'           => 'Kolom :attribute harus berisi setidaknya satu simbol.',
        'uncompromised'     => 'Kolom :attribute yang diberikan telah muncul dalam kebocoran data. Silakan pilih :attribute yang lain.',
    ],
    'present'               => 'Kolom :attribute wajib ada.',
    'present_if'            => 'Kolom :attribute harus ada jika :other adalah :value.',
    'present_unless'        => 'Kolom :attribute harus ada kecuali :other adalah :value.',
    'present_with'          => 'Kolom :attribute harus ada ketika :values ada.',
    'present_with_all'      => 'Kolom :attribute harus ada ketika :values ada.',
    'prohibited'            => 'Kolom :attribute dilarang.',
    'prohibited_if'         => 'Kolom :attribute dilarang jika :other adalah :value.',
    'prohibited_unless'     => 'Kolom :attribute dilarang kecuali :other ada di :values.',
    'prohibits'             => 'Kolom :attribute melarang :other untuk hadir.',
    'regex'                 => 'Format :attribute tidak valid.',
    'required'              => 'Kolom :attribute wajib diisi.',
    'required_array_keys'   => 'Kolom :attribute harus berisi entri untuk: :values.',
    'required_if'           => 'Kolom :attribute wajib diisi bila :other adalah :value.',
    'required_if_accepted'  => 'Kolom :attribute diperlukan ketika :other diterima.',
    'required_unless'       => 'Kolom :attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'         => 'Kolom :attribute wajib diisi bila terdapat :values.',
    'required_with_all'     => 'Kolom :attribute wajib diisi bila terdapat :values.',
    'required_without'      => 'Kolom :attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all'  => 'Kolom :attribute wajib diisi bila sama sekali tidak terdapat :values.',
    'same'                  => 'Kolom :attribute dan :other harus sama.',
    'size' => [
        'array'             => 'Kolom :attribute harus mengandung :size anggota.',
        'file'              => 'Kolom :attribute harus berukuran :size kilobyte.',
        'numeric'           => 'Kolom :attribute harus berukuran :size.',
        'string'            => 'Kolom :attribute harus berukuran :size karakter.',
    ],
    'starts_with'           => 'Kolom :attribute harus diawali salah satu dari berikut: :values',
    'string'                => 'Kolom :attribute harus berupa string.',
    'timezone'              => 'Kolom :attribute harus berisi zona waktu yang valid.',
    'unique'                => 'Kolom :attribute sudah ada sebelumnya.',
    'uploaded'              => 'Kolom :attribute gagal diunggah.',
    'uppercase'             => 'Kolom :attribute harus dalam huruf besar.',
    'url'                   => 'Format :attribute tidak valid.',
    'ulid'                  => 'Kolom :attribute harus merupakan ULID yang valid.',
    'uuid'                  => 'Kolom :attribute harus merupakan UUID yang valid.',

    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi Kustom
    |---------------------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi untuk atribut sesuai keinginan dengan menggunakan 
    | konvensi "attribute.rule" dalam penamaan barisnya. Hal ini mempercepat dalam menentukan
    | baris bahasa kustom yang spesifik untuk aturan atribut yang diberikan.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |---------------------------------------------------------------------------------------
    | Kustom Validasi Atribut
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut digunakan untuk menukar 'placeholder' atribut dengan sesuatu yang
    | lebih mudah dimengerti oleh pembaca seperti "Alamat Surel" daripada "surel" saja.
    | Hal ini membantu kita dalam membuat pesan menjadi lebih ekspresif.
    |
    */

    'attributes' => [],

];