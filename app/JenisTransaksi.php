<?php

namespace App;

enum JenisTransaksi: string
{
    case Debit = 'debit';   // Transaksi masuk
    case Kredit = 'kredit'; // Transaksi keluar
}
