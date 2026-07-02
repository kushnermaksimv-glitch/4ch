<?php
// Скрипт автоматического копирования загруженных картинок в Supabase Storage
function uploadToSupabase($local_file_path, $filename) {
    $supabase_id = SUPABASE_PROJECT_ID;
    $anon_key = SUPABASE_ANON_KEY;
    $bucket = SUPABASE_BUCKET;
    
    if ($supabase_id == 'xxxx') return false; // Настройки по умолчанию не изменены

    $url = "https://" . $supabase_id . ".supabase.co/storage/v1/object/" . $bucket . "/" . $filename;
    
    $file_data = file_get_contents($local_file_path);
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo, $local_file_path);
    finfo_close($finfo);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $file_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . $anon_key,
        "apikey: " . $anon_key,
        "Content-Type: " . $mime_type
    ]);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return ($http_code == 200 || $http_code == 201);
}
?>