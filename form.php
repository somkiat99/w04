<?php
$pageTitle = "แบบบันทึกการบำเพ็ญประโยชน์ - MyPortfolio";
include 'includes/header.php';
include 'includes/navbar.php';

$submittedData = null;
$photo1Base64 = null;
$photo2Base64 = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submittedData = [
        'fullname'      => htmlspecialchars($_POST['fullname'] ?? '-'),
        'student_id'    => htmlspecialchars($_POST['student_id'] ?? '-'),
        'faculty'       => htmlspecialchars($_POST['faculty'] ?? '-'),
        'major'         => htmlspecialchars($_POST['major'] ?? '-'),
        'phone'         => htmlspecialchars($_POST['phone'] ?? '-'),
        'location'      => htmlspecialchars($_POST['location'] ?? '-'),
        'activity_date' => htmlspecialchars($_POST['activity_date'] ?? '-'),
        'start_time'    => htmlspecialchars($_POST['start_time'] ?? '-'),
        'end_time'      => htmlspecialchars($_POST['end_time'] ?? '-'),
        'total_hours'   => htmlspecialchars($_POST['total_hours'] ?? '0'),
        'task_1'        => htmlspecialchars($_POST['task_1'] ?? '-'),
        'task_2'        => htmlspecialchars($_POST['task_2'] ?? '-'),
        'task_3'        => htmlspecialchars($_POST['task_3'] ?? '-'),
    ];

    if (isset($_FILES['photo_1']) && $_FILES['photo_1']['error'] === UPLOAD_ERR_OK) {
        $type1 = mime_content_type($_FILES['photo_1']['tmp_name']);
        $data1 = file_get_contents($_FILES['photo_1']['tmp_name']);
        $photo1Base64 = 'data:' . $type1 . ';base64,' . base64_encode($data1);
    }

    if (isset($_FILES['photo_2']) && $_FILES['photo_2']['error'] === UPLOAD_ERR_OK) {
        $type2 = mime_content_type($_FILES['photo_2']['tmp_name']);
        $data2 = file_get_contents($_FILES['photo_2']['tmp_name']);
        $photo2Base64 = 'data:' . $type2 . ';base64,' . base64_encode($data2);
    }
}
?>

<main class="max-w-4xl mx-auto px-6 py-12 w-full">

    <?php if ($submittedData): ?>
        <div class="rounded-xl border border-slate-300 bg-white p-8 shadow-sm mb-8">
            <div class="mb-6 border-b border-slate-200 pb-4 flex items-center justify-between">
                <div>
                    <span class="inline-block rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-800 mb-2">บันทึกข้อมูลสำเร็จ</span>
                    <h2 class="text-2xl font-bold text-slate-900">สรุปข้อมูลการบำเพ็ญประโยชน์</h2>
                </div>
                <a href="" class="rounded-md border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-100">
                    กลับไปหน้ากรอกข้อมูล
                </a>
            </div>

            <div class="space-y-4 text-sm text-slate-800">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-slate-50 p-4 rounded-lg border border-slate-200">
                    <div><span class="font-semibold text-slate-600">ชื่อ-นามสกุล:</span> <?= $submittedData['fullname'] ?: '-' ?></div>
                    <div><span class="font-semibold text-slate-600">รหัสนักศึกษา:</span> <?= $submittedData['student_id'] ?: '-' ?></div>
                    <div><span class="font-semibold text-slate-600">คณะ:</span> <?= $submittedData['faculty'] ?: '-' ?></div>
                    <div><span class="font-semibold text-slate-600">สาขาวิชา:</span> <?= $submittedData['major'] ?: '-' ?></div>
                    <div><span class="font-semibold text-slate-600">โทรศัพท์มือถือ:</span> <?= $submittedData['phone'] ?: '-' ?></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-slate-50 p-4 rounded-lg border border-slate-200">
                    <div class="md:col-span-2"><span class="font-semibold text-slate-600">สถานที่ปฏิบัติกิจกรรม:</span> <?= $submittedData['location'] ?: '-' ?></div>
                    <div><span class="font-semibold text-slate-600">วันที่:</span> <?= $submittedData['activity_date'] ?: '-' ?></div>
                    <div><span class="font-semibold text-slate-600">เวลา:</span> <?= ($submittedData['start_time'] ?: '-') . ' น. ถึง ' . ($submittedData['end_time'] ?: '-') . ' น.' ?></div>
                    <div><span class="font-semibold text-slate-600">รวมระยะเวลา:</span> <?= ($submittedData['total_hours'] ?: '0') ?> ชั่วโมง</div>
                </div>

                <div class="bg-slate-50 p-4 rounded-lg border border-slate-200 space-y-2">
                    <div class="font-semibold text-slate-700">ลักษณะกิจกรรม/งานที่ได้รับมอบหมาย:</div>
                    <ul class="list-none space-y-1 pl-2">
                        <li><span class="font-semibold">(๑)</span> <?= $submittedData['task_1'] ?: '-' ?></li>
                        <li><span class="font-semibold">(๒)</span> <?= $submittedData['task_2'] ?: '-' ?></li>
                        <li><span class="font-semibold">(๓)</span> <?= $submittedData['task_3'] ?: '-' ?></li>
                    </ul>
                </div>

                <div class="pt-2">
                    <div class="font-semibold text-slate-700 mb-3">ภาพถ่ายหลักฐาน:</div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="rounded-lg border border-slate-300 bg-slate-50 p-4">
                            <span class="block text-xs font-semibold text-slate-600 mb-2">ภาพที่ ๑</span>
                            <?php if ($photo1Base64): ?>
                                <img src="<?= $photo1Base64 ?>" alt="ภาพที่ ๑" class="w-full h-56 object-cover rounded-md border border-slate-200" />
                            <?php else: ?>
                                <div class="h-56 flex items-center justify-center rounded-md border border-dashed border-slate-300 bg-white text-xs text-slate-400">ไม่มีรูปภาพ</div>
                            <?php endif; ?>
                        </div>
                        <div class="rounded-lg border border-slate-300 bg-slate-50 p-4">
                            <span class="block text-xs font-semibold text-slate-600 mb-2">ภาพที่ ๒</span>
                            <?php if ($photo2Base64): ?>
                                <img src="<?= $photo2Base64 ?>" alt="ภาพที่ ๒" class="w-full h-56 object-cover rounded-md border border-slate-200" />
                            <?php else: ?>
                                <div class="h-56 flex items-center justify-center rounded-md border border-dashed border-slate-300 bg-white text-xs text-slate-400">ไม่มีรูปภาพ</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>

        <div class="rounded-xl border border-slate-300 bg-white p-8 shadow-sm">
            <div class="mb-6 border-b border-slate-200 pb-4">
                <h2 class="text-2xl font-bold text-slate-900">แบบบันทึกหลักฐานการบำเพ็ญประโยชน์</h2>
                <p class="text-sm text-slate-500 mt-1">กรุณากรอกข้อมูลการปฏิบัติงานและแนบภาพถ่ายหลักฐาน</p>
            </div>

            <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-2 flex flex-col gap-1.5">
                        <label for="fullname" class="text-sm font-medium text-slate-700">ด้วย ข้าพเจ้า (นาย, นางสาว)</label>
                        <input id="fullname" type="text" name="fullname" placeholder="ระบุชื่อ-นามสกุล" class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" />
                    </div>
                    <div class="flex flex-col gap-1.5">
                       <label for="student_id" class="text-sm font-medium text-slate-700">รหัสนักศึกษา</label>
                        <input
                        id="student_id"
                        type="text"
                        inputmode="numeric"
                        name="student_id"
                        placeholder="เช่น 660123456"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                        class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black"
                        />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-1.5">
                        <label for="faculty" class="text-sm font-medium text-slate-700">ชื่อคณะ</label>
                        <select
                            id="faculty"
                            name="faculty"
                            onchange="updateMajors()"
                            class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black"
                        >
                            <option value="" disabled selected>-- เลือกชื่อคณะ --</option>
                            <option value="ครุศาสตร์">คณะครุศาสตร์</option>
                            <option value="วิทยาศาสตร์และเทคโนโลยี">คณะวิทยาศาสตร์และเทคโนโลยี</option>
                            <option value="วิทยาการจัดการ">คณะวิทยาการจัดการ</option>
                            <option value="มนุษยศาสตร์และสังคมศาสตร์">คณะมนุษยศาสตร์และสังคมศาสตร์</option>
                            <option value="เทคโนโลยีอุตสาหกรรม">คณะเทคโนโลยีอุตสาหกรรม</option>
                            <option value="เทคโนโลยีการเกษตร">คณะเทคโนโลยีการเกษตร</option>
                            <option value="นิติศาสตร์">คณะนิติศาสตร์</option>
                            <option value="วิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ">คณะวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ</option>
                            <option value="นิเทศศาสตร์">คณะนิเทศศาสตร์</option>
                            <option value="พยาบาลศาสตร์">คณะพยาบาลศาสตร์</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="major" class="text-sm font-medium text-slate-700">สาขาวิชา</label>
                        <select
                            id="major"
                            name="major"
                            disabled
                            class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 disabled:opacity-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black"
                        >
                            <option value="" disabled selected>-- กรุณาเลือกคณะก่อน --</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                   <label for="phone" class="text-sm font-medium text-slate-700">โทรศัพท์มือถือ</label>
                    <input
                    id="phone"
                    type="tel"
                    inputmode="numeric"
                    name="phone"
                    maxlength="10"
                    placeholder="08X-XXX-XXXX"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                    class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black"
                    />
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="location" class="text-sm font-medium text-slate-700">ได้บำเพ็ญประโยชน์ ณ (สถานที่)</label>
                    <input id="location" type="text" name="location" placeholder="ระบุสถานที่ปฏิบัติกิจกรรม" class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="flex flex-col gap-1.5">
                        <label for="activity_date" class="text-sm font-medium text-slate-700">ในวันที่</label>
                        <input id="activity_date" type="date" name="activity_date" class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label for="start_time" class="text-sm font-medium text-slate-700">ตั้งแต่เวลา</label>
                        <input id="start_time" type="time" name="start_time" class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label for="end_time" class="text-sm font-medium text-slate-700">ถึงเวลา</label>
                        <input id="end_time" type="time" name="end_time" class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" />
                    </div>
                    <div class="flex flex-col gap-1.5">
                        <label for="total_hours" class="text-sm font-medium text-slate-700">รวมเป็น (ชม.)</label>
                        <input id="total_hours" type="number" step="0.5" name="total_hours" placeholder="0" class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" />
                    </div>
                </div>

                <div class="space-y-3 pt-2">
                    <label class="block text-sm font-medium text-slate-700">ซึ่งมีลักษณะกิจกรรม/งานที่ได้รับมอบหมายให้ปฏิบัติ</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-semibold text-slate-600">(๑)</span>
                            <input type="text" name="task_1" placeholder="ระบุรายละเอียดงานที่ 1" class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" />
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm font-semibold text-slate-600">(๒)</span>
                            <input type="text" name="task_2" placeholder="ระบุรายละเอียดงานที่ 2" class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" />
                        </div>
                        <div class="flex items-center gap-2 md:col-span-2">
                            <span class="text-sm font-semibold text-slate-600">(๓)</span>
                            <input type="text" name="task_3" placeholder="ระบุรายละเอียดงานที่ 3" class="w-full rounded-md border border-slate-300 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" />
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-200">
                    <p class="text-sm font-medium text-slate-700 mb-4">ทั้งนี้ ข้าพเจ้าได้แนบหลักฐานเป็นภาพถ่าย ดังภาพ</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div x-data="{ imageUrl: null }" class="rounded-lg border border-slate-300 bg-slate-50 p-4 flex flex-col">
                            <span class="text-sm font-semibold text-slate-800 mb-3">ภาพที่ ๑</span>
                            <div class="relative flex-grow flex items-center justify-center min-h-[220px] rounded-md border-2 border-dashed border-slate-300 bg-white overflow-hidden">
                                <template x-if="imageUrl">
                                    <img :src="imageUrl" class="w-full h-56 object-cover" alt="ภาพที่ ๑" />
                                </template>
                                <template x-if="!imageUrl">
                                    <div class="text-center p-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto size-8 text-slate-400 mb-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="text-xs text-slate-500">เลือกไฟล์ภาพถ่ายหลักฐานที่ 1</span>
                                    </div>
                                </template>
                            </div>
                            <input type="file" name="photo_1" accept="image/*" @change="imageUrl = URL.createObjectURL($event.target.files[0])" class="mt-3 block w-full text-xs text-slate-600 file:mr-3 file:rounded-md file:border-0 file:bg-black file:px-3 file:py-1.5 file:text-xs file:font-medium file:text-white hover:file:opacity-80 cursor-pointer" />
                        </div>

                        <div x-data="{ imageUrl: null }" class="rounded-lg border border-slate-300 bg-slate-50 p-4 flex flex-col">
                            <span class="text-sm font-semibold text-slate-800 mb-3">ภาพที่ ๒</span>
                            <div class="relative flex-grow flex items-center justify-center min-h-[220px] rounded-md border-2 border-dashed border-slate-300 bg-white overflow-hidden">
                                <template x-if="imageUrl">
                                    <img :src="imageUrl" class="w-full h-56 object-cover" alt="ภาพที่ ๒" />
                                </template>
                                <template x-if="!imageUrl">
                                    <div class="text-center p-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-auto size-8 text-slate-400 mb-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="text-xs text-slate-500">เลือกไฟล์ภาพถ่ายหลักฐานที่ 2</span>
                                    </div>
                                </template>
                            </div>
                            <input type="file" name="photo_2" accept="image/*" @change="imageUrl = URL.createObjectURL($event.target.files[0])" class="mt-3 block w-full text-xs text-slate-600 file:mr-3 file:rounded-md file:border-0 file:bg-black file:px-3 file:py-1.5 file:text-xs file:font-medium file:text-white hover:file:opacity-80 cursor-pointer" />
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <button type="reset" class="cursor-pointer rounded-md border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                        ล้างข้อมูล
                    </button>
                    <button type="submit" class="cursor-pointer rounded-md bg-black px-6 py-2.5 text-sm font-medium text-white transition hover:opacity-80">
                        บันทึกข้อมูล
                    </button>
                </div>
            </form>
        </div>

        <script>
        const majorsByFaculty = {
            "ครุศาสตร์": [
                "การศึกษาปฐมวัย",
                "ภาษาไทย",
                "ภาษาอังกฤษ",
                "คณิตศาสตร์",
                "วิทยาศาสตร์ทั่วไป",
                "สังคมศึกษา",
                "พลศึกษา",
                "ดนตรีศึกษา",
                "ศิลปศึกษา",
                "คอมพิวเตอร์ศึกษา"
            ],
            "วิทยาศาสตร์และเทคโนโลยี": [
                "เคมี",
                "ชีววิทยา",
                "ฟิสิกส์",
                "คณิตศาสตร์ประยุกต์",
                "วิทยาศาสตร์สิ่งแวดล้อม",
                "สาธารณสุขศาสตร์",
                "วิทยาศาสตร์การกีฬาและการออกกำลังกาย",
                "เทคโนโลยีการอาหาร"
            ],
            "วิทยาการจัดการ": [
                "การบัญชี",
                "การตลาด",
                "การจัดการ",
                "การเงินและการธนาคาร",
                "บริหารทรัพยากรมนุษย์",
                "การจัดการโลจิสติกส์และซัพพลายเชน",
                "การท่องเที่ยวและการโรงแรม",
                "เศรษฐศาสตร์"
            ],
            "มนุษยศาสตร์และสังคมศาสตร์": [
                "ภาษาอังกฤษเพื่อการสื่อสาร",
                "ภาษาจีน",
                "ภาษาญี่ปุ่น",
                "รัฐประศาสนศาสตร์",
                "การพัฒนาชุมชน",
                "บรรณารักษศาสตร์และสารสนเทศศาสตร์",
                "ดนตรีสากล",
                "ทัศนศิลป์"
            ],
            "เทคโนโลยีอุตสาหกรรม": [
                "วิศวกรรมไฟฟ้า",
                "วิศวกรรมเครื่องกล",
                "วิศวกรรมอุตสาหการ",
                "วิศวกรรมโยธา",
                "เทคโนโลยีสถาปัตยกรรม",
                "ออกแบบผลิตภัณฑ์อุตสาหกรรม"
            ],
            "เทคโนโลยีการเกษตร": [
                "เกษตรศาสตร์",
                "สัตวศาสตร์",
                "ประมง",
                "เทคโนโลยีภูมิทัศน์"
            ],
            "นิติศาสตร์": [
                "นิติศาสตร์"
            ],
            "วิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ": [
                "วิทยาการคอมพิวเตอร์",
                "เทคโนโลยีสารสนเทศ",
                "วิศวกรรมซอฟต์แวร์",
                "เทคโนโลยีมัลติมีเดียและแอนิเมชัน",
                "ภูมิสารสนเทศ"
            ],
            "นิเทศศาสตร์": [
                "การสื่อสารมวลชน",
                "การประชาสัมพันธ์และการสื่อสารองค์กร",
                "วิทยุกระจายเสียง วิทยุโทรทัศน์ และสื่อดิจิทัล"
            ],
            "พยาบาลศาสตร์": [
                "พยาบาลศาสตรบัณฑิต"
            ]
        };

        function updateMajors() {
            const facultySelect = document.getElementById("faculty");
            const majorSelect = document.getElementById("major");
            const selectedFaculty = facultySelect.value;

            majorSelect.innerHTML = '<option value="" disabled selected>-- เลือกสาขาวิชา --</option>';
            majorSelect.disabled = false;

            const majors = majorsByFaculty[selectedFaculty] || [];
            majors.forEach(major => {
                const option = document.createElement("option");
                option.value = major;
                option.textContent = major;
                majorSelect.appendChild(option);
            });
        }
        </script>
    <?php endif; ?>

</main>

<?php include 'includes/footer.php'; ?>