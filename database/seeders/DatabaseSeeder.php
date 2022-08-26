<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'jenis' => 'Konsumsi'
        ]);
        Category::create([
            'jenis' => 'Pembersih'
        ]);
        
        Product::create([
            'nama_barang' => 'Kopi',
            'stok' => '100',
            'categories_id' => 1
        ]);
        Product::create([
            'nama_barang' => 'Teh',
            'stok' => '100',
            'categories_id' => 1
        ]);
        Product::create([
            'nama_barang' => 'Kopi',
            'stok' => '90',
            'categories_id' => 1
        ]);
        Product::create([
            'nama_barang' => 'Pasta Gigi',
            'stok' => '100',
            'categories_id' => 2
        ]);
        Product::create([
            'nama_barang' => 'Sabun Mandi',
            'stok' => '100',
            'categories_id' => 2
        ]);
        Product::create([
            'nama_barang' => 'Sampo',
            'stok' => '100',
            'categories_id' => 2
        ]);
        Product::create([
            'nama_barang' => 'Teh',
            'stok' => '81',
            'categories_id' => 1
        ]);
        Transaction::create([
            'products_id' => 1,
            'jumlah' => '10',
            'tanggal_transaksi' => '2021/05/01',
        ]);
        Transaction::create([
            'products_id' => 2,
            'jumlah' => '19',
            'tanggal_transaksi' => '2021/05/05',
        ]);
        Transaction::create([
            'products_id' => 3,
            'jumlah' => '15',
            'tanggal_transaksi' => '2021/05/10',
        ]);
        Transaction::create([
            'products_id' => 4,
            'jumlah' => '15',
            'tanggal_transaksi' => '2021/05/10',
        ]);
        Transaction::create([
            'products_id' => 5,
            'jumlah' => '20',
            'tanggal_transaksi' => '2021/05/11',
        ]);
        Transaction::create([
            'products_id' => 6,
            'jumlah' => '25',
            'tanggal_transaksi' => '2021/05/12',
        ]);
        Transaction::create([
            'products_id' => 7,
            'jumlah' => '5',
            'tanggal_transaksi' => '2021/05/12',
        ]);
    }
}