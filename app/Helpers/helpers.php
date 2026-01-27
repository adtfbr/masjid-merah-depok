<?php

if (!function_exists('formatRupiah')) {
    /**
     * Format angka ke format Rupiah
     */
    function formatRupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

if (!function_exists('formatTanggal')) {
    /**
     * Format tanggal ke format Indonesia
     */
    function formatTanggal($tanggal, $format = 'd M Y')
    {
        if (!$tanggal) return '-';
        return \Carbon\Carbon::parse($tanggal)->locale('id')->translatedFormat($format);
    }
}

if (!function_exists('statusBadge')) {
    /**
     * Generate badge berdasarkan status
     */
    function statusBadge($status)
    {
        $badges = [
            'Akan Datang' => 'primary',
            'Berlangsung' => 'success',
            'Selesai' => 'secondary',
            'Baik' => 'success',
            'Cukup' => 'warning',
            'Rusak' => 'danger',
        ];

        $class = $badges[$status] ?? 'secondary';
        return "<span class='badge bg-{$class}'>{$status}</span>";
    }
}

if (!function_exists('generateAltText')) {
    /**
     * Generate SEO-friendly alt text for images
     */
    function generateAltText($title, $context = '')
    {
        $baseAlt = trim($title);
        if ($context) {
            $baseAlt .= ' - ' . trim($context);
        }
        $baseAlt .= ' | Masjid Merah Baiturrahman';
        return $baseAlt;
    }
}
