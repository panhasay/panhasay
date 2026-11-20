<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prompt Vault — Say Panha (Panya)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: 'class'
            , theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif']
                        , mono: ['JetBrains Mono', 'ui-monospace', 'SFMono-Regular', 'monospace']
                    , }
                    , colors: {
                        brand: {
                            50: '#eef2ff'
                            , 100: '#e0e7ff'
                            , 400: '#818cf8'
                            , 500: '#6366f1'
                            , 600: '#4f46e5'
                            , 700: '#4338ca'
                        , }
                    , }
                , }
            , }
        , };

    </script>
    <style>
        /* Custom subtle scrollbars for code blocks and lists */
        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(148, 163, 184, 0.35);
            border-radius: 9999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(148, 163, 184, 0.55);
        }

        .prompt-pre {
            white-space: pre-wrap;
            word-break: break-word;
        }

    </style>
</head>
<body class="min-h-screen bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100 antialiased transition-colors duration-200">
    <!-- Top Navigation Bar -->
    <header class="sticky top-0 z-30 border-b border-slate-200/80 dark:border-slate-800/80 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-3">
            <!-- Brand & Owner -->
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-500 to-violet-600 flex items-center justify-center text-white shadow-sm shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="flex items-center gap-2">
                        <h1 class="text-base sm:text-lg font-bold tracking-tight truncate">Prompt Vault</h1>
                        <span class="hidden sm:inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-brand-50 text-brand-700 dark:bg-brand-500/15 dark:text-brand-300 border border-brand-200/70 dark:border-brand-500/30">
                            Say Panha (Panya)
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 truncate">
                        Laravel 12 · Nuxt 3 + Nuxt UI · Claude Code · Gemini · Ollama
                    </p>
                </div>
            </div>

            <!-- Header Actions -->
            <div class="flex items-center gap-2 shrink-0">
                <!-- Export JSON -->
                <button id="exportBtn" type="button" title="Export prompts as JSON backup" class="hidden md:inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-medium border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/80 text-slate-700 dark:text-slate-200 transition cursor-pointer">
                    <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Export JSON
                </button>

                <!-- Import JSON -->
                <label title="Import prompts from JSON backup" class="hidden md:inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-medium border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700/80 text-slate-700 dark:text-slate-200 transition cursor-pointer">
                    <svg class="w-4 h-4 text-slate-500 dark:text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Import JSON
                    <input id="importInput" type="file" accept="application/json,.json" class="hidden" />
                </label>

                <!-- Theme Toggle -->
                <button id="themeToggleBtn" type="button" aria-label="Toggle Light/Dark Mode" title="Toggle Light/Dark Mode" class="p-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 transition cursor-pointer">
                    <!-- Sun Icon (shown in dark mode) -->
                    <svg id="sunIcon" class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <!-- Moon Icon (shown in light mode) -->
                    <svg id="moonIcon" class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- New Prompt CTA -->
                <button id="openNewPromptBtn" type="button" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs sm:text-sm font-semibold bg-brand-600 hover:bg-brand-700 text-white shadow-sm shadow-brand-600/25 transition cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    <span>New Prompt</span>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">
        <!-- Stats & Mobile Backup Bar -->
        <section class="grid grid-cols-2 sm:grid-cols-4 gap-3">
            <div class="rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-4">
                <p class="text-xs font-medium text-slate-500 dark:text-slate-400">Total Saved</p>
                <p id="statTotal" class="mt-1 text-2xl font-bold text-slate-900 dark:text-white">0</p>
            </div>
            <div class="rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-4">
                <p class="text-xs font-medium text-slate-500 dark:text-slate-400">Reusable Templates</p>
                <p id="statReusable" class="mt-1 text-2xl font-bold text-emerald-600 dark:text-emerald-400">0</p>
            </div>
            <div class="rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-4">
                <p class="text-xs font-medium text-slate-500 dark:text-slate-400">Filtered Results</p>
                <p id="statFiltered" class="mt-1 text-2xl font-bold text-brand-600 dark:text-brand-400">0</p>
            </div>
            <div class="rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-4 flex flex-col justify-between">
                <p class="text-xs font-medium text-slate-500 dark:text-slate-400">Backup & Restore</p>
                <div class="mt-2 flex items-center gap-2">
                    <button id="mobileExportBtn" type="button" class="flex-1 px-2.5 py-1.5 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 transition cursor-pointer">
                        Export
                    </button>
                    <label class="flex-1 text-center px-2.5 py-1.5 rounded-lg text-xs font-medium bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 transition cursor-pointer">
                        Import
                        <input id="mobileImportInput" type="file" accept="application/json,.json" class="hidden" />
                    </label>
                </div>
            </div>
        </section>

        <!-- Search & Filter Controls -->
        <section class="rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-4 space-y-4">
            <div class="flex flex-col lg:flex-row gap-3">
                <!-- Search Input -->
                <div class="relative flex-1">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                    </svg>
                    <input id="searchInput" type="text" placeholder="Search title, prompt text, project (khmer-tts, Nuxt 3 App...), or notes..." class="w-full pl-10 pr-9 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500/40 focus:border-brand-500 transition" />
                    <button id="clearSearchBtn" type="button" title="Clear search" class="hidden absolute right-2.5 top-1/2 -translate-y-1/2 p-1 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Dropdowns & Reusable Toggle -->
                <div class="flex flex-wrap sm:flex-nowrap items-center gap-2.5">
                    <select id="projectFilter" aria-label="Filter by Project" class="px-3 py-2.5 rounded-xl text-xs sm:text-sm bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500/40 cursor-pointer">
                        <option value="ALL">All Projects</option>
                    </select>

                    <select id="categoryFilter" aria-label="Filter by Category" class="px-3 py-2.5 rounded-xl text-xs sm:text-sm bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500/40 cursor-pointer">
                        <option value="ALL">All Categories</option>
                        <option value="Backend">Backend</option>
                        <option value="Frontend">Frontend</option>
                        <option value="Database">Database</option>
                        <option value="UI/Auth">UI/Auth</option>
                        <option value="Slash Command">Slash Command</option>
                        <option value="Debugging">Debugging</option>
                    </select>

                    <button id="reusableOnlyBtn" type="button" aria-pressed="false" class="inline-flex items-center gap-1.5 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-medium border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition cursor-pointer shrink-0">
                        <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        Reusable Only
                    </button>

                    <button id="resetFiltersBtn" type="button" class="px-3 py-2.5 rounded-xl text-xs font-medium text-slate-500 hover:text-slate-800 dark:hover:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition cursor-pointer shrink-0">
                        Reset
                    </button>
                </div>
            </div>

            <!-- Tool Filter Pills -->
            <div class="flex items-center gap-2 overflow-x-auto pb-1" id="toolPillsContainer" role="group" aria-label="Filter by AI Tool">
                <!-- Populated by JS -->
            </div>
        </section>

        <!-- Prompts Grid -->
        <section id="promptsGrid" class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <!-- Rendered dynamically via JS -->
        </section>

        <!-- Empty State -->
        <div id="emptyState" class="hidden rounded-2xl border border-dashed border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-900 p-12 text-center space-y-3">
            <div class="mx-auto w-12 h-12 rounded-2xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <h3 class="text-base font-semibold">No matching prompts found</h3>
            <p class="text-sm text-slate-500 dark:text-slate-400 max-w-md mx-auto">
                Try adjusting your search keywords or filters, or create a new prompt with a quick-insert template.
            </p>
            <div class="pt-2 flex items-center justify-center gap-2">
                <button id="emptyResetBtn" type="button" class="px-4 py-2 rounded-xl text-xs font-semibold border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800 transition cursor-pointer">
                    Clear Filters
                </button>
                <button id="emptyRestoreDefaultsBtn" type="button" class="px-4 py-2 rounded-xl text-xs font-semibold bg-brand-600 hover:bg-brand-700 text-white transition cursor-pointer">
                    Restore Starter Prompts
                </button>
            </div>
        </div>
    </main>

    <!-- Create / Edit Prompt Modal -->
    <div id="promptModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-950/65 backdrop-blur-xs overflow-y-auto" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="w-full max-w-2xl rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-2xl overflow-hidden my-auto">
            <!-- Modal Header -->
            <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between">
                <div>
                    <h2 id="modalTitle" class="text-lg font-bold">New Prompt</h2>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Save prompts or insert a starter blueprint below</p>
                </div>
                <button id="closeModalBtn" type="button" aria-label="Close modal" class="p-2 rounded-xl text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800 transition cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Quick-Insert Starter Templates Bar -->
            <div class="px-6 py-3 bg-slate-50 dark:bg-slate-950/70 border-b border-slate-200 dark:border-slate-800 flex flex-wrap items-center gap-2">
                <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 mr-1">Quick-insert template:</span>
                <button type="button" data-starter="scaffolding" class="starter-btn px-2.5 py-1 rounded-lg text-xs font-medium bg-brand-50 dark:bg-brand-500/15 text-brand-700 dark:text-brand-300 border border-brand-200/80 dark:border-brand-500/30 hover:bg-brand-100 dark:hover:bg-brand-500/25 transition cursor-pointer">
                    + New Feature Scaffolding
                </button>
                <button type="button" data-starter="debugging" class="starter-btn px-2.5 py-1 rounded-lg text-xs font-medium bg-amber-50 dark:bg-amber-500/15 text-amber-700 dark:text-amber-300 border border-amber-200/80 dark:border-amber-500/30 hover:bg-amber-100 dark:hover:bg-amber-500/25 transition cursor-pointer">
                    + Bug Debugging
                </button>
                <button type="button" data-starter="slash_command" class="starter-btn px-2.5 py-1 rounded-lg text-xs font-medium bg-emerald-50 dark:bg-emerald-500/15 text-emerald-700 dark:text-emerald-300 border border-emerald-200/80 dark:border-emerald-500/30 hover:bg-emerald-100 dark:hover:bg-emerald-500/25 transition cursor-pointer">
                    + Claude Code Slash Command
                </button>
            </div>

            <!-- Modal Form -->
            <form id="promptForm" class="p-6 space-y-4 max-h-[75vh] overflow-y-auto">
                <input type="hidden" id="editingId" />

                <!-- Title -->
                <div>
                    <label for="promptTitle" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-1.5">
                        Title *
                    </label>
                    <input id="promptTitle" type="text" required placeholder="e.g., Laravel 12 RBAC Migration & HasRolesAndPermissions Trait" class="w-full px-3.5 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500/40 focus:border-brand-500" />
                </div>

                <!-- Project, Tool, Category -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                    <div>
                        <label for="promptProject" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-1.5">
                            Project / Workspace
                        </label>
                        <input id="promptProject" type="text" list="projectSuggestions" placeholder="khmer-tts" class="w-full px-3.5 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500/40 focus:border-brand-500" />
                        <datalist id="projectSuggestions">
                            <option value="khmer-tts"></option>
                            <option value="Nuxt 3 App"></option>
                            <option value="Portfolio"></option>
                            <option value="General"></option>
                        </datalist>
                    </div>

                    <div>
                        <label for="promptTool" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-1.5">
                            Tool / Model
                        </label>
                        <select id="promptTool" class="w-full px-3.5 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500/40 focus:border-brand-500">
                            <option value="Gemini">Gemini</option>
                            <option value="Claude Code">Claude Code</option>
                            <option value="Ollama">Ollama</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="promptCategory" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-1.5">
                            Category
                        </label>
                        <select id="promptCategory" class="w-full px-3.5 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500/40 focus:border-brand-500">
                            <option value="Backend">Backend</option>
                            <option value="Frontend">Frontend</option>
                            <option value="Database">Database</option>
                            <option value="UI/Auth">UI/Auth</option>
                            <option value="Slash Command">Slash Command</option>
                            <option value="Debugging">Debugging</option>
                        </select>
                    </div>
                </div>

                <!-- Prompt Text -->
                <div>
                    <label for="promptBody" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-1.5">
                        Prompt Text *
                    </label>
                    <textarea id="promptBody" rows="8" required placeholder="Write or paste your AI prompt here..." class="w-full px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-mono bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500/40 focus:border-brand-500"></textarea>
                </div>

                <!-- Notes / Gotchas -->
                <div>
                    <label for="promptNotes" class="block text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-1.5">
                        Notes / Gotchas
                    </label>
                    <input id="promptNotes" type="text" placeholder="e.g., Cap indexed utf8mb4 columns at 125 chars to avoid MySQL 1071; run composer dump-autoload" class="w-full px-3.5 py-2.5 rounded-xl text-sm bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-500/40 focus:border-brand-500" />
                </div>

                <!-- Reusable Toggle -->
                <div class="flex items-center justify-between pt-1">
                    <label class="inline-flex items-center gap-2.5 cursor-pointer select-none">
                        <input id="promptReusable" type="checkbox" class="w-4 h-4 rounded border-slate-300 dark:border-slate-700 text-brand-600 focus:ring-brand-500" />
                        <span class="text-sm font-medium">Mark as Reusable Template</span>
                    </label>

                    <div class="flex items-center gap-2.5">
                        <button id="cancelModalBtn" type="button" class="px-4 py-2 rounded-xl text-sm font-medium border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800 transition cursor-pointer">
                            Cancel
                        </button>
                        <button type="submit" class="px-5 py-2 rounded-xl text-sm font-semibold bg-brand-600 hover:bg-brand-700 text-white shadow-sm transition cursor-pointer">
                            Save Prompt
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal (No browser confirm()) -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-slate-950/65 backdrop-blur-xs" role="dialog" aria-modal="true">
        <div class="w-full max-w-md rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-2xl p-6 space-y-4">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-xl bg-rose-500/15 text-rose-600 dark:text-rose-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-bold">Delete this prompt?</h3>
                    <p id="deletePromptName" class="text-xs text-slate-500 dark:text-slate-400 mt-1 break-words"></p>
                </div>
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button id="cancelDeleteBtn" type="button" class="px-4 py-2 rounded-xl text-xs font-semibold border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800 transition cursor-pointer">
                    Cancel
                </button>
                <button id="confirmDeleteBtn" type="button" class="px-4 py-2 rounded-xl text-xs font-semibold bg-rose-600 hover:bg-rose-700 text-white transition cursor-pointer">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-5 right-5 z-50 pointer-events-none opacity-0 translate-y-2 transition-all duration-200 max-w-sm" role="status" aria-live="polite">
        <div class="flex items-center gap-2.5 px-4 py-3 rounded-xl bg-slate-900 dark:bg-slate-100 text-white dark:text-slate-900 shadow-lg text-xs sm:text-sm font-medium">
            <span id="toastDot" class="w-2 h-2 rounded-full bg-emerald-400 shrink-0"></span>
            <span id="toastMessage">Saved!</span>
        </div>
    </div>

    <script>
        (function() {
            'use strict';

            const STORAGE_KEY = 'prompt_vault_panya_v1';
            const THEME_KEY = 'prompt_vault_theme_v1';
            const TOOLS = ['All', 'Gemini', 'Claude Code', 'Ollama', 'Other'];

            // Quick-insert starter templates inside modal
            const STARTER_TEMPLATES = {
                scaffolding: {
                    title: 'Laravel 12 + Nuxt 3 Feature Scaffolding'
                    , category: 'Backend'
                    , reusable: true
                    , notes: 'Keep MySQL indexed varchar columns <= 125 chars if composite unique keys are used.'
                    , prompt: `Act as a Senior Full-Stack Engineer specializing in Laravel 12, Nuxt 3, and Nuxt UI.

Feature: [Feature Name]
Project: [khmer-tts / Nuxt 3 App]

Please provide:
1. Laravel 12 migration with proper indexes and foreign keys.
2. Eloquent model with relationships, casts, and fillable attributes.
3. API controller + FormRequest validation + clean JSON response.
4. Nuxt 3 page/component using Nuxt UI and TypeScript.`
                }
                , debugging: {
                    title: 'Laravel / Nuxt Stack Trace Debugger'
                    , category: 'Debugging'
                    , reusable: true
                    , notes: 'Always paste exact error class, SQL/stack trace, and file path.'
                    , prompt: `Debug this error step-by-step:

Environment: Laravel 12 / Nuxt 3 / MySQL / Nuxt UI
Error / Stack Trace:
[Paste exact error here]

Relevant File & Code:
[Paste code snippet here]

Explain:
1. Exact root cause.
2. Why it happens in this stack.
3. Exact code fix and verification command.`
                }
                , slash_command: {
                    title: 'Claude Code Custom Slash Command Blueprint'
                    , category: 'Slash Command'
                    , reusable: true
                    , notes: 'Save under .claude/commands/ in your project repository.'
                    , prompt: `Create a Claude Code slash command markdown file for: /[command-name]

Purpose: [What this command automates]

Include instructions for:
1. Inspecting existing project conventions and files first.
2. Generating clean, idiomatic code (PHP / TypeScript / Vue).
3. Listing files created or modified and quick verification steps.`
                }
            };

            // Pre-populated starter prompts tailored to Say Panha's workflow
            const DEFAULT_PROMPTS = [{
                    id: 'seed-rbac-laravel'
                    , title: 'Laravel 12 RBAC Migrations & HasRolesAndPermissions Trait'
                    , project: 'khmer-tts'
                    , tool: 'Gemini'
                    , category: 'Database'
                    , reusable: true
                    , notes: 'Cap name & guard_name at 125 chars on composite unique indexes to avoid MySQL 1071; place HasRolesAndPermissions in app/Models with namespace App\\Models and run composer dump-autoload.'
                    , prompt: `Create Laravel 12 migrations for roles, permissions, model_has_roles, model_has_permissions, and role_has_permissions, plus a HasRolesAndPermissions trait in app/Models/HasRolesAndPermissions.php with roles(), permissions(), syncRoles(), and hasRole(). Ensure composite unique keys on (name, guard_name) stay within MySQL's 1000-byte index limit.`
                    , updatedAt: '2026-11-20T09:15:00.000Z'
                }
                , {
                    id: 'seed-nuxt-telegram-login'
                    , title: 'Nuxt 3 + Nuxt UI Login with Telegram Button & Toast Alert'
                    , project: 'Nuxt 3 App'
                    , tool: 'Gemini'
                    , category: 'UI/Auth'
                    , reusable: true
                    , notes: 'Use type="button" on the Telegram button so it does not trigger main form @submit; use useToast() instead of browser alert().'
                    , prompt: `Update a Nuxt 3 + Nuxt UI login form to add a divider and a "Login with Telegram" UButton below the Remember & Forgot Password row, with loading state and a Nuxt UI useToast() notification instead of alert(). Support Khmer and English labels cleanly.`
                    , updatedAt: '2026-11-20T09:40:00.000Z'
                }
                , {
                    id: 'seed-claude-slash-cmd'
                    , title: 'Claude Code Slash Command: Scaffold API Resource & Tests'
                    , project: 'General'
                    , tool: 'Claude Code'
                    , category: 'Slash Command'
                    , reusable: true
                    , notes: 'Great for repetitive CRUD modules across Laravel backends.'
                    , prompt: `Write a Claude Code custom slash command /make-resource that takes a singular model name (e.g., Post), inspects existing models/controllers/routes for naming conventions, generates a migration, model, controller, and feature test, and summarizes all created files.`
                    , updatedAt: '2026-11-20T10:05:00.000Z'
                }
                , {
                    id: 'seed-debug-unknown-column'
                    , title: 'Debug SQLSTATE[42S22] Unknown Column on Polymorphic Pivot'
                    , project: 'khmer-tts'
                    , tool: 'Gemini'
                    , category: 'Debugging'
                    , reusable: false
                    , notes: 'Check Schema::getColumnListing() on the pivot table; either migrate:fresh --seed in dev or add missing morph columns in a new migration.'
                    , prompt: `I am getting SQLSTATE[42S22]: Column not found: 1054 Unknown column 'model_has_roles.model_id' when seeding roles to User via morphToMany. Give me the exact steps to inspect the current table columns and fix the schema safely.`
                    , updatedAt: '2026-11-20T10:25:00.000Z'
                }
                , {
                    id: 'seed-ollama-code-review'
                    , title: 'Local Code Review Prompt for Ollama (Fast Diff Check)'
                    , project: 'Portfolio'
                    , tool: 'Ollama'
                    , category: 'Frontend'
                    , reusable: true
                    , notes: 'Keep diffs focused so local models stay fast and accurate.'
                    , prompt: `Review this Vue/Nuxt or PHP diff for bugs, edge cases, missing null/error handling, and readability. Keep feedback concise and actionable, and provide corrected code snippets where needed:\n\n[Paste diff here]`
                    , updatedAt: '2026-11-20T10:35:00.000Z'
                }
            ];

            // Application state
            let state = {
                prompts: []
                , search: ''
                , tool: 'All'
                , project: 'ALL'
                , category: 'ALL'
                , reusableOnly: false
                , pendingDeleteId: null
            , };

            // DOM References
            const els = {
                promptsGrid: document.getElementById('promptsGrid')
                , emptyState: document.getElementById('emptyState')
                , statTotal: document.getElementById('statTotal')
                , statReusable: document.getElementById('statReusable')
                , statFiltered: document.getElementById('statFiltered')
                , searchInput: document.getElementById('searchInput')
                , clearSearchBtn: document.getElementById('clearSearchBtn')
                , projectFilter: document.getElementById('projectFilter')
                , categoryFilter: document.getElementById('categoryFilter')
                , reusableOnlyBtn: document.getElementById('reusableOnlyBtn')
                , resetFiltersBtn: document.getElementById('resetFiltersBtn')
                , emptyResetBtn: document.getElementById('emptyResetBtn')
                , emptyRestoreDefaultsBtn: document.getElementById('emptyRestoreDefaultsBtn')
                , toolPillsContainer: document.getElementById('toolPillsContainer')
                , promptModal: document.getElementById('promptModal')
                , modalTitle: document.getElementById('modalTitle')
                , openNewPromptBtn: document.getElementById('openNewPromptBtn')
                , closeModalBtn: document.getElementById('closeModalBtn')
                , cancelModalBtn: document.getElementById('cancelModalBtn')
                , promptForm: document.getElementById('promptForm')
                , editingId: document.getElementById('editingId')
                , promptTitle: document.getElementById('promptTitle')
                , promptProject: document.getElementById('promptProject')
                , promptTool: document.getElementById('promptTool')
                , promptCategory: document.getElementById('promptCategory')
                , promptBody: document.getElementById('promptBody')
                , promptNotes: document.getElementById('promptNotes')
                , promptReusable: document.getElementById('promptReusable')
                , deleteModal: document.getElementById('deleteModal')
                , deletePromptName: document.getElementById('deletePromptName')
                , cancelDeleteBtn: document.getElementById('cancelDeleteBtn')
                , confirmDeleteBtn: document.getElementById('confirmDeleteBtn')
                , exportBtn: document.getElementById('exportBtn')
                , mobileExportBtn: document.getElementById('mobileExportBtn')
                , importInput: document.getElementById('importInput')
                , mobileImportInput: document.getElementById('mobileImportInput')
                , themeToggleBtn: document.getElementById('themeToggleBtn')
                , toast: document.getElementById('toast')
                , toastMessage: document.getElementById('toastMessage')
                , toastDot: document.getElementById('toastDot')
            , };

            let toastTimer = null;

            function showToast(message, type = 'success') {
                els.toastMessage.textContent = message;
                els.toastDot.className = `w-2 h-2 rounded-full shrink-0 ${
          type === 'error' ? 'bg-rose-400' : type === 'info' ? 'bg-sky-400' : 'bg-emerald-400'
        }`;
                els.toast.classList.remove('opacity-0', 'translate-y-2');
                els.toast.classList.add('opacity-100', 'translate-y-0');

                clearTimeout(toastTimer);
                toastTimer = setTimeout(() => {
                    els.toast.classList.remove('opacity-100', 'translate-y-0');
                    els.toast.classList.add('opacity-0', 'translate-y-2');
                }, 2600);
            }

            function escapeHtml(str) {
                return String(str ? ? '')
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#39;');
            }

            function loadTheme() {
                try {
                    const saved = localStorage.getItem(THEME_KEY);
                    if (saved === 'light') {
                        document.documentElement.classList.remove('dark');
                    } else {
                        document.documentElement.classList.add('dark');
                    }
                } catch (_) {
                    document.documentElement.classList.add('dark');
                }
            }

            function toggleTheme() {
                const isDark = document.documentElement.classList.toggle('dark');
                try {
                    localStorage.setItem(THEME_KEY, isDark ? 'dark' : 'light');
                } catch (_) {}
                showToast(isDark ? 'Dark mode enabled' : 'Light mode enabled', 'info');
            }

            function loadPrompts() {
                try {
                    const raw = localStorage.getItem(STORAGE_KEY);
                    if (!raw) {
                        state.prompts = [...DEFAULT_PROMPTS];
                        savePrompts();
                        return;
                    }
                    const parsed = JSON.parse(raw);
                    if (Array.isArray(parsed)) {
                        state.prompts = parsed;
                    } else {
                        state.prompts = [...DEFAULT_PROMPTS];
                    }
                } catch (err) {
                    console.error('Failed to load prompts from localStorage:', err);
                    state.prompts = [...DEFAULT_PROMPTS];
                    showToast('Recovered starter prompts after storage read error', 'info');
                }
            }

            function savePrompts() {
                try {
                    localStorage.setItem(STORAGE_KEY, JSON.stringify(state.prompts));
                } catch (err) {
                    console.error('Failed to save prompts to localStorage:', err);
                    showToast('Could not save to browser storage', 'error');
                }
            }

            function getFilteredPrompts() {
                const q = state.search.trim().toLowerCase();
                return state.prompts
                    .filter((item) => {
                        if (state.tool !== 'All' && item.tool !== state.tool) return false;
                        if (state.project !== 'ALL' && item.project !== state.project) return false;
                        if (state.category !== 'ALL' && item.category !== state.category) return false;
                        if (state.reusableOnly && !item.reusable) return false;

                        if (q) {
                            const haystack = [
                                    item.title
                                    , item.project
                                    , item.tool
                                    , item.category
                                    , item.prompt
                                    , item.notes || ''
                                , ]
                                .join(' ')
                                .toLowerCase();
                            if (!haystack.includes(q)) return false;
                        }
                        return true;
                    })
                    .sort((a, b) => new Date(b.updatedAt || 0) - new Date(a.updatedAt || 0));
            }

            function renderProjectDropdown() {
                const currentValue = state.project;
                const projects = Array.from(
                    new Set(
                        state.prompts
                        .map((p) => (p.project || '').trim())
                        .filter(Boolean)
                    )
                ).sort((a, b) => a.localeCompare(b));

                els.projectFilter.innerHTML =
                    '<option value="ALL">All Projects</option>' +
                    projects
                    .map((proj) => `<option value="${escapeHtml(proj)}">${escapeHtml(proj)}</option>`)
                    .join('');

                if (currentValue !== 'ALL' && projects.includes(currentValue)) {
                    els.projectFilter.value = currentValue;
                } else {
                    state.project = 'ALL';
                    els.projectFilter.value = 'ALL';
                }
            }

            function renderToolPills() {
                els.toolPillsContainer.innerHTML = TOOLS.map((tool) => {
                    const active = state.tool === tool;
                    const count =
                        tool === 'All' ?
                        state.prompts.length :
                        state.prompts.filter((p) => p.tool === tool).length;

                    return `
            <button
              type="button"
              data-tool="${escapeHtml(tool)}"
              class="tool-pill inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold transition cursor-pointer shrink-0 ${
                active
                  ? 'bg-brand-600 text-white shadow-xs'
                  : 'bg-slate-100 dark:bg-slate-800/90 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700'
              }"
            >
              <span>${escapeHtml(tool)}</span>
              <span class="px-1.5 py-0.2 rounded-full text-[11px] ${
                active
                  ? 'bg-white/20 text-white'
                  : 'bg-white dark:bg-slate-900 text-slate-500 dark:text-slate-400'
              }">${count}</span>
            </button>
          `;
                }).join('');
            }

            function getToolBadgeClasses(tool) {
                switch (tool) {
                    case 'Claude Code':
                        return 'bg-orange-500/10 text-orange-700 dark:text-orange-300 border-orange-500/25';
                    case 'Gemini':
                        return 'bg-sky-500/10 text-sky-700 dark:text-sky-300 border-sky-500/25';
                    case 'Ollama':
                        return 'bg-violet-500/10 text-violet-700 dark:text-violet-300 border-violet-500/25';
                    default:
                        return 'bg-slate-500/10 text-slate-700 dark:text-slate-300 border-slate-500/25';
                }
            }

            function formatDate(iso) {
                if (!iso) return '';
                const d = new Date(iso);
                if (Number.isNaN(d.getTime())) return '';
                return d.toLocaleDateString(undefined, {
                    month: 'short'
                    , day: 'numeric'
                    , year: 'numeric'
                });
            }

            function render() {
                renderProjectDropdown();
                renderToolPills();

                const filtered = getFilteredPrompts();
                const reusableCount = state.prompts.filter((p) => p.reusable).length;

                els.statTotal.textContent = String(state.prompts.length);
                els.statReusable.textContent = String(reusableCount);
                els.statFiltered.textContent = String(filtered.length);

                els.clearSearchBtn.classList.toggle('hidden', !state.search.trim());

                els.reusableOnlyBtn.setAttribute('aria-pressed', String(state.reusableOnly));
                if (state.reusableOnly) {
                    els.reusableOnlyBtn.className =
                        'inline-flex items-center gap-1.5 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-semibold border border-amber-400/60 bg-amber-50 dark:bg-amber-500/15 text-amber-800 dark:text-amber-300 transition cursor-pointer shrink-0';
                } else {
                    els.reusableOnlyBtn.className =
                        'inline-flex items-center gap-1.5 px-3.5 py-2.5 rounded-xl text-xs sm:text-sm font-medium border border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition cursor-pointer shrink-0';
                }

                if (filtered.length === 0) {
                    els.promptsGrid.innerHTML = '';
                    els.emptyState.classList.remove('hidden');
                    return;
                }

                els.emptyState.classList.add('hidden');
                els.promptsGrid.innerHTML = filtered
                    .map((item) => {
                        const reusableBadge = item.reusable ?
                            `<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-500/10 text-emerald-700 dark:text-emerald-300 border border-emerald-500/25">
                   <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                   Reusable
                 </span>` :
                            '';

                        const notesBlock = item.notes ?
                            `<div class="mt-3 px-3 py-2 rounded-xl bg-amber-50/80 dark:bg-amber-500/10 border border-amber-200/70 dark:border-amber-500/20 text-xs text-amber-900 dark:text-amber-200">
                   <span class="font-semibold">Notes:</span> ${escapeHtml(item.notes)}
                 </div>` :
                            '';

                        return `
              <article data-id="${escapeHtml(item.id)}" class="group rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 hover:border-brand-400/60 dark:hover:border-brand-500/50 p-5 flex flex-col justify-between transition shadow-2xs">
                <div>
                  <!-- Top Meta Row -->
                  <div class="flex flex-wrap items-center justify-between gap-2 mb-2.5">
                    <div class="flex flex-wrap items-center gap-1.5">
                      <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold border ${getToolBadgeClasses(item.tool)}">
                        ${escapeHtml(item.tool || 'Other')}
                      </span>
                      <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300">
                        ${escapeHtml(item.category || 'Backend')}
                      </span>
                      ${
                        item.project
                          ? `<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-brand-50 dark:bg-brand-500/15 text-brand-700 dark:text-brand-300">
                               ${escapeHtml(item.project)}
                             </span>`
                          : ''
                      }
                      ${reusableBadge}
                    </div>
                    <span class="text-[11px] text-slate-400">${escapeHtml(formatDate(item.updatedAt))}</span>
                  </div>

                  <!-- Title -->
                  <h2 class="text-base font-bold text-slate-900 dark:text-white leading-snug">
                    ${escapeHtml(item.title)}
                  </h2>

                  <!-- Prompt Body -->
                  <pre class="prompt-pre mt-3 p-3.5 rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-200/80 dark:border-slate-800/90 font-mono text-xs text-slate-700 dark:text-slate-300 max-h-52 overflow-y-auto">${escapeHtml(item.prompt)}</pre>

                  ${notesBlock}
                </div>

                <!-- Card Footer Actions -->
                <div class="mt-4 pt-3.5 border-t border-slate-100 dark:border-slate-800/80 flex items-center justify-between gap-2">
                  <button
                    type="button"
                    data-action="copy"
                    data-id="${escapeHtml(item.id)}"
                    class="copy-btn inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-semibold bg-brand-600 hover:bg-brand-700 text-white transition cursor-pointer"
                  >
                    <svg class="w-3.5 h-3.5 copy-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    <span class="copy-label">Copy Prompt</span>
                  </button>

                  <div class="flex items-center gap-1.5">
                    <button
                      type="button"
                      data-action="edit"
                      data-id="${escapeHtml(item.id)}"
                      class="inline-flex items-center gap-1 px-3 py-2 rounded-xl text-xs font-medium border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800 text-slate-700 dark:text-slate-200 transition cursor-pointer"
                    >
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                      Edit
                    </button>
                    <button
                      type="button"
                      data-action="delete"
                      data-id="${escapeHtml(item.id)}"
                      aria-label="Delete prompt"
                      class="inline-flex items-center px-2.5 py-2 rounded-xl text-xs font-medium border border-slate-200 dark:border-slate-700 hover:border-rose-300 dark:hover:border-rose-500/40 hover:bg-rose-50 dark:hover:bg-rose-500/10 text-rose-600 dark:text-rose-400 transition cursor-pointer"
                    >
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </button>
                  </div>
                </div>
              </article>
            `;
                    })
                    .join('');
            }

            // Copy helper with execCommand fallback for sandboxed/iframe contexts
            async function copyText(text) {
                if (!text) return false;
                if (navigator.clipboard && typeof navigator.clipboard.writeText === 'function') {
                    try {
                        await navigator.clipboard.writeText(text);
                        return true;
                    } catch (_) {
                        // Fallback below
                    }
                }
                try {
                    const ta = document.createElement('textarea');
                    ta.value = text;
                    ta.setAttribute('readonly', '');
                    ta.style.position = 'fixed';
                    ta.style.opacity = '0';
                    document.body.appendChild(ta);
                    ta.select();
                    const ok = document.execCommand('copy');
                    document.body.removeChild(ta);
                    return ok;
                } catch (_) {
                    return false;
                }
            }

            function openModal(promptItem = null) {
                els.promptForm.reset();
                if (promptItem) {
                    els.modalTitle.textContent = 'Edit Prompt';
                    els.editingId.value = promptItem.id;
                    els.promptTitle.value = promptItem.title || '';
                    els.promptProject.value = promptItem.project || 'General';
                    els.promptTool.value = promptItem.tool || 'Gemini';
                    els.promptCategory.value = promptItem.category || 'Backend';
                    els.promptBody.value = promptItem.prompt || '';
                    els.promptNotes.value = promptItem.notes || '';
                    els.promptReusable.checked = Boolean(promptItem.reusable);
                } else {
                    els.modalTitle.textContent = 'New Prompt';
                    els.editingId.value = '';
                    els.promptProject.value = state.project !== 'ALL' ? state.project : 'khmer-tts';
                    els.promptTool.value = state.tool !== 'All' ? state.tool : 'Gemini';
                    els.promptCategory.value = state.category !== 'ALL' ? state.category : 'Backend';
                    els.promptReusable.checked = true;
                }

                els.promptModal.classList.remove('hidden');
                els.promptModal.classList.add('flex');
                setTimeout(() => els.promptTitle.focus(), 40);
            }

            function closeModal() {
                els.promptModal.classList.add('hidden');
                els.promptModal.classList.remove('flex');
            }

            function applyStarterTemplate(key) {
                const tpl = STARTER_TEMPLATES[key];
                if (!tpl) return;
                if (!els.promptTitle.value.trim()) {
                    els.promptTitle.value = tpl.title;
                }
                els.promptCategory.value = tpl.category;
                els.promptBody.value = tpl.prompt;
                if (!els.promptNotes.value.trim()) {
                    els.promptNotes.value = tpl.notes;
                }
                els.promptReusable.checked = tpl.reusable;
                showToast(`Inserted "${tpl.title}" template`, 'info');
            }

            function openDeleteModal(id) {
                const item = state.prompts.find((p) => p.id === id);
                if (!item) return;
                state.pendingDeleteId = id;
                els.deletePromptName.textContent = item.title;
                els.deleteModal.classList.remove('hidden');
                els.deleteModal.classList.add('flex');
            }

            function closeDeleteModal() {
                state.pendingDeleteId = null;
                els.deleteModal.classList.add('hidden');
                els.deleteModal.classList.remove('flex');
            }

            function exportJson() {
                try {
                    const payload = {
                        app: 'Prompt Vault'
                        , owner: 'Say Panha (Panya)'
                        , exportedAt: new Date().toISOString()
                        , prompts: state.prompts
                    , };
                    const blob = new Blob([JSON.stringify(payload, null, 2)], {
                        type: 'application/json'
                    });
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    const stamp = new Date().toISOString().slice(0, 10);
                    a.href = url;
                    a.download = `prompt-vault-backup-${stamp}.json`;
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    URL.revokeObjectURL(url);
                    showToast(`Exported ${state.prompts.length} prompts to JSON`);
                } catch (err) {
                    console.error('Export failed:', err);
                    showToast('Failed to export JSON', 'error');
                }
            }

            function handleImportFile(file) {
                if (!file) return;
                const reader = new FileReader();
                reader.onload = () => {
                    try {
                        const parsed = JSON.parse(String(reader.result || ''));
                        const incoming = Array.isArray(parsed) ? parsed : parsed ? .prompts;
                        if (!Array.isArray(incoming)) {
                            showToast('Invalid JSON format: expected an array or { prompts: [] }', 'error');
                            return;
                        }

                        const existingIds = new Set(state.prompts.map((p) => p.id));
                        let added = 0;
                        let updated = 0;

                        incoming.forEach((rawItem, idx) => {
                            if (!rawItem || typeof rawItem.prompt !== 'string' || !rawItem.prompt.trim()) return;
                            const cleanItem = {
                                id: typeof rawItem.id === 'string' && rawItem.id.trim() ?
                                    rawItem.id.trim() : `imported-${Date.now()}-${idx}`
                                , title: (rawItem.title || 'Untitled Prompt').trim()
                                , project: (rawItem.project || 'General').trim()
                                , tool: TOOLS.includes(rawItem.tool) && rawItem.tool !== 'All' ? rawItem.tool : 'Other'
                                , category: rawItem.category || 'Backend'
                                , reusable: Boolean(rawItem.reusable)
                                , notes: (rawItem.notes || '').trim()
                                , prompt: rawItem.prompt
                                , updatedAt: rawItem.updatedAt || new Date().toISOString()
                            , };

                            if (existingIds.has(cleanItem.id)) {
                                state.prompts = state.prompts.map((p) => (p.id === cleanItem.id ? cleanItem : p));
                                updated++;
                            } else {
                                state.prompts.unshift(cleanItem);
                                existingIds.add(cleanItem.id);
                                added++;
                            }
                        });

                        savePrompts();
                        render();
                        showToast(`Imported: ${added} added, ${updated} updated`);
                    } catch (err) {
                        console.error('Import JSON error:', err);
                        showToast('Could not parse JSON file', 'error');
                    }
                };
                reader.onerror = () => showToast('Error reading file', 'error');
                reader.readAsText(file);
            }

            function resetFilters() {
                state.search = '';
                state.tool = 'All';
                state.project = 'ALL';
                state.category = 'ALL';
                state.reusableOnly = false;
                els.searchInput.value = '';
                els.projectFilter.value = 'ALL';
                els.categoryFilter.value = 'ALL';
                render();
            }

            // Event Listeners
            els.themeToggleBtn.addEventListener('click', toggleTheme);

            els.searchInput.addEventListener('input', (e) => {
                state.search = e.target.value;
                render();
            });

            els.clearSearchBtn.addEventListener('click', () => {
                state.search = '';
                els.searchInput.value = '';
                els.searchInput.focus();
                render();
            });

            els.projectFilter.addEventListener('change', (e) => {
                state.project = e.target.value;
                render();
            });

            els.categoryFilter.addEventListener('change', (e) => {
                state.category = e.target.value;
                render();
            });

            els.reusableOnlyBtn.addEventListener('click', () => {
                state.reusableOnly = !state.reusableOnly;
                render();
            });

            els.toolPillsContainer.addEventListener('click', (e) => {
                const btn = e.target.closest('.tool-pill');
                if (!btn) return;
                state.tool = btn.dataset.tool || 'All';
                render();
            });

            els.resetFiltersBtn.addEventListener('click', resetFilters);
            els.emptyResetBtn.addEventListener('click', resetFilters);

            els.emptyRestoreDefaultsBtn.addEventListener('click', () => {
                const existingIds = new Set(state.prompts.map((p) => p.id));
                let restored = 0;
                DEFAULT_PROMPTS.forEach((def) => {
                    if (!existingIds.has(def.id)) {
                        state.prompts.unshift({
                            ...def
                            , updatedAt: new Date().toISOString()
                        });
                        restored++;
                    }
                });
                savePrompts();
                render();
                showToast(restored > 0 ? `Restored ${restored} starter prompts` : 'All starter prompts already present', 'info');
            });

            els.openNewPromptBtn.addEventListener('click', () => openModal(null));
            els.closeModalBtn.addEventListener('click', closeModal);
            els.cancelModalBtn.addEventListener('click', closeModal);

            els.promptModal.addEventListener('click', (e) => {
                if (e.target === els.promptModal) closeModal();
            });

            document.querySelectorAll('.starter-btn').forEach((btn) => {
                btn.addEventListener('click', () => applyStarterTemplate(btn.dataset.starter));
            });

            els.promptForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const title = els.promptTitle.value.trim();
                const promptText = els.promptBody.value;
                if (!title || !promptText.trim()) return;

                const id = els.editingId.value.trim();
                const entry = {
                    id: id || `prompt-${Date.now()}-${Math.random().toString(36).slice(2, 7)}`
                    , title
                    , project: els.promptProject.value.trim() || 'General'
                    , tool: els.promptTool.value || 'Other'
                    , category: els.promptCategory.value || 'Backend'
                    , prompt: promptText
                    , notes: els.promptNotes.value.trim()
                    , reusable: els.promptReusable.checked
                    , updatedAt: new Date().toISOString()
                , };

                if (id) {
                    state.prompts = state.prompts.map((p) => (p.id === id ? entry : p));
                    showToast('Prompt updated');
                } else {
                    state.prompts.unshift(entry);
                    showToast('New prompt saved');
                }

                savePrompts();
                closeModal();
                render();
            });

            // Card actions delegation (Copy, Edit, Delete)
            els.promptsGrid.addEventListener('click', async (e) => {
                const actionBtn = e.target.closest('button[data-action]');
                if (!actionBtn) return;

                const action = actionBtn.dataset.action;
                const id = actionBtn.dataset.id;
                const item = state.prompts.find((p) => p.id === id);
                if (!item) return;

                if (action === 'copy') {
                    const copied = await copyText(item.prompt);
                    if (copied) {
                        const label = actionBtn.querySelector('.copy-label');
                        const origText = label ? label.textContent : 'Copy Prompt';
                        if (label) label.textContent = 'Copied!';
                        actionBtn.classList.remove('bg-brand-600', 'hover:bg-brand-700');
                        actionBtn.classList.add('bg-emerald-600', 'hover:bg-emerald-700');
                        showToast(`Copied "${item.title}"`);
                        setTimeout(() => {
                            if (label) label.textContent = origText;
                            actionBtn.classList.remove('bg-emerald-600', 'hover:bg-emerald-700');
                            actionBtn.classList.add('bg-brand-600', 'hover:bg-brand-700');
                        }, 1500);
                    } else {
                        showToast('Unable to copy automatically', 'error');
                    }
                } else if (action === 'edit') {
                    openModal(item);
                } else if (action === 'delete') {
                    openDeleteModal(id);
                }
            });

            els.cancelDeleteBtn.addEventListener('click', closeDeleteModal);
            els.deleteModal.addEventListener('click', (e) => {
                if (e.target === els.deleteModal) closeDeleteModal();
            });

            els.confirmDeleteBtn.addEventListener('click', () => {
                if (!state.pendingDeleteId) return;
                state.prompts = state.prompts.filter((p) => p.id !== state.pendingDeleteId);
                savePrompts();
                closeDeleteModal();
                render();
                showToast('Prompt deleted', 'info');
            });

            els.exportBtn.addEventListener('click', exportJson);
            els.mobileExportBtn.addEventListener('click', exportJson);

            els.importInput.addEventListener('change', (e) => {
                handleImportFile(e.target.files ? . [0]);
                e.target.value = '';
            });

            els.mobileImportInput.addEventListener('change', (e) => {
                handleImportFile(e.target.files ? . [0]);
                e.target.value = '';
            });

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    closeModal();
                    closeDeleteModal();
                }
            });

            // Initialize app
            loadTheme();
            loadPrompts();
            render();
        })();

    </script>
</body>
</html>
