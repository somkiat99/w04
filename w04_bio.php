<?php
$pageTitle = "w04-bio";
include 'includes/header.php';
include 'includes/navbar.php';

$user = "นายสมเกียรติ จันทะแสง";
$program = "Information Technology";
$myURL = "https://stu.rbru.ac.th/~s6814421005/";
$expected_grade = array(
    "Web Technology" => "A",
    "Database Systems" => "A",
    "Computer Programming" => "B+",
    "Data Structures" => "D"
);
?>

<main class="max-w-4xl mx-auto px-6 py-12 w-full">
    <div class="rounded-xl border border-slate-300 bg-white p-8 shadow-sm">
        <div class="mb-6 border-b border-slate-200 pb-4">
            <h1 class="text-2xl font-bold text-slate-900">w04 - ข้อมูลนักศึกษา (PHP Variables & Array)</h1>
        </div>

        <div class="flex flex-col gap-3 text-sm text-slate-700 bg-slate-50 p-5 rounded-lg border border-slate-200 mb-6">
            <p><strong class="text-slate-900">ชื่อ-นามสกุล:</strong> <?php echo $user; ?></p>
            <p><strong class="text-slate-900">สาขาวิชา:</strong> <?php echo $program; ?></p>
            <p><strong class="text-slate-900">เว็บไซต์:</strong> <a href="<?php echo $myURL; ?>" target="_blank" class="text-blue-600 underline hover:text-blue-800"><?php echo $myURL; ?></a></p>
        </div>

        <h2 class="text-lg font-bold text-slate-900 mb-3">ผลการเรียนที่คาดหวัง (Expected Grade)</h2>
        <div class="overflow-hidden rounded-lg border border-slate-300">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="border-b border-slate-300 bg-slate-100 text-xs uppercase text-slate-900">
                    <tr>
                        <th class="px-4 py-3 font-semibold">รายวิชา</th>
                        <th class="px-4 py-3 font-semibold text-center">เกรดที่คาดหวัง</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 bg-white">
                    <?php
                    foreach ($expected_grade as $subject => $grade) {
                        if ($grade == "A") {
                            $badgeClass = "bg-emerald-100 border-emerald-400 text-emerald-800";
                        } elseif ($grade == "D") {
                            $badgeClass = "bg-red-100 border-red-400 text-red-800";
                        } else {
                            $badgeClass = "bg-slate-100 border-slate-300 text-slate-900";
                        }

                        echo "<tr class='hover:bg-slate-50'>";
                        echo "<td class='px-4 py-3 font-medium text-slate-800'>$subject</td>";
                        echo "<td class='px-4 py-3 text-center'>";
                        echo "<span class='rounded-md border px-2.5 py-0.5 font-bold $badgeClass'>$grade</span>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>