<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>

        <h1>Inicio</h1>

        <?php if (auth()->loggedIn()): ?>

                <p>Hello <?= esc(auth()->user()->first_name) ?></p>

                <a href="<?= url_to("logout") ?>">Salir</a>

        <?php else: ?>
                <a href="<?= url_to("login") ?>">Ingresar</a>

        <?php endif; ?>

<?= $this->endSection() ?>
