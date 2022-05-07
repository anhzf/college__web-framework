<?= $this->extend('layouts/main') ?>

<?= $this->section('default') ?>
<main>
  <section>
    <div class="w-full max-w-screen-xl flex justify-between mx-auto py-5">
      <h2 class="text-2xl lg:text-3xl leading-6 font-medium text-gray-900">
        <?= isset($_GET['q']) && boolval($_GET['q']) ? 'Search results for "' . $_GET['q'] . '"' : 'Find Drivers' ?>
      </h2>

      <form>
        <div class="bg-gray-50 text-gray-800 border rounded flex items-center px-3 py-2">
          <input name="q" type="search" placeholder="Search drivers..." value="<?= $_GET['q'] ?? '' ?>" class="bg-gray-50 w-full outline-none transition duration-100" />
          <?= $this->setVar('attrs', 'class="w-5 h-5"')->include('icons/search') ?>
        </div>
      </form>
    </div>

    <?= $driverTable ?>
  </section>
</main>
<?= $this->endSection() ?>