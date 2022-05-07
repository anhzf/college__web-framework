<?= $this->extend('layouts/main') ?>

<?= $this->section('default') ?>
<main>
  <section class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
      <div class="flex justify-between items-end gap-4 mb-6">
        <h2 class="text-gray-800 text-2xl lg:text-3xl font-bold">
          <?= isset($_GET['q']) && boolval($_GET['q']) ? 'Search results for "' . $_GET['q'] . '"' : 'Our Products' ?>
        </h2>

        <form>
          <div class="bg-gray-50 text-gray-800 border rounded flex items-center px-3 py-2">
            <input name="q" type="search" placeholder="Search products..." value="<?= $_GET['q'] ?? '' ?>" class="bg-gray-50 w-full outline-none transition duration-100" />
            <?= $this->setVar('attrs', 'class="w-5 h-5"')->include('icons/search') ?>
          </div>
        </form>
      </div>

      <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 md:gap-x-6 gap-y-8">
        <?php foreach ($products as $item) : ?>
          <!-- product - start -->
          <div>
            <a href="/products/<?= $item['id'] ?>" class="group h-80 block bg-gray-100 rounded-lg overflow-hidden relative mb-2 lg:mb-3">
              <img src="<?= $item['image'] ?>" loading="lazy" alt="<?= $item['name'] ?>" class="w-full h-full object-scale-down object-center group-hover:scale-110 transition duration-200" />

              <span class="bg-red-500 text-white text-sm tracking-wider uppercase rounded-br-lg absolute left-0 top-0 px-3 py-1.5">sale</span>
            </a>

            <div>
              <a href="#" class="text-gray-500 hover:gray-800 lg:text-lg transition duration-100 mb-1"><?= $item['name'] ?></a>

              <div class="flex items-end gap-2">
                <span class="text-gray-800 lg:text-lg font-bold"><?= $item['price'] ?></span>
              </div>
            </div>
          </div>
          <!-- product - end -->
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>
<?= $this->endSection() ?>