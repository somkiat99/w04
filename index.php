<?php
$pageTitle = "แบบบันทึกการบำเพ็ญประโยชน์ - MyPortfolio";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<main class="flex-grow flex items-center justify-center px-6 py-16">
    <div class="max-w-4xl mx-auto text-center">
        <span class="inline-flex items-center gap-1.5 rounded-full border border-slate-300 bg-white px-3 py-1 text-xs font-medium text-slate-700 mb-6 shadow-sm">
            <span class="size-2 rounded-full bg-emerald-500"></span>
            ยินดีต้อนรับสู่เว็บไซต์รวบรวมผลงาน
        </span>

        <h1 class="text-2xl sm:text-4xl font-extrabold tracking-tight text-slate-900 mb-6">
            สวัสดีครับ, ผมชื่อ <span class="underline decoration-slate-400">นายสมเกียรติ จันทะแสง</span>
        </h1>
        
        <p class="text-lg text-slate-600 max-w-2xl mx-auto mb-10 leading-relaxed">
            เว็บไซต์นี้จัดทำขึ้นเพื่อรวบรวมข้อมูลส่วนตัว ประวัติการศึกษา และผลงาน Assignment ต่างๆ ในรายวิชาการพัฒนาเว็บไซต์
        </p>

        <div class="flex flex-wrap items-center justify-center gap-4">
            <a href="bio.php" class="cursor-pointer whitespace-nowrap rounded-md bg-black px-6 py-3 text-sm font-medium tracking-wide text-white transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                ทำความรู้จักฉัน (Bio)
            </a>
            <a href="assignment.php" class="cursor-pointer whitespace-nowrap rounded-md border border-slate-300 bg-white px-6 py-3 text-sm font-medium tracking-wide text-slate-900 transition hover:bg-slate-100">
                ดูงาน Assignment ทั้งหมด &rarr;
            </a>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>