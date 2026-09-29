<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome Panha-dev</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0f1220;
            --panel: #171b2e;
            --line: #2a3050;
            --text: #e8ebf7;
            --muted: #8f97b8;
            --accent: #5eead4;
            --accent-2: #f9a8d4;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            display: grid;
            place-items: center;
            padding: 24px;
            background-image:
                radial-gradient(circle at 15% 20%, rgba(94, 234, 212, .10), transparent 40%),
                radial-gradient(circle at 85% 80%, rgba(249, 168, 212, .08), transparent 40%);
        }

        .wrap {
            width: 100%;
            max-width: 720px;
        }

        /* Code-window card: the one memorable element */
        .window {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0, 0, 0, .4);
        }

        .bar {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            border-bottom: 1px solid var(--line);
        }

        .dot {
            width: 11px;
            height: 11px;
            border-radius: 50%;
            background: var(--line);
        }

        .dot:nth-child(1) {
            background: #ff6b6b;
        }

        .dot:nth-child(2) {
            background: #fbbf24;
        }

        .dot:nth-child(3) {
            background: #4ade80;
        }

        .file {
            margin-left: 10px;
            font-size: 13px;
            color: var(--muted);
            font-family: ui-monospace, Menlo, monospace;
        }

        .body {
            padding: 48px 40px 44px;
        }

        h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: clamp(2.2rem, 7vw, 3.8rem);
            line-height: 1.05;
            letter-spacing: -0.02em;
        }

        h1 .name {
            color: var(--accent);
        }

        .cursor {
            display: inline-block;
            width: .09em;
            height: .85em;
            margin-left: 6px;
            background: var(--accent);
            vertical-align: -0.05em;
            animation: blink 1.1s steps(1) infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        p.lead {
            margin-top: 20px;
            max-width: 46ch;
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.65;
        }

        .actions {
            margin-top: 32px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            font: 500 15px 'Inter', sans-serif;
            padding: 12px 22px;
            border-radius: 10px;
            text-decoration: none;
            border: 1px solid var(--line);
            color: var(--text);
            transition: background .2s, border-color .2s, transform .2s;
        }

        .btn:hover {
            border-color: var(--muted);
        }

        .btn.primary {
            background: var(--accent);
            border-color: var(--accent);
            color: #062521;
            font-weight: 500;
        }

        .btn.primary:hover {
            background: #7ff0de;
            transform: translateY(-1px);
        }

        .btn:focus-visible {
            outline: 2px solid var(--accent-2);
            outline-offset: 3px;
        }

        .foot {
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
            color: var(--muted);
        }

        @media (max-width: 480px) {
            .body {
                padding: 32px 22px 30px;
            }

            .btn {
                flex: 1 1 100%;
                text-align: center;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .cursor {
                animation: none;
            }

            .btn {
                transition: none;
            }
        }

    </style>
</head>
<body>
    <main class="wrap">
        <section class="window">
            <div class="bar">
                <span class="dot"></span><span class="dot"></span><span class="dot"></span>
                <span class="file">welcome.blade.php</span>
            </div>
            <div class="body">
                <h1>Welcome,<br><span class="name">Panha-dev</span><span class="cursor" aria-hidden="true"></span></h1>
                <p class="lead">Your workspace is ready. Pick up where you left off or start something new.</p>
                <div class="actions">
                    <a class="btn primary" href="#">Open dashboard</a>
                    <a class="btn" href="#">Start a project</a>
                </div>
            </div>
        </section>
        <p class="foot">Signed in as Panha-dev</p>
    </main>
</body>
</html>
