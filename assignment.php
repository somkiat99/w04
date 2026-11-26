<?php
$pageTitle = "Assignment - MyPortfolio";
include 'includes/header.php';
include 'includes/navbar.php';

$assignments = [
    [
        'week' => 'Week 01',
        'title' => '692-9022132',
        'desc' => 'ออกแบบโครงสร้างเลย์เอาท์หน้าเว็บ และใช้ Tailwindcss ในการจัดรูปแบบหน้าเว็บ โดยเนื้อหาของเว็บประกอบด้วยเนื้อหา 3 หน้า
1. โฮมเพจ (Home)
2. ประวัติ (Bio)
3. รายการงาน (Assignment)',
        'status' => 'ส่งแล้ว',
        'link' => '#'
    ],
    [
        'week' => 'Week 02',
        'title' => '9022062-65',
        'desc' => 'ความน่าจะเป็นและสถิติสำหรับเทคโนโลยีสารสนเทศ',
        'status' => 'กำลังดำเนินการ',
        'link' => 'index.php'
    ],
    [
        'week' => 'Week 03',
        'title' => '9023121-55',
        'desc' => 'การวิเคราะห์และออกแบบระบบเชิงวัตถุ',
        'status' => 'รอดำเนินการ',
        'link' => '#'
    ]
];
?>

<main class="max-w-5xl mx-auto px-6 py-12 w-full">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-slate-900">รายการงานที่ได้รับมอบหมาย (Assignments)</h2>
        <p class="text-slate-600 mt-1">รวบรวมแบบฝึกหัดและโปรเจกต์ประจำสัปดาห์</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($assignments as $item): ?>
            <article class="flex flex-col justify-between rounded-xl border border-slate-300 bg-white p-6 shadow-sm transition hover:shadow-md">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500"><?php echo $item['week']; ?></span>
                        <?php if ($item['status'] == 'ส่งแล้ว'): ?>
                            <span class="rounded-full bg-emerald-100 px-2.5 py-0.5 text-xs font-medium text-emerald-800">ส่งแล้ว</span>
                        <?php elseif ($item['status'] == 'กำลังดำเนินการ'): ?>
                            <span class="rounded-full bg-amber-100 px-2.5 py-0.5 text-xs font-medium text-amber-800">กำลังทำ</span>
                        <?php else: ?>
                            <span class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-slate-600">รอดำเนินการ</span>
                        <?php endif; ?>
                    </div>
                    
                    <h3 class="text-lg font-bold text-slate-900 mb-2"><?php echo $item['title']; ?></h3>
                    <p class="text-sm text-slate-600 leading-relaxed mb-6"><?php echo $item['desc']; ?></p>
                </div>

                <a href="<?php echo $item['link']; ?>" class="inline-flex justify-center items-center w-full rounded-md bg-black px-4 py-2 text-sm font-medium text-white transition hover:opacity-80">
                    เปิดดูผลงาน
                </a>
            </article>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'includes/footer.php'; ?>