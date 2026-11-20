<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prompt Vault — Offline Prompt Notes</title>
    <style>
        :root {
            --bg: #0f172a;
            --panel: #1e293b;
            --panel-2: #0b1220;
            --text: #f8fafc;
            --muted: #94a3b8;
            --border: #334155;
            --accent: #38bdf8;
            --accent-text: #082f49;
            --success: #22c55e;
            --danger: #ef4444;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.5;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 24px 16px 64px;
        }

        header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border);
        }

        h1 {
            margin: 0;
            font-size: 1.45rem;
        }

        .sub {
            color: var(--muted);
            font-size: 0.88rem;
            margin-top: 2px;
        }

        .toolbar {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
            color: var(--text);
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 8px 12px;
        }

        button {
            cursor: pointer;
            font-weight: 600;
            transition: opacity 0.15s ease, transform 0.05s ease;
        }

        button:hover {
            opacity: 0.92;
        }

        button:active {
            transform: scale(0.99);
        }

        .btn-primary {
            background: var(--accent);
            color: var(--accent-text);
            border-color: var(--accent);
        }

        .btn-danger {
            background: transparent;
            color: #fca5a5;
            border-color: #7f1d1d;
        }

        .card {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 16px;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 12px;
            margin-bottom: 12px;
        }

        label {
            display: block;
            font-size: 0.82rem;
            color: var(--muted);
            margin-bottom: 4px;
        }

        textarea {
            width: 100%;
            min-height: 130px;
            resize: vertical;
            font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
            font-size: 0.9rem;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 16px;
        }

        .filters input {
            flex: 1 1 240px;
        }

        .prompt-list {
            display: grid;
            gap: 12px;
        }

        .prompt-item {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 16px;
        }

        .prompt-top {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
        }

        .prompt-title {
            font-size: 1.05rem;
            font-weight: 700;
            margin: 0;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-bottom: 10px;
        }

        .tag {
            font-size: 0.76rem;
            padding: 2px 8px;
            border-radius: 999px;
            background: var(--panel-2);
            border: 1px solid var(--border);
            color: var(--accent);
        }

        pre {
            margin: 0;
            padding: 12px;
            border-radius: 8px;
            background: var(--panel-2);
            border: 1px solid var(--border);
            overflow-x: auto;
            font-size: 0.88rem;
            white-space: pre-wrap;
            word-break: break-word;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
        }

        .toast {
            position: fixed;
            bottom: 18px;
            right: 18px;
            background: var(--success);
            color: #052e16;
            font-weight: 700;
            padding: 10px 14px;
            border-radius: 8px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease;
        }

        .toast.show {
            opacity: 1;
        }

        .hidden {
            display: none;
        }

    </style>
</head>
<body>
    <div class="container">
        <header>
            <div>
                <h1>Prompt Vault (100% Offline)</h1>
                <div class="sub">Saved locally in browser storage — works without internet</div>
            </div>
            <div class="toolbar">
                <button class="btn-primary" id="toggleFormBtn">+ New Prompt</button>
                <button id="exportBtn">Export JSON</button>
                <button id="importBtn">Import JSON</button>
                <input type="file" id="importFile" accept=".json" class="hidden" />
            </div>
        </header>

        <section class="card hidden" id="formCard">
            <h2 id="formTitle" style="margin-top:0;font-size:1.1rem;">Add Prompt Note</h2>
            <form id="promptForm">
                <input type="hidden" id="editId" />
                <div class="grid-2">
                    <div>
                        <label for="title">Title</label>
                        <input id="title" required placeholder="e.g., Laravel 12 RBAC Migration" />
                    </div>
                    <div>
                        <label for="tool">Tool / Model</label>
                        <input id="tool" placeholder="e.g., Gemini, Claude Code, Ollama" />
                    </div>
                    <div>
                        <label for="project">Project / Tag</label>
                        <input id="project" placeholder="e.g., khmer-tts, nuxt-app" />
                    </div>
                </div>
                <div style="margin-bottom:12px;">
                    <label for="content">Prompt / Template Text</label>
                    <textarea id="content" required placeholder="Write or paste your prompt template here..."></textarea>
                </div>
                <div class="actions">
                    <button type="submit" class="btn-primary">Save Prompt</button>
                    <button type="button" id="cancelBtn">Cancel</button>
                </div>
            </form>
        </section>

        <div class="filters">
            <input id="searchInput" type="search" placeholder="Search prompts by title, tool, project, or text..." />
            <select id="projectFilter">
                <option value="">All Projects</option>
            </select>
        </div>

        <div class="prompt-list" id="promptList"></div>
    </div>

    <div class="toast" id="toast">Copied!</div>

    <script>
        const STORAGE_KEY = 'panya_offline_prompt_notes_v1';

        const starterPrompts = [{
                id: crypto.randomUUID()
                , title: 'Laravel Migration & RBAC Helper'
                , tool: 'Gemini'
                , project: 'khmer-tts'
                , content: 'Create a Laravel migration for [table_name] with explicit column lengths (max 125 on indexed string columns to avoid MySQL 1071) and clean up()/down() methods.'
                , updatedAt: new Date().toISOString().slice(0, 10)
            }
            , {
                id: crypto.randomUUID()
                , title: 'Nuxt 3 + Nuxt UI Component Template'
                , tool: 'Claude Code'
                , project: 'nuxt-app'
                , content: 'Build a Nuxt 3 component using <script setup lang="ts"> and Nuxt UI components with loading state, error handling, and clean TypeScript types.'
                , updatedAt: new Date().toISOString().slice(0, 10)
            }
        ];

        let prompts = loadPrompts();

        const formCard = document.getElementById('formCard');
        const formTitle = document.getElementById('formTitle');
        const promptForm = document.getElementById('promptForm');
        const editIdEl = document.getElementById('editId');
        const titleEl = document.getElementById('title');
        const toolEl = document.getElementById('tool');
        const projectEl = document.getElementById('project');
        const contentEl = document.getElementById('content');
        const promptListEl = document.getElementById('promptList');
        const searchInput = document.getElementById('searchInput');
        const projectFilter = document.getElementById('projectFilter');
        const toastEl = document.getElementById('toast');

        function loadPrompts() {
            try {
                const raw = localStorage.getItem(STORAGE_KEY);
                if (!raw) {
                    localStorage.setItem(STORAGE_KEY, JSON.stringify(starterPrompts));
                    return [...starterPrompts];
                }
                return JSON.parse(raw);
            } catch {
                return [...starterPrompts];
            }
        }

        function savePrompts() {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(prompts));
        }

        function showToast(msg = 'Done!') {
            toastEl.textContent = msg;
            toastEl.classList.add('show');
            setTimeout(() => toastEl.classList.remove('show'), 1800);
        }

        function escapeHtml(str) {
            return String(str)
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;');
        }

        function renderProjectFilter() {
            const current = projectFilter.value;
            const projects = [...new Set(prompts.map(p => (p.project || '').trim()).filter(Boolean))].sort();
            projectFilter.innerHTML = '<option value="">All Projects</option>' +
                projects.map(p => `<option value="${escapeHtml(p)}">${escapeHtml(p)}</option>`).join('');
            if (projects.includes(current)) projectFilter.value = current;
        }

        function render() {
            renderProjectFilter();
            const q = searchInput.value.trim().toLowerCase();
            const proj = projectFilter.value;

            const filtered = prompts.filter(p => {
                const matchesProject = !proj || p.project === proj;
                const matchesQuery = !q || [p.title, p.tool, p.project, p.content]
                    .some(field => (field || '').toLowerCase().includes(q));
                return matchesProject && matchesQuery;
            });

            if (!filtered.length) {
                promptListEl.innerHTML = '<div class="card" style="color:var(--muted);">No matching prompt notes found.</div>';
                return;
            }

            promptListEl.innerHTML = filtered.map(p => `
        <article class="prompt-item">
          <div class="prompt-top">
            <h3 class="prompt-title">${escapeHtml(p.title)}</h3>
            <span class="sub">${escapeHtml(p.updatedAt || '')}</span>
          </div>
          <div class="tags">
            ${p.project ? `<span class="tag">${escapeHtml(p.project)}</span>` : ''}
            ${p.tool ? `<span class="tag">${escapeHtml(p.tool)}</span>` : ''}
          </div>
          <pre>${escapeHtml(p.content)}</pre>
          <div class="actions">
            <button class="btn-primary" onclick="copyPrompt('${p.id}')">Copy</button>
            <button onclick="editPrompt('${p.id}')">Edit</button>
            <button class="btn-danger" onclick="deletePrompt('${p.id}')">Delete</button>
          </div>
        </article>
      `).join('');
        }

        window.copyPrompt = async function(id) {
            const item = prompts.find(p => p.id === id);
            if (!item) return;
            try {
                await navigator.clipboard.writeText(item.content);
                showToast('Prompt copied!');
            } catch {
                const ta = document.createElement('textarea');
                ta.value = item.content;
                document.body.appendChild(ta);
                ta.select();
                document.execCommand('copy');
                ta.remove();
                showToast('Prompt copied!');
            }
        };

        window.editPrompt = function(id) {
            const item = prompts.find(p => p.id === id);
            if (!item) return;
            editIdEl.value = item.id;
            titleEl.value = item.title;
            toolEl.value = item.tool || '';
            projectEl.value = item.project || '';
            contentEl.value = item.content;
            formTitle.textContent = 'Edit Prompt Note';
            formCard.classList.remove('hidden');
            titleEl.focus();
        };

        window.deletePrompt = function(id) {
            prompts = prompts.filter(p => p.id !== id);
            savePrompts();
            render();
            showToast('Deleted');
        };

        document.getElementById('toggleFormBtn').addEventListener('click', () => {
            editIdEl.value = '';
            promptForm.reset();
            formTitle.textContent = 'Add Prompt Note';
            formCard.classList.toggle('hidden');
            if (!formCard.classList.contains('hidden')) titleEl.focus();
        });

        document.getElementById('cancelBtn').addEventListener('click', () => {
            formCard.classList.add('hidden');
            promptForm.reset();
        });

        promptForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const id = editIdEl.value || crypto.randomUUID();
            const record = {
                id
                , title: titleEl.value.trim()
                , tool: toolEl.value.trim()
                , project: projectEl.value.trim()
                , content: contentEl.value
                , updatedAt: new Date().toISOString().slice(0, 10)
            };

            const idx = prompts.findIndex(p => p.id === id);
            if (idx >= 0) {
                prompts[idx] = record;
            } else {
                prompts.unshift(record);
            }

            savePrompts();
            render();
            formCard.classList.add('hidden');
            promptForm.reset();
            showToast('Saved offline!');
        });

        document.getElementById('exportBtn').addEventListener('click', () => {
            const blob = new Blob([JSON.stringify(prompts, null, 2)], {
                type: 'application/json'
            });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `prompt-notes-${new Date().toISOString().slice(0, 10)}.json`;
            a.click();
            URL.revokeObjectURL(url);
            showToast('Exported JSON!');
        });

        const importFile = document.getElementById('importFile');
        document.getElementById('importBtn').addEventListener('click', () => importFile.click());
        importFile.addEventListener('change', async (e) => {
            const file = e.target.files ? . [0];
            if (!file) return;
            try {
                const text = await file.text();
                const data = JSON.parse(text);
                if (!Array.isArray(data)) throw new Error('Invalid JSON');
                prompts = data;
                savePrompts();
                render();
                showToast('Imported JSON!');
            } catch {
                showToast('Invalid JSON file');
            }
            importFile.value = '';
        });

        searchInput.addEventListener('input', render);
        projectFilter.addEventListener('change', render);

        render();

    </script>
</body>
</html>
