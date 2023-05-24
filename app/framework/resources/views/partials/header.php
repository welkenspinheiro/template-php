<h2>Bem vindo
    <?php if ($this->session('logged')) : ?>
        <?= $this->session('user')->name; ?>
    <?php endif ?>
</h2>
<h3>Bem-vindo novamente!</h3>