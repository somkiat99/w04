<?php
$pageTitle = "ไบโอ (Bio) - MyPortfolio";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<main class="max-w-4xl mx-auto px-6 py-12 w-full">
    <h2 class="text-3xl font-bold text-slate-900 mb-8">ประวัติส่วนตัว (Biography)</h2>

    <article class="flex flex-col md:flex-row rounded-xl overflow-hidden border border-slate-300 bg-white shadow-sm mb-8">
        <div class="md:w-1/3 bg-slate-200 flex items-center justify-center p-6">
            <img src="images/profile.jpg" alt="Profile" class="rounded-full w-40 h-40 object-cover object-top border-4 border-white shadow">
        </div>
        <div class="p-6 md:w-2/3 flex flex-col justify-center">
            <span class="text-xs font-semibold uppercase tracking-wider text-slate-500">นักศึกษาสาขาเทคโนโลยีสารสนเทศ</span>
            <h3 class="text-2xl font-bold text-slate-900 mt-1">นายสมเกียรติ จันทะแสง(อ๊อฟ)</h3>
            <p class="text-slate-600 mt-3 leading-relaxed">
                มีความสนใจด้านการพัฒนาเว็บแอปพลิเคชันทั้งฝั่ง Front-end และ Back-end ชอบเรียนรู้เทคโนโลยีใหม่ๆ อย่าง PHP, Tailwind CSS และ JavaScript
            </p>
            <div class="mt-4 pt-4 border-t border-slate-200 grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm text-slate-700">
                <p><strong>รหัสนักศึกษา:</strong> 6814421005</p>
                <p><strong>อีเมล:</strong> 6814421005@rbru.ac.th</p>
                <p><strong>ความสนใจ:</strong> Web Dev, UI/UX Design</p>
                <p><strong>งานอดิเรก:</strong> เล่นเกม, นอน</p>
            </div>
        </div>
    </article>

    <div x-data="{ selectedAccordionItem: 'item-1' }" class="w-full divide-y divide-slate-300 overflow-hidden rounded-xl border border-slate-300 bg-white">
        <div>
            <button type="button" class="flex w-full items-center justify-between gap-4 bg-slate-50 p-4 text-left font-semibold text-slate-900 hover:bg-slate-100" @click="selectedAccordionItem = (selectedAccordionItem === 'item-1' ? '' : 'item-1')">
                <span>ทักษะด้านการเขียนโปรแกรม (Skills)</span>
                <span x-text="selectedAccordionItem === 'item-1' ? '−' : '+'" class="text-xl"></span>
            </button>
            <div x-cloak x-show="selectedAccordionItem === 'item-1'" class="p-4 text-sm text-slate-600 flex flex-wrap gap-2">
                <span class="rounded-md bg-slate-100 border border-slate-300 px-3 py-1 font-medium text-slate-800">HTML5 / CSS3</span>
                <span class="rounded-md bg-slate-100 border border-slate-300 px-3 py-1 font-medium text-slate-800">Tailwind CSS</span>
                <span class="rounded-md bg-slate-100 border border-slate-300 px-3 py-1 font-medium text-slate-800">PHP Basic</span>
                <span class="rounded-md bg-slate-100 border border-slate-300 px-3 py-1 font-medium text-slate-800">JavaScript / Alpine.js</span>
            </div>
        </div>

        <div>
            <button type="button" class="flex w-full items-center justify-between gap-4 bg-slate-50 p-4 text-left font-semibold text-slate-900 hover:bg-slate-100" @click="selectedAccordionItem = (selectedAccordionItem === 'item-2' ? '' : 'item-2')">
                <span>ประวัติการศึกษา (Education)</span>
                <span x-text="selectedAccordionItem === 'item-2' ? '−' : '+'" class="text-xl"></span>
            </button>
            <div x-cloak x-show="selectedAccordionItem === 'item-2'" class="p-4 text-sm text-slate-600">
                <p class="font-medium text-slate-800">ปริญญาตรี - คณะวิทยาศาสตร์และเทคโนโลยี</p>
                <p>กำลังศึกษาอยู่ชั้นปีที่ 2</p>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>