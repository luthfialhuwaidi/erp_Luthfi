Untuk tugas ERP yang **sederhana tetapi tetap terasa seperti ERP**, saya menyarankan satu fitur:

# Fitur: Manajemen Inventaris / Stok Barang

Ini lebih cocok daripada sekadar `Data Pegawai` atau `Data Supplier`, karena sudah memiliki **master data + transaksi + aturan CRUD**. Jadi bukan aplikasi CRUD berkedok ERP, penyakit yang cukup umum di dunia tugas kuliah.

## 1. Rancangan database

Cukup **1 database** dengan 2 tabel utama:

```text
erp_inventory
├── barang
└── mutasi_stok
```

### Tabel `barang`

Menyimpan master barang.

| Field        | Tipe         | Keterangan              |
| ------------ | ------------ | ----------------------- |
| id           | bigint       | Primary key             |
| kode_barang  | varchar(30)  | Kode unik barang        |
| nama_barang  | varchar(150) | Nama barang             |
| kategori     | varchar(100) | Contoh: ATK, Elektronik |
| satuan       | varchar(20)  | pcs, box, unit          |
| stok         | integer      | Stok saat ini           |
| stok_minimum | integer      | Batas minimum           |
| harga        | decimal      | Harga barang            |
| status       | boolean      | Aktif / nonaktif        |
| created_at   | timestamp    |                         |
| updated_at   | timestamp    |                         |

### Tabel `mutasi_stok`

Mencatat setiap perubahan stok.

| Field      | Tipe        | Keterangan         |
| ---------- | ----------- | ------------------ |
| id         | bigint      | Primary key        |
| barang_id  | bigint      | FK ke `barang`     |
| tipe       | enum/string | `masuk` / `keluar` |
| jumlah     | integer     | Jumlah perubahan   |
| keterangan | text        | Alasan/transaksi   |
| tanggal    | date        | Tanggal transaksi  |
| created_at | timestamp   |                    |

Relasinya:

```text
barang
  │
  └──< mutasi_stok
```

Satu barang bisa memiliki banyak mutasi stok.

---

# 2. Aturan CRUD

Ini bagian yang justru harus dibuat tegas sejak awal.

## A. Barang

### Tambah: BOLEH

User dapat menambahkan barang baru.

Contoh:

```text
Kode       : BRG-001
Nama       : Kertas A4
Kategori   : ATK
Satuan     : Rim
Stok       : 20
Stok Min   : 5
Harga      : 55000
Status     : Aktif
```

### Edit: BOLEH

Data master barang boleh diedit.

Yang boleh diedit:

```text
nama_barang
kategori
satuan
stok_minimum
harga
status
```

`kode_barang` sebaiknya **tidak boleh diedit**, karena kode merupakan identitas barang.

### Hapus: TIDAK BOLEH kalau sudah memiliki transaksi

Misalnya:

```text
Kertas A4
- barang_id = 1
- sudah memiliki 15 mutasi stok
```

Jangan dihapus.

Gunakan:

```text
status = nonaktif
```

Jadi barang tetap tersimpan untuk kebutuhan histori.

Kalau barang **belum pernah memiliki mutasi stok**, barulah boleh dihapus.

---

# B. Mutasi Stok

Di sini aturan harus lebih ketat.

### Tambah: BOLEH

Contoh barang masuk:

```text
Barang      : Kertas A4
Tipe        : Masuk
Jumlah      : 10
Tanggal     : 18-09-2026
Keterangan  : Pembelian dari supplier
```

Stok otomatis:

```text
20 + 10 = 30
```

Barang keluar:

```text
30 - 5 = 25
```

---

### Edit: TIDAK BOLEH

Ini penting.

Setelah transaksi stok dibuat:

```text
Mutasi #001
Kertas A4
Masuk 10
```

jangan izinkan pengguna mengubah:

```text
jumlah
tipe
barang
tanggal
```

Karena kalau transaksi lama bebas diedit, histori stok bisa menjadi sampah dan angka stok dapat berubah tanpa jejak.

---

### Hapus: TIDAK BOLEH

Jangan berikan tombol:

```text
Delete
```

pada transaksi stok.

Kesalahan transaksi sebaiknya dikoreksi dengan **transaksi baru**, bukan menghapus histori.

Contoh:

```text
Transaksi awal:
Masuk 10

Ternyata salah input.

Buat koreksi:
Keluar 10
```

Dengan begitu histori tetap ada.

---

# 3. Alur sistem

Sederhana sekali:

```text
MASTER BARANG
      │
      ├── Tambah barang
      ├── Edit barang
      ├── Nonaktifkan barang
      └── Hapus jika belum pernah digunakan
              │
              ▼
        MUTASI STOK
              │
       ┌──────┴──────┐
       ▼             ▼
     MASUK         KELUAR
       │             │
       ▼             ▼
   stok + jumlah  stok - jumlah
```

## 4. Tampilan CRUD

### Menu Barang

```text
Barang
------------------------------------------------
[ + Tambah Barang ]

Kode       Nama       Kategori   Stok   Status   Aksi
BRG-001    Kertas A4  ATK        25     Aktif    Edit | Detail
BRG-002    Mouse      Elektronik 10     Aktif    Edit | Detail
BRG-003    Printer    Elektronik 0      Nonaktif Detail
```

Untuk barang yang sudah punya histori:

```text
Edit | Detail
```

Untuk barang yang belum punya histori:

```text
Edit | Hapus | Detail
```

Jadi tombol CRUD **tidak statis**. Sistem menentukan apakah operasi tersebut diperbolehkan.

---

### Detail Barang

```text
Kertas A4
--------------------------------
Kode Barang   : BRG-001
Kategori      : ATK
Satuan        : Rim
Stok          : 25
Stok Minimum  : 5
Harga         : Rp55.000
Status        : Aktif

[ Tambah Stok ]
[ Kurangi Stok ]

Riwayat Mutasi
--------------------------------
18-09-2026 | Masuk  | +10
17-09-2026 | Keluar | -5
15-09-2026 | Masuk  | +20
```

Tidak perlu membuat 10 tabel untuk memperlihatkan bahwa kita tahu database. Manusia sudah cukup menderita dengan migration.

# 5. Aturan bisnis yang saya rekomendasikan

| Data                      | Tambah | Edit | Hapus |
| ------------------------- | -----: | ---: | ----: |
| Barang baru               |      ✅ |    ✅ |    ✅* |
| Barang yang sudah dipakai |      ✅ |    ✅ |     ❌ |
| Mutasi stok               |      ✅ |    ❌ |     ❌ |
| Kode barang               |      ✅ |    ❌ |     ❌ |
| Status barang             |      - |    ✅ |     - |

`*` Hanya jika barang belum memiliki mutasi/transaksi.

## Kenapa fitur ini cocok untuk ERP?

Karena sudah punya tiga konsep inti:

**Master Data → Transaksi → Histori**

```text
Barang
  ↓
Transaksi Stok
  ↓
Perubahan Stok
  ↓
Riwayat
```

Dan yang paling penting, kamu bisa menunjukkan bahwa **CRUD bukan berarti semua data bebas di-Create, Read, Update, Delete**. Dalam sistem nyata, setiap operasi punya aturan bisnis.

### Struktur paling sederhana

```text
database: erp_inventory

barang
  id
  kode_barang
  nama_barang
  kategori
  satuan
  stok
  stok_minimum
  harga
  status

mutasi_stok
  id
  barang_id
  tipe
  jumlah
  tanggal
  keterangan
```

Untuk proyek Laravel + Filament, struktur ini juga enak karena bisa dibuat menjadi **2 Resource**: `BarangResource` dan `MutasiStokResource`, dengan aturan edit/delete yang jelas.
