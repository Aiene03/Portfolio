<?php
/**
 * Main index file for Aiene Portfolio
 * Fully refactored with external assets and OOP approach
 */

require_once __DIR__ . '/../classes/Project.php';

$projects = [
    new Project(
        "Smart-Menu",
        "A modern mobile application built with React Native and Expo, featuring a TypeScript-driven architecture for robust performance.",
        "resources/LOGO.jpg",
        ["React Native", "Expo", "TypeScript", "JavaScript"],
        "https://github.com/Aiene03/Smart-Menu"
    )
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aiene Berfel | Full Stack Developer Portfolio</title>

    <!-- SEO & Meta Tags -->
    <meta name="description" content="Portfolio of Aiene Berfel Sym F. Gascon, a Full Stack Developer specializing in React Native, PHP, and modern web experiences.">
    <meta name="keywords" content="Aiene Berfel, Full Stack Developer, React Native, PHP, Web Development, Portfolio">
    <meta name="author" content="Aiene Berfel Sym F. Gascon">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://aiene.yourdomain.com/">
    <meta property="og:title" content="Aiene Berfel | Full Stack Developer">
    <meta property="og:description" content="I build exceptional digital experiences that combine beautiful design with robust functionality.">
    <meta property="og:image" content="https://aiene.yourdomain.com/resources/profile.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Aiene Berfel | Full Stack Developer">
    <meta property="twitter:description" content="I build exceptional digital experiences that combine beautiful design with robust functionality.">
    <meta property="twitter:image" content="https://aiene.yourdomain.com/resources/profile.jpg">

    <!-- External Assets -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="min-h-screen bg-white">

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-50 to-slate-100 px-4">
        <div class="max-w-5xl w-full grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <div class="space-y-2">
                    <p class="text-slate-600">Hello, I'm</p>
                    <h1 class="text-5xl md:text-6xl text-slate-900 font-medium">Aiene Berfel Sym F. Gascon</h1>
                    <h2 class="text-2xl md:text-3xl text-slate-700">Full Stack Developer</h2>
                </div>
                <p class="text-lg text-slate-600 leading-relaxed">
                    I build exceptional digital experiences that combine beautiful design with robust functionality.
                </p>
                <div class="flex gap-4 pt-4">
                    <a href="#contact" class="btn-primary">Get In Touch</a>
                    <a href="#projects" class="btn-outline">View Projects</a>
                </div>
                <div class="flex gap-4 pt-4">
                    <a href="https://github.com/Aiene03" target="_blank" class="text-slate-600 hover:text-slate-900 transition-colors"><i data-lucide="github"></i></a>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="relative">
                    <div class="absolute inset-0 bg-slate-900 rounded-2xl transform rotate-3"></div>
                    <img src="resources/profile.jpg" width="800" height="800" alt="Developer" class="relative rounded-2xl shadow-2xl w-full aspect-square object-cover" loading="eager">
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl text-slate-900 mb-4 font-medium">Skills & Expertise</h2>
                <p class="text-lg text-slate-600">A comprehensive toolkit for modern applications</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Frontend -->
                <div class="card p-6">
                    <div class="w-12 h-12 bg-slate-900 rounded-lg flex items-center justify-center mb-4"><i data-lucide="code-2" class="text-white"></i></div>
                    <h3 class="text-xl font-medium mb-4">Frontend</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag">React</span>
                        <span class="skill-tag">TypeScript</span>
                        <span class="skill-tag">Tailwind CSS</span>
                    </div>
                </div>

                <!-- Backend -->
                <div class="card p-6">
                    <div class="w-12 h-12 bg-slate-900 rounded-lg flex items-center justify-center mb-4"><i data-lucide="server" class="text-white"></i></div>
                    <h3 class="text-xl font-medium mb-4">Backend</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag">Node.js</span>
                        <span class="skill-tag">Python</span>
                        <span class="skill-tag">REST APIs</span>
                    </div>
                </div>

                <!-- Databases -->
                <div class="card p-6">
                    <div class="w-12 h-12 bg-slate-900 rounded-lg flex items-center justify-center mb-4"><i data-lucide="database" class="text-white"></i></div>
                    <h3 class="text-xl font-medium mb-4">Databases</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag">PostgreSQL</span>
                        <span class="skill-tag">MongoDB</span>
                        <span class="skill-tag">Supabase</span>
                        <span class="skill-tag">Firebase</span>
                    </div>
                </div>

                <!-- Mobile Development -->
                <div class="card p-6">
                    <div class="w-12 h-12 bg-slate-900 rounded-lg flex items-center justify-center mb-4"><i data-lucide="smartphone" class="text-white"></i></div>
                    <h3 class="text-xl font-medium mb-4">Mobile Development</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag">React Native</span>
                        <span class="skill-tag">Flutter</span>
                        <span class="skill-tag">iOS</span>
                        <span class="skill-tag">Android</span>
                        <span class="skill-tag">Expo</span>
                    </div>
                </div>

                <!-- Design & UI/UX -->
                <div class="card p-6">
                    <div class="w-12 h-12 bg-slate-900 rounded-lg flex items-center justify-center mb-4"><i data-lucide="palette" class="text-white"></i></div>
                    <h3 class="text-xl font-medium mb-4">Design & UI/UX</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="skill-tag">Figma</span>
                        <span class="skill-tag">Responsive Design</span>
                        <span class="skill-tag">Accessibility</span>
                        <span class="skill-tag">Animation</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 px-4 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl text-slate-900 mb-4 font-medium">Featured Projects</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <?php foreach ($projects as $project): ?>
                    <?= $project->render(); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 px-4 bg-slate-50">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl text-slate-900 mb-4 font-medium">Get In Touch</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="md:col-span-2">
                    <div class="card p-8">
                        <form action="process_contact.php" method="POST" class="space-y-6">
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="space-y-2">
                                    <label class="text-sm">Name</label>
                                    <input type="text" name="name" required class="w-full px-4 py-2 border rounded-[0.625rem] bg-[#f3f3f5]">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-sm">Email</label>
                                    <input type="email" name="email" required class="w-full px-4 py-2 border rounded-[0.625rem] bg-[#f3f3f5]">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm">Subject</label>
                                <input type="text" name="subject" required class="w-full px-4 py-2 border rounded-[0.625rem] bg-[#f3f3f5]">
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm">Message</label>
                                <textarea name="message" rows="6" required class="w-full px-4 py-2 border rounded-[0.625rem] bg-[#f3f3f5] resize-none"></textarea>
                            </div>
                            <button type="submit" class="btn-primary w-full justify-center py-3">Send Message</button>
                        </form>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="card p-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-slate-900 rounded-lg flex items-center justify-center"><i data-lucide="mail" class="text-white"></i></div>
                            <div><h3 class="font-medium">Email</h3><p class="text-sm text-slate-600">john@example.com</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-white py-12 text-center">
        <p>&copy; 2026 Aienebsg. All rights reserve.</p>
    </footer>

    <!-- Core JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>
