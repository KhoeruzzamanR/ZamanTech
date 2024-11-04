<div class="container">
    <h1>Kontak Kami</h1>

    <?php if ($this->session->flashdata('message')): ?>
        <p class="success"><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>

    <form action="<?php echo base_url('Api/send_comment'); ?>" method="post">
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="comment">Komentar:</label>
            <textarea name="comment" id="comment" required></textarea>
        </div>
        <button type="submit" value="Submit">Kirim Komentar</button>

        <p style="color: aquamarine;">Atau kirim melalui WhatsApp: <a href="https://wa.me/6285832634795">Klik di sini</a></p>
    </form>

    <h2>Komentar Terkirim</h2>
    <div class="comments">
        <?php if (empty($comments)): ?>
            <p>Tidak ada komentar yang ditemukan.</p>
        <?php else: ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <p>From : <strong><?php echo htmlspecialchars($comment->name); ?></strong></p>
                    <p><?php echo htmlspecialchars($comment->comment); ?></p>
                    <p><em><?php echo date('d M Y, H:i', strtotime($comment->created_at)); ?></em></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<br>