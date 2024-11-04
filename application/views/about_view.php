<br>
<center>
    <div class="zigzag-container">
        <?php
        $items = [
            [
                "img" => base_url('assets/images/Ab1.gif'),
                "text" => "Konten 1: Penjelasan tentang gambar atau konten lainnya."
            ],
            [
                "img" => base_url('assets/images/Ab2.jpg'),
                "text" => "Konten 2: Penjelasan tentang gambar atau konten lainnya."
            ],
            [
                "img" => base_url('assets/images/Ab3.gif'),
                "text" => "Konten 3: Penjelasan tentang gambar atau konten lainnya."
            ],
            [
                "img" => base_url('assets/images/Ab4.jpg'),
                "text" => "Konten 4: Penjelasan tentang gambar atau konten lainnya."
            ],
        ];


        foreach ($items as $index => $item) {
            // Menentukan kelas tata letak zigzag berdasarkan indeks
            echo "<div class='zigzag-item item-" . ($index + 1) . "'>";
            echo "<img src='{$item['img']}' alt='Gambar " . ($index + 1) . "'>";
            echo "<p>{$item['text']}</p>";
            echo "</div>";
        }
        ?>
    </div>
</center>
<br>