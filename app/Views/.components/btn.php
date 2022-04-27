<?php
$_baseClass = 'inline-block focus-visible:ring text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3';
$_variantClasses = [
  'primary' => 'bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 ring-indigo-300 text-white',
  'secondary' => 'bg-gray-200 hover:bg-gray-300 ring-indigo-300 text-gray-600 active:text-gray-700',
  'flat' => 'hover:bg-gray-100 focus-visible:ring ring-indigo-300 text-gray-500 active:text-gray-700'
];
$_decorationClasses = [
  'round' => 'rounded-full',
];
$_tag = $tag ?? 'button';
$_variant = $variant ?? 'primary';
$_class = join(' ', array_filter([
  $_baseClass,
  $_variantClasses[$_variant],
  isset($round) && $round ? 'rounded-full' : '',
  $class ?? '',
]));
?>
<<?= $_tag ?> class="<?= $_class ?>" <?= $attrs ?? '' ?>>
  <?= $children ?>
</<?= $_tag ?>>