<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Say Panha | Full-Stack & System Developer Portfolio</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Fonts: Google Fonts (Kantumruy Pro & Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Kantumruy Pro', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen selection:bg-indigo-500 selection:text-white">

    <!-- Top Navigation Bar -->
    <header class="sticky top-0 z-50 backdrop-blur-md bg-slate-950/80 border-b border-slate-800/80">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="#" class="flex items-center gap-2.5 text-white font-bold tracking-tight text-lg">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-tr from-indigo-600 to-blue-500 text-white flex items-center justify-center font-black shadow-lg shadow-indigo-600/30">
                    SP
                </span>
                <span class="tracking-wide">SAY PANHA</span>
            </a>

            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-400">
                <a href="#about" class="hover:text-white transition-colors">អំពីខ្ញុំ</a>
                <a href="#skills" class="hover:text-white transition-colors">ជំនាញបច្ចេកវិទ្យា</a>
                <a href="#projects" class="hover:text-white transition-colors">គម្រោងការងារ</a>
                <a href="#contact" class="hover:text-white transition-colors">ទំនាក់ទំនង</a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="https://www.linkedin.com/in/say-panha-03b123245/" target="_blank" class="hidden sm:inline-flex items-center gap-2 px-3.5 py-2 text-xs font-semibold rounded-lg bg-slate-900 border border-slate-700 text-slate-200 hover:text-white hover:border-blue-500 transition-all">
                    <i class="fab fa-linkedin text-blue-400 text-sm"></i>
                    <span>LinkedIn</span>
                </a>
                <a href="#contact" class="px-4 py-2 text-xs font-semibold rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white transition-all shadow-lg shadow-indigo-600/20">
                    ទាក់ទងខ្ញុំ
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="about" class="max-w-6xl mx-auto px-6 pt-20 pb-16 flex flex-col-reverse md:flex-row items-center gap-12">
        <div class="flex-1 space-y-6 text-center md:text-left">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-semibold tracking-wide uppercase">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                Senior Full-Stack & System Developer
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-white leading-tight">
                សួស្តី! ខ្ញុំបាទ <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 via-sky-400 to-blue-500">Say Panha</span>
            </h1>
            <p class="text-base md:text-lg text-slate-400 leading-relaxed max-w-xl">
                Full-Stack Web Developer ដែលមានបទពិសោធន៍ខ្ពស់ក្នុងការអភិវឌ្ឍប្រព័ន្ធគ្រប់គ្រងសហគ្រាស (ERP), ប្រព័ន្ធរដ្ឋបាលឌីជីថលរបស់រដ្ឋាភិបាល (Government Systems) និងវិបផតថលអប់រំ ដោយប្រើប្រាស់ <strong>Laravel, Livewire, Filament, MySQL</strong> និងស្ថាបត្យកម្ម <strong>RESTful APIs</strong>។
            </p>

            <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 pt-2">
                <a href="#projects" class="px-6 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white font-medium text-sm transition shadow-lg shadow-indigo-600/25 flex items-center gap-2">
                    <span>ពិនិត្យមើលគម្រោងធំៗ</span>
                    <i class="fas fa-arrow-down text-xs"></i>
                </a>
                <a href="https://www.linkedin.com/in/say-panha-03b123245/" target="_blank" class="px-6 py-3 rounded-xl border border-slate-800 bg-slate-900/60 hover:bg-slate-800 text-slate-300 font-medium text-sm transition">
                    មើលគណនី LinkedIn
                </a>
            </div>
        </div>

        <!-- Profile Badge Card -->
        <div class="relative">
            <div class="w-64 h-64 md:w-80 md:h-80 rounded-3xl bg-gradient-to-tr from-indigo-500 via-sky-500 to-blue-600 p-1 shadow-2xl shadow-indigo-500/20">
                <div class="w-full h-full rounded-[22px] bg-slate-900 flex flex-col items-center justify-center text-center p-6 border border-slate-800 relative overflow-hidden">
                    <div class="absolute -top-12 -right-12 w-32 h-32 bg-indigo-500/20 rounded-full blur-2xl"></div>
                    <div class="w-24 h-24 rounded-2xl bg-slate-800 border-2 border-indigo-500/30 flex items-center justify-center text-indigo-400 text-4xl mb-4 shadow-inner">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h2 class="text-xl font-bold text-white">Say Panha</h2>
                    <span class="text-xs font-medium text-indigo-400 mt-1">Full-Stack & ERP Specialist</span>
                    <div class="mt-4 flex flex-wrap justify-center gap-2">
                        <span class="text-[11px] px-2.5 py-1 bg-slate-800/80 border border-slate-700/60 rounded-md text-slate-300">Laravel / Filament</span>
                        <span class="text-[11px] px-2.5 py-1 bg-slate-800/80 border border-slate-700/60 rounded-md text-slate-300">Government Tech</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tech Skills Section -->
    <section id="skills" class="max-w-6xl mx-auto px-6 py-14 border-t border-slate-900">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-white">ជំនាញបច្ចេកវិទ្យាស្នូល (Technical Skills)</h2>
            <p class="text-sm text-slate-400 mt-2">បច្ចេកវិទ្យាដែលប្រើក្នុងការបង្កើតប្រព័ន្ធខ្នាតធំ</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
            <div class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800/80 text-center hover:border-red-500/50 hover:bg-slate-900 transition group">
                <i class="fab fa-laravel text-4xl text-red-500 mb-3 group-hover:scale-110 transition-transform"></i>
                <div class="text-sm font-semibold text-slate-200">Laravel</div>
                <div class="text-[11px] text-slate-500 mt-1">Backend Framework</div>
            </div>
            <div class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800/80 text-center hover:border-indigo-500/50 hover:bg-slate-900 transition group">
                <i class="fab fa-php text-4xl text-indigo-400 mb-3 group-hover:scale-110 transition-transform"></i>
                <div class="text-sm font-semibold text-slate-200">PHP</div>
                <div class="text-[11px] text-slate-500 mt-1">Core Architecture</div>
            </div>
            <div class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800/80 text-center hover:border-amber-500/50 hover:bg-slate-900 transition group">
                <i class="fas fa-bolt text-4xl text-amber-400 mb-3 group-hover:scale-110 transition-transform"></i>
                <div class="text-sm font-semibold text-slate-200">Livewire / Filament</div>
                <div class="text-[11px] text-slate-500 mt-1">Admin & Dashboard</div>
            </div>
            <div class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800/80 text-center hover:border-sky-500/50 hover:bg-slate-900 transition group">
                <i class="fas fa-database text-4xl text-sky-400 mb-3 group-hover:scale-110 transition-transform"></i>
                <div class="text-sm font-semibold text-slate-200">MySQL</div>
                <div class="text-[11px] text-slate-500 mt-1">Relational DB</div>
            </div>
            <div class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800/80 text-center hover:border-emerald-500/50 hover:bg-slate-900 transition group">
                <i class="fas fa-network-wired text-4xl text-emerald-400 mb-3 group-hover:scale-110 transition-transform"></i>
                <div class="text-sm font-semibold text-slate-200">RESTful APIs</div>
                <div class="text-[11px] text-slate-500 mt-1">API Integrations</div>
            </div>
            <div class="p-5 rounded-2xl bg-slate-900/60 border border-slate-800/80 text-center hover:border-orange-500/50 hover:bg-slate-900 transition group">
                <i class="fab fa-git-alt text-4xl text-orange-500 mb-3 group-hover:scale-110 transition-transform"></i>
                <div class="text-sm font-semibold text-slate-200">Git / CI/CD</div>
                <div class="text-[11px] text-slate-500 mt-1">Version Control</div>
            </div>
        </div>
    </section>

    <!-- Projects Showcase Section -->
    <section id="projects" class="max-w-6xl mx-auto px-6 py-16 border-t border-slate-900">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-white">គម្រោងប្រព័ន្ធដែលបានបង្កើត (Production Projects)</h2>
                <p class="text-sm text-slate-400 mt-2">ប្រព័ន្ធ ERP, ប្រព័ន្ធរដ្ឋបាលក្រសួងការងារ និងវិបផតថលអប់រំដែលកំពុងដំណើរការជាក់ស្តែង</p>
            </div>
            <span class="text-xs font-semibold text-slate-500 mt-3 md:mt-0">សរុប ៦ គម្រោងធំៗ</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Project 1: Clearview ERP -->
            <div class="rounded-2xl bg-slate-900/70 border border-slate-800 hover:border-indigo-500/50 p-6 flex flex-col justify-between transition-all group">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">ERP & Enterprise</span>
                        <i class="fas fa-chart-line text-slate-500 group-hover:text-indigo-400 transition"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-indigo-300 transition">SME Clearview ERP</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">
                        ប្រព័ន្ធគ្រប់គ្រងអាជីវកម្មបែបសហគ្រាស (Enterprise Resource Planning) សម្រាប់គ្រប់គ្រងប្រតិបត្តិការ ហិរញ្ញវត្ថុ ស្តុក និងដំណើរការអាជីវកម្មខ្នាតតូចនិងមធ្យម។
                    </p>
                </div>
                <div>
                    <div class="flex flex-wrap gap-1.5 text-xs text-slate-400 mb-4">
                        <span class="px-2 py-0.5 bg-slate-800 rounded">Laravel</span>
                        <span class="px-2 py-0.5 bg-slate-800 rounded">MySQL</span>
                        <span class="px-2 py-0.5 bg-slate-800 rounded">ERP Module</span>
                    </div>
                    <a href="https://sme.clearview-erp.com/" target="_blank" class="inline-flex items-center gap-2 text-xs font-semibold text-indigo-400 hover:text-indigo-300 transition">
                        <span>បើកមើលគេហទំព័រ</span>
                        <i class="fas fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                </div>
            </div>

            <!-- Project 2: NTTI Portal -->
            <div class="rounded-2xl bg-slate-900/70 border border-slate-800 hover:border-sky-500/50 p-6 flex flex-col justify-between transition-all group">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-sky-500/10 text-sky-400 border border-sky-500/20">University Portal</span>
                        <i class="fas fa-graduation-cap text-slate-500 group-hover:text-sky-400 transition"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-sky-300 transition">NTTI Portal</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">
                        វិបផតថលគ្រប់គ្រងទិន្នន័យនិស្សិត គ្រូបង្រៀន កាលវិភាគ និងព័ត៌មានអប់រំសម្រាប់វិទ្យាស្ថានជាតិបណ្តុះបណ្តាលបច្ចេកទេស (NTTI)។
                    </p>
                </div>
                <div>
                    <div class="flex flex-wrap gap-1.5 text-xs text-slate-400 mb-4">
                        <span class="px-2 py-0.5 bg-slate-800 rounded">Web Portal</span>
                        <span class="px-2 py-0.5 bg-slate-800 rounded">Student Management</span>
                        <span class="px-2 py-0.5 bg-slate-800 rounded">PHP/Laravel</span>
                    </div>
                    <a href="https://nttiportal.com/" target="_blank" class="inline-flex items-center gap-2 text-xs font-semibold text-sky-400 hover:text-sky-300 transition">
                        <span>បើកមើលគេហទំព័រ</span>
                        <i class="fas fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                </div>
            </div>

            <!-- Project 3: MLVT Attendance -->
            <div class="rounded-2xl bg-slate-900/70 border border-slate-800 hover:border-emerald-500/50 p-6 flex flex-col justify-between transition-all group">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Government System</span>
                        <i class="fas fa-clipboard-user text-slate-500 group-hover:text-emerald-400 transition"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-emerald-300 transition">MLVT Attendance</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">
                        ប្រព័ន្ធឌីជីថលគ្រប់គ្រង និងតាមដានវត្តមានមន្ត្រីរាជការ និងបុគ្គលិកនៃក្រសួងការងារ និងបណ្តុះបណ្តាលវិជ្ជាជីវៈ (attendance.mlvt.gov.kh)។
                    </p>
                </div>
                <div>
                    <div class="flex flex-wrap gap-1.5 text-xs text-slate-400 mb-4">
                        <span class="px-2 py-0.5 bg-slate-800 rounded">Attendance System</span>
                        <span class="px-2 py-0.5 bg-slate-800 rounded">MLVT.gov.kh</span>
                        <span class="px-2 py-0.5 bg-slate-800 rounded">Backend Engine</span>
                    </div>
                    <span class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400">
                        <i class="fas fa-lock text-[10px]"></i>
                        <span>attendance.mlvt.gov.kh</span>
                    </span>
                </div>
            </div>

            <!-- Project 4: MLVT Exam -->
            <div class="rounded-2xl bg-slate-900/70 border border-slate-800 hover:border-amber-500/50 p-6 flex flex-col justify-between transition-all group">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-amber-500/10 text-amber-400 border border-amber-500/20">E-Exam Platform</span>
                        <i class="fas fa-file-pen text-slate-500 group-hover:text-amber-400 transition"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-amber-300 transition">MLVT Exam System</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">
                        ប្រព័ន្ធរៀបចំ និងគ្រប់គ្រងការប្រឡងតាមប្រព័ន្ធអេឡិចត្រូនិក (Online/Digital Exam Platform) របស់ក្រសួងការងារ និងបណ្តុះបណ្តាលវិជ្ជាជីវៈ។
                    </p>
                </div>
                <div>
                    <div class="flex flex-wrap gap-1.5 text-xs text-slate-400 mb-4">
                        <span class="px-2 py-0.5 bg-slate-800 rounded">Exam Engine</span>
                        <span class="px-2 py-0.5 bg-slate-800 rounded">Live Grading</span>
                        <span class="px-2 py-0.5 bg-slate-800 rounded">High Concurrency</span>
                    </div>
                    <span class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400">
                        <i class="fas fa-lock text-[10px]"></i>
                        <span>exam.mlvt.gov.kh</span>
                    </span>
                </div>
            </div>

            <!-- Project 5: LACMS -->
            <div class="rounded-2xl bg-slate-900/70 border border-slate-800 hover:border-purple-500/50 p-6 flex flex-col justify-between transition-all group">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-purple-500/10 text-purple-400 border border-purple-500/20">Case Management</span>
                        <i class="fas fa-scale-balanced text-slate-500 group-hover:text-purple-400 transition"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-purple-300 transition">LACMS</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">
                        (Labour Arbitration / Case Management System) ប្រព័ន្ធគ្រប់គ្រងសំណុំរឿង វិវាទការងារ និងដំណើរការរដ្ឋបាលផ្លូវច្បាប់ប្រកបដោយសុវត្ថិភាពខ្ពស់។
                    </p>
                </div>
                <div>
                    <div class="flex flex-wrap gap-1.5 text-xs text-slate-400 mb-4">
                        <span class="px-2 py-0.5 bg-slate-800 rounded">Case Workflow</span>
                        <span class="px-2 py-0.5 bg-slate-800 rounded">Audit Trail</span>
                        <span class="px-2 py-0.5 bg-slate-800 rounded">Role & Permissions</span>
                    </div>
                    <span class="inline-flex items-center gap-2 text-xs font-semibold text-purple-400">
                        <i class="fas fa-shield-halved text-[10px]"></i>
                        <span>Internal Gov System</span>
                    </span>
                </div>
            </div>

            <!-- Project 6: TVCMS -->
            <div class="rounded-2xl bg-slate-900/70 border border-slate-800 hover:border-rose-500/50 p-6 flex flex-col justify-between transition-all group">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-rose-500/10 text-rose-400 border border-rose-500/20">TVET Management</span>
                        <i class="fas fa-chalkboard-user text-slate-500 group-hover:text-rose-400 transition"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2 group-hover:text-rose-300 transition">TVCMS</h3>
                    <p class="text-slate-400 text-sm leading-relaxed mb-4">
                        (Technical & Vocational Education Management System) ប្រព័ន្ធគ្រប់គ្រង និងតាមដានការបណ្តុះបណ្តាលបច្ចេកទេស និងវិជ្ជាជីវៈ (TVET)។
                    </p>
                </div>
                <div>
                    <div class="flex flex-wrap gap-1.5 text-xs text-slate-400 mb-4">
                        <span class="px-2 py-0.5 bg-slate-800 rounded">TVET Data</span>
                        <span class="px-2 py-0.5 bg-slate-800 rounded">Curriculum Tracking</span>
                        <span class="px-2 py-0.5 bg-slate-800 rounded">Central Dashboard</span>
                    </div>
                    <span class="inline-flex items-center gap-2 text-xs font-semibold text-rose-400">
                        <i class="fas fa-shield-halved text-[10px]"></i>
                        <span>Internal Gov System</span>
                    </span>
                </div>
            </div>

        </div>
    </section>

    <!-- Awards & Competition Honors Section -->
    <section id="honors" class="max-w-6xl mx-auto px-6 py-16 border-t border-slate-900">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/20 text-amber-400 text-xs font-semibold tracking-wide uppercase mb-3">
                <i class="fas fa-trophy"></i>
                Achievements & Honors
            </div>
            <h2 class="text-2xl md:text-3xl font-bold text-white">ការប្រកួតប្រជែងជំនាញ (Skills Competitions)</h2>
            <p class="text-sm text-slate-400 mt-2">ការតំណាងជាតិ និងការចូលរួមប្រកួតប្រជែងសមត្ថភាពបច្ចេកវិទ្យាកម្រិតជាតិ និងតំបន់អាស៊ាន</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Card 1: WorldSkills ASEAN (Philippines) -->
            <div class="relative rounded-2xl bg-gradient-to-b from-slate-900 to-slate-950 border border-amber-500/30 p-7 hover:border-amber-500/60 transition-all shadow-lg shadow-amber-500/5 group">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-bold px-3 py-1 rounded-md bg-amber-500/15 text-amber-300 border border-amber-500/30 flex items-center gap-1.5">
                        <i class="fas fa-globe-asia"></i>
                        ថ្នាក់អន្តរជាតិ (International)
                    </span>
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 group-hover:scale-110 transition-transform">
                        <i class="fas fa-medal text-lg"></i>
                    </div>
                </div>

                <h3 class="text-xl font-bold text-white mb-1 group-hover:text-amber-300 transition-colors">
                    WorldSkills ASEAN Competition
                </h3>
                <div class="text-xs font-semibold text-amber-400/90 mb-3 flex items-center gap-2">
                    <span><i class="fas fa-location-dot"></i> ប្រទេសហ្វីលីពីន (Philippines)</span>
                    <span>•</span>
                    <span>ជំនាញ៖ IT Network Cabling / Web Technologies</span>
                </div>

                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    ជាបេក្ខជនតំណាងឱ្យប្រទេសកម្ពុជា ចូលរួមប្រកួតប្រជែងជំនាញបច្ចេកវិទ្យាព័ត៌មានកម្រិតអន្តរជាតិជាមួយបណ្តាប្រទេសសមាជិកអាស៊ាន ដោយអនុវត្តជាក់ស្តែងលើលំហាត់បច្ចេកទេស និងបទដ្ឋានស្តង់ដារតំបន់។
                </p>

                <div class="flex flex-wrap gap-2 text-xs text-slate-300 border-t border-slate-800/80 pt-4">
                    <span class="px-2.5 py-1 bg-slate-800/80 rounded-md border border-slate-700/60">Cambodian National Competitor</span>
                    <span class="px-2.5 py-1 bg-slate-800/80 rounded-md border border-slate-700/60">ASEAN Standard</span>
                    <span class="px-2.5 py-1 bg-slate-800/80 rounded-md border border-slate-700/60">Hands-on Technical Exam</span>
                </div>
            </div>

            <!-- Card 2: Cambodia National Skills Competition -->
            <div class="relative rounded-2xl bg-gradient-to-b from-slate-900 to-slate-950 border border-blue-500/30 p-7 hover:border-blue-500/60 transition-all shadow-lg shadow-blue-500/5 group">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-xs font-bold px-3 py-1 rounded-md bg-blue-500/15 text-blue-300 border border-blue-500/30 flex items-center gap-1.5">
                        <i class="fas fa-flag"></i>
                        ថ្នាក់ជាតិ (National)
                    </span>
                    <div class="w-10 h-10 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400 group-hover:scale-110 transition-transform">
                        <i class="fas fa-award text-lg"></i>
                    </div>
                </div>

                <h3 class="text-xl font-bold text-white mb-1 group-hover:text-blue-300 transition-colors">
                    Cambodia National Skills Competition
                </h3>
                <div class="text-xs font-semibold text-blue-400/90 mb-3 flex items-center gap-2">
                    <span><i class="fas fa-landmark"></i> រាជធានីភ្នំពេញ កម្ពុជា</span>
                    <span>•</span>
                    <span>ជំនាញ៖ Web Technologies / Web Design</span>
                </div>

                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    បានចូលរួមប្រកួតប្រជែងជំនាញរៀបចំគេហទំព័រ (Web Design & Development) ថ្នាក់ជាតិ រៀបចំឡើងដោយក្រសួងការងារ និងបណ្តុះបណ្តាលវិជ្ជាជីវៈ ដោយឆ្លងកាត់ការប្រឡងសរសេរកូដ Frontend, Backend, UI/UX និង Database។
                </p>

                <div class="flex flex-wrap gap-2 text-xs text-slate-300 border-t border-slate-800/80 pt-4">
                    <span class="px-2.5 py-1 bg-slate-800/80 rounded-md border border-slate-700/60">Web Technologies</span>
                    <span class="px-2.5 py-1 bg-slate-800/80 rounded-md border border-slate-700/60">National Stage</span>
                    <span class="px-2.5 py-1 bg-slate-800/80 rounded-md border border-slate-700/60">Ministry of Labour & TVET</span>
                </div>
            </div>

        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="max-w-4xl mx-auto px-6 py-20 border-t border-slate-900">
        <div class="rounded-3xl bg-slate-900/70 border border-slate-800 p-8 md:p-12 text-center relative overflow-hidden">
            <div class="absolute -bottom-16 -left-16 w-48 h-48 bg-indigo-500/15 rounded-full blur-3xl"></div>

            <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-3">ទំនាក់ទំនងការងារ (Get in Touch)</h2>
            <p class="text-slate-400 text-sm max-w-md mx-auto mb-8">
                សូមទាក់ទងមកកាន់ខ្ញុំ ប្រសិនបើលោកអ្នកត្រូវការអ្នកបង្កើតប្រព័ន្ធគ្រប់គ្រងសហគ្រាស (ERP), ប្រព័ន្ធស្វ័យប្រវត្តិកម្ម ឬ Backend APIs។
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="https://www.linkedin.com/in/say-panha-03b123245/" target="_blank" class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-medium text-sm transition flex items-center gap-2">
                    <i class="fab fa-linkedin"></i>
                    <span>LinkedIn Profile</span>
                </a>
                <a href="mailto:saypanha.dev@gmail.com" class="px-6 py-3 rounded-xl bg-slate-800 border border-slate-700 hover:bg-slate-700 text-slate-200 font-medium text-sm transition flex items-center gap-2">
                    <i class="fas fa-envelope text-indigo-400"></i>
                    <span>Email Me</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-slate-900 py-8 bg-slate-950 text-slate-500 text-xs text-center">
        <div class="max-w-6xl mx-auto px-6">
            <p>© 2026 Say Panha. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
