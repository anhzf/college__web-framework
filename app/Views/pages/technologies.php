<?= $this->extend('layouts/main') ?>

<?= $this->section('default') ?>
<main>
  <section>
    <div class="w-full max-w-screen-xl mx-auto py-5">
      <h2 class="text-2xl lg:text-3xl leading-6 font-medium text-gray-900">Our Technologies</h2>
    </div>

    <table class="w-full max-w-screen-xl bg-white shadow sm:rounded-lg overflow-hidden mx-auto">
      <thead class="shadow sm:rounded-t-lg">
        <tr class="border-b border-gray-200 bg-gray-50 sm:rounded-t-lg">
          <th class="px-5 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider sm:first:rounded-tl-lg sm:last:rounded-tr-lg">
            ID
          </th>
          <th class="px-5 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider sm:first:rounded-tl-lg sm:last:rounded-tr-lg">
            Preview
          </th>
          <th class="px-5 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider sm:first:rounded-tl-lg sm:last:rounded-tr-lg">
            Name
          </th>
          <th class="px-5 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider sm:first:rounded-tl-lg sm:last:rounded-tr-lg">
            Description
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($technologies as $item) : ?>
          <tr class="bg-white hover:bg-gray-50 ">
            <td class="text-sm font-medium text-gray-500 px-4 py-5 sm:px-6">
              <?= $item['id'] ?>
            </td>
            <td class="w-[40%] text-sm leading-5 text-gray-500 px-4 py-5 sm:px-6">
              <img src="<?= $item['thumbnail'] ?>" alt="<?= $item['teknologi'] ?>" class="">
            </td>
            <td class="text-sm leading-5 text-gray-500 px-4 py-5 sm:px-6">
              <?= $item['teknologi'] ?>
            </td>
            <td class="text-sm leading-5 text-gray-500 px-4 py-5 sm:px-6">
              <?= $item['deskripsi'] ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>
</main>
<?= $this->endSection() ?>