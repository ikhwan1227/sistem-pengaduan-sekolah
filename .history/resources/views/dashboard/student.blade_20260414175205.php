<?php
// Data dari controller
$totalPengaduan = $totalPengaduan ?? 0;
$totalBulanIni = $totalBulanIni ?? 0;
$diproses = $diproses ?? 0;
$selesai = $selesai ?? 0;
$ditolak = $ditolak ?? 0;
$draft = $draft ?? 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Test</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .stats { display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 30px; }
        .card { background: white; padding: 15px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); min-width: 120px; }
        .card h3 { margin: 0 0 5px 0; color: gray; font-size: 12px; }
        .card p { margin: 0; font-size: 24px; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Dashboard Test</h1>
    
    <div class="stats">
        <div class="card">
            <h3>Total</h3>
            <p><?php echo $totalPengaduan; ?></p>
        </div>
        <div class="card">
            <h3>Bulan Ini</h3>
            <p><?php echo $totalBulanIni; ?></p>
        </div>
        <div class="card">
            <h3>Diproses</h3>
            <p><?php echo $diproses; ?></p>
        </div>
        <div class="card">
            <h3>Selesai</h3>
            <p><?php echo $selesai; ?></p>
        </div>
        <div class="card">
            <h3>Ditolak</h3>
            <p><?php echo $ditolak; ?></p>
        </div>
        <div class="card">
            <h3>Draft</h3>
            <p><?php echo $draft; ?></p>
        </div>
    </div>
    
    <h2>Data dari Controller:</h2>
    <pre>
    totalPengaduan: <?php var_dump($totalPengaduan); ?>
    totalBulanIni: <?php var_dump($totalBulanIni); ?>
    diproses: <?php var_dump($diproses); ?>
    selesai: <?php var_dump($selesai); ?>
    ditolak: <?php var_dump($ditolak); ?>
    draft: <?php var_dump($draft); ?>
    </pre>
</body>
</html>