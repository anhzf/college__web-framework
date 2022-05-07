<?php

namespace App\Libraries;

class TableView
{
  const TEMPLATE = [
    'table_open' => '<table class="w-full max-w-screen-xl bg-white shadow sm:rounded-lg overflow-hidden mx-auto">',

    'thead_open' => '<thead class="shadow sm:rounded-t-lg">',
    'thead_close' => '</thead>',

    'heading_row_start'  => '<tr class="border-b border-gray-200 bg-gray-50 sm:rounded-t-lg">',
    'heading_row_end'    => '</tr>',
    'heading_cell_start' => '<th class="px-5 py-3 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider sm:first:rounded-tl-lg sm:last:rounded-tr-lg">',
    'heading_cell_end'   => '</th>',

    'tfoot_open'         => '<tfoot>',
    'tfoot_close'        => '</tfoot>',

    'footing_row_start'  => '<tr>',
    'footing_row_end'    => '</tr>',
    'footing_cell_start' => '<td>',
    'footing_cell_end'   => '</td>',

    'tbody_open'         => '<tbody>',
    'tbody_close'        => '</tbody>',

    'row_start'          => '<tr class="bg-white hover:bg-gray-50 ">',
    'row_end'            => '</tr>',
    'cell_start'         => '<td class="text-sm font-medium text-gray-500 px-4 py-5 sm:px-6">',
    'cell_end'           => '</td>',

    'row_alt_start'      => '<tr class="bg-white hover:bg-gray-50 ">',
    'row_alt_end'        => '</tr>',
    'cell_alt_start'     => '<td class="text-sm font-medium text-gray-500 px-4 py-5 sm:px-6">',
    'cell_alt_end'       => '</td>',

    'table_close'        => '</table>'
  ];
}
