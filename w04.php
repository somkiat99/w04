<?php
$pageTitle = "w04-index";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<main class="max-w-4xl mx-auto px-6 py-12 w-full">
    <div class="rounded-xl border border-slate-300 bg-white p-8 shadow-sm">
        <h1 class="text-2xl font-bold text-slate-900 mb-6 border-b border-slate-200 pb-4">w04 - ข้อมูล Server ($_SERVER)</h1>
        
        <div class="flex flex-col gap-3 text-sm text-slate-700 font-mono bg-slate-50 p-5 rounded-lg border border-slate-200">
            <p><strong class="text-slate-900">User Agent:</strong> <?php echo $_SERVER["HTTP_USER_AGENT"]; ?></p>
            <p><strong class="text-slate-900">Host:</strong> <?php echo $_SERVER["HTTP_HOST"]; ?></p>
            <p><strong class="text-slate-900">Server Software:</strong> <?php echo $_SERVER["SERVER_SOFTWARE"]; ?></p>
            <p><strong class="text-slate-900">Script Filename:</strong> <?php echo $_SERVER["SCRIPT_FILENAME"]; ?></p>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>