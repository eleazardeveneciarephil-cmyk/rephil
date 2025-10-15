
<?php
// supabase.php
$supabase_url = "https://odkojjgidfswmsaalany.supabase.co";
$supabase_key = "sb_publishable_7QPcwrIQX23KpPgjRkeLZw_odh43IB7";
$headers = [
    "Content-Type: application/json",
    "apikey: $supabase_key",
    "Authorization: Bearer $supabase_key"
];

function insertUser($name, $employee_code, $photo_url) {
    global $supabase_url, $headers;
    $data = json_encode([
        "name" => $name,
        "employee_code" => $employee_code,
        "photo_url" => $photo_url
    ]);
    $ch = curl_init("$supabase_url/rest/v1/employees");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function verifyUser($employee_code) {
    global $supabase_url, $headers;
    $ch = curl_init("$supabase_url/rest/v1/employees?employee_code=eq.$employee_code");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}
?>
