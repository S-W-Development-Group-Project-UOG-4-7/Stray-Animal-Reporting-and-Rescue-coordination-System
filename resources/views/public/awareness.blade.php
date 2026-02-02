<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SafePaws — Awareness Corner</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
        <style type="text/tailwindcss">
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }

            @keyframes pulse-glow {
                0%, 100% { opacity: 1; }
                50% { opacity: 0.7; }
            }

            @keyframes slide-in {
                from { transform: translateY(20px); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }

            .animate-float {
                animation: float 3s ease-in-out infinite;
            }

            .animate-pulse-glow {
                animation: pulse-glow 2s ease-in-out infinite;
            }

            .animate-slide-in {
                animation: slide-in 0.6s ease-out;
            }

            body {
                font-family: 'Poppins', sans-serif;
                background-color: #071331;
                scroll-behavior: smooth;
            }

            h1, h2, h3, h4, .title {
                font-family: 'Quicksand', sans-serif;
            }

            .glass-effect {
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .gradient-text {
                background: linear-gradient(90deg, #0ea5e9, #22d3ee, #67e8f9);
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
            }

            .gradient-bg {
                background: linear-gradient(135deg, #0ea5e9, #22d3ee, #67e8f9);
            }

            .hover-grow {
                transition: transform 0.3s ease;
            }

            .hover-grow:hover {
                transform: translateY(-5px);
            }

            .section-padding {
                @apply px-5 py-16 md:px-12 md:py-24;
            }

            .container-custom {
                @apply max-w-[1400px] mx-auto;
            }

            .title {
                @apply text-4xl md:text-5xl lg:text-6xl font-bold leading-tight;
            }

            .subtitle {
                @apply text-xl md:text-2xl font-light text-gray-300;
            }

            .section-title {
                @apply text-3xl md:text-4xl lg:text-5xl font-bold mb-4 text-center;
            }

            .section-subtitle {
                @apply text-lg md:text-xl text-gray-300 mb-12 text-center max-w-3xl mx-auto;
            }

            .primary-btn {
                @apply gradient-bg text-white font-medium px-8 py-4 rounded-full hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300 hover:scale-105 inline-flex items-center gap-2;
            }

            .secondary-btn {
                @apply border-2 border-[#0ea5e9] text-[#0ea5e9] font-medium px-8 py-4 rounded-full hover:bg-[#0ea5e9] hover:text-white transition-all duration-300 hover:scale-105 inline-flex items-center gap-2;
            }

            .danger-btn {
                @apply border-2 border-red-500 text-red-500 font-medium px-4 py-2 rounded-full hover:bg-red-500 hover:text-white transition-all duration-300 inline-flex items-center gap-2;
            }

            .card {
                @apply glass-effect rounded-2xl p-6 md:p-8 hover-grow;
            }

            .nav-link {
                @apply relative px-3 py-2 text-sm font-medium transition-colors duration-300 text-white/90 hover:text-white;
            }

            .nav-link::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                width: 0;
                height: 2px;
                background: linear-gradient(90deg, #0ea5e9, #22d3ee);
                transition: all 0.3s ease;
                transform: translateX(-50%);
            }

            .nav-link:hover::after, .nav-link.active::after {
                width: 80%;
            }

            .post-card {
                @apply glass-effect rounded-2xl p-6 mb-8 transition-all duration-300 hover:border-cyan-500/30 relative;
            }

            .post-header {
                @apply flex items-center gap-4 mb-6;
            }

            .post-avatar {
                @apply w-12 h-12 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center text-white font-bold text-lg;
            }

            .post-content {
                @apply mb-6;
            }

            .post-image {
                @apply rounded-xl mb-4 max-h-96 object-cover w-full;
            }

            .video-container {
                @apply relative rounded-xl overflow-hidden mb-4;
                padding-bottom: 56.25%;
                height: 0;
            }

            .video-container iframe,
            .video-container video {
                @apply absolute top-0 left-0 w-full h-full;
            }

            .comment-section {
                @apply mt-6 pt-6 border-t border-white/10;
            }

            .comment-card {
                @apply glass-effect rounded-xl p-4 mb-4 relative;
            }

            .comment-header {
                @apply flex items-center gap-3 mb-3;
            }

            .comment-avatar {
                @apply w-8 h-8 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center text-white text-sm font-bold;
            }

            .comment-input {
                @apply w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:border-cyan-500 transition-colors duration-300;
            }

            .tag {
                @apply px-3 py-1 rounded-full text-xs font-semibold;
            }

            .article-tag {
                @apply tag bg-gradient-to-r from-purple-600 to-purple-800 text-white;
            }

            .video-tag {
                @apply tag bg-gradient-to-r from-red-600 to-red-800 text-white;
            }

            .image-tag {
                @apply tag bg-gradient-to-r from-green-600 to-green-800 text-white;
            }

            .upload-card {
                @apply glass-effect rounded-2xl p-8 border-2 border-dashed border-cyan-500/30 hover:border-cyan-500/50 transition-all duration-300;
            }

            .file-input-container {
                @apply relative overflow-hidden mb-6;
            }

            .file-input {
                @apply absolute inset-0 w-full h-full opacity-0 cursor-pointer;
            }

            .file-label {
                @apply flex flex-col items-center justify-center p-8 border-2 border-dashed border-cyan-500/30 rounded-xl hover:border-cyan-500/50 transition-all duration-300 cursor-pointer bg-white/5;
            }

            .image-preview {
                @apply mt-4 rounded-xl overflow-hidden max-h-96 relative;
            }

            .image-preview img,
            .image-preview video {
                @apply w-full h-auto object-cover;
            }

            .remove-image {
                @apply absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full hover:bg-red-500 transition-colors duration-300;
            }

            .nav-actions {
                @apply flex items-center gap-2 ml-4;
            }

            .report-btn {
                @apply flex items-center gap-2 px-4 py-2.5 rounded-full bg-red-500/20 hover:bg-red-500/30 border border-red-500/30 transition-all duration-300 text-sm font-medium text-red-300 hover:text-white;
            }

            .edit-btn {
                @apply border-2 border-cyan-500 text-cyan-500 font-medium px-3 py-1.5 rounded-full hover:bg-cyan-500 hover:text-white transition-all duration-300 text-sm inline-flex items-center gap-1;
            }

            .delete-btn {
                @apply border-2 border-red-500 text-red-500 font-medium px-3 py-1.5 rounded-full hover:bg-red-500 hover:text-white transition-all duration-300 text-sm inline-flex items-center gap-1;
            }

            .post-actions {
                @apply absolute top-4 right-4 flex gap-2;
            }

            .modal-overlay {
                @apply fixed inset-0 bg-black/70 z-50 hidden;
            }

            .modal-content {
                @apply fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 glass-effect rounded-2xl p-8 z-50 max-w-lg w-full hidden;
            }

            .youtube-input {
                @apply w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:border-cyan-500 transition-colors duration-300 mb-4;
            }

            .user-info {
                @apply flex items-center gap-2 px-3 py-2 rounded-lg bg-white/5;
            }

            .user-avatar {
                @apply w-8 h-8 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center text-white text-sm font-bold;
            }
        </style>
    </head>
    <body class="overflow-x-hidden text-white">
        <!-- Navigation -->
        <header class="fixed top-0 z-50 w-full" style="background: rgba(7, 19, 49, 0.85); backdrop-filter: blur(15px); border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
            <div class="px-5 py-3 container-custom">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 shadow-lg gradient-bg rounded-xl shadow-cyan-500/30">
                            <i class="text-lg text-white fas fa-paw"></i>
                        </div>
                        <div>
                            <span class="text-xl font-bold">SafePaws</span>
                            <div class="text-[10px] text-gray-300 leading-tight">Awareness Corner</div>
                        </div>
                    </a>

                    <nav class="items-center hidden gap-1 lg:flex">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                        <a href="#upload" class="nav-link active">Share Content</a>
                        <a href="#posts" class="nav-link">View Posts</a>

                        @auth
                        <div class="user-info">
                            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                            <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                        </div>
                        @endauth

                        <div class="nav-actions">
                           <a href="{{ route('animal.report.form') }}" class="report-btn">
                               <i class="fas fa-exclamation-triangle"></i>
                               Report Animal
                           </a>
                           <a href="{{ route('home') }}" class="border px-3 py-1.5 text-xs rounded-lg transition-all duration-200 bg-cyan-500/20 hover:bg-cyan-500/30 border-cyan-500/30 text-cyan-300 hover:text-white">
                                <i class="mr-1 fas fa-arrow-left"></i>
                                Back to Home
                            </a>
                        </div>
                    </nav>

                    <button id="mobile-menu-btn" class="text-xl lg:hidden">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden px-5 py-4 border-t lg:hidden" style="background: rgba(7, 19, 49, 0.95); border-color: rgba(255, 255, 255, 0.1);">
                <div class="space-y-2">
                    <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Home</a>
                    <a href="#upload" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">Share Content</a>
                    <a href="#posts" class="block px-3 py-2.5 rounded-lg hover:bg-white/5 text-sm">View Posts</a>

                    @auth
                    <div class="pt-3 mt-3 border-t border-white/10">
                        <div class="flex items-center gap-3 px-2 py-2 rounded-lg bg-white/5">
                            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                            <div>
                                <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                                <div class="text-xs text-gray-400">Logged in</div>
                            </div>
                        </div>
                    </div>
                    @endauth

                    <div class="pt-3 mt-3 space-y-2 border-t border-white/10">
                        <a href="{{ route('animal.report.form') }}" class="flex items-center justify-center gap-2 w-full px-3 py-2.5 rounded-lg bg-red-500/20 hover:bg-red-500/30 border border-red-500/30 text-red-300 hover:text-white text-sm">
                            <i class="fas fa-exclamation-triangle"></i>
                            Report Animal
                        </a>
                        <a href="{{ route('home') }}" class="flex items-center justify-center gap-2 w-full px-3 py-2.5 rounded-lg bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-500/30 text-cyan-300 hover:text-white text-sm">
                            <i class="fas fa-arrow-left"></i>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div id="mainContent">
            <!-- Hero Section -->
            <section class="relative pt-32 pb-20 overflow-hidden md:pt-40 md:pb-32">
                <div class="absolute inset-0 bg-gradient-to-b from-cyan-900/20 via-transparent to-blue-900/20"></div>
                <div class="px-5 container-custom">
                    <div class="grid items-center gap-12 lg:grid-cols-2">
                        <div>
                            <h1 class="mb-6 title">
                                Awareness <span class="gradient-text">Corner</span>
                            </h1>
                            <p class="mb-10 subtitle">
                                Share stories, spread awareness, and join the conversation about stray animal welfare. Together, we can make a difference.
                            </p>
                            <div class="flex flex-col gap-4 sm:flex-row">
                                <a href="#upload" class="primary-btn animate-pulse-glow">
                                    <i class="fas fa-upload"></i>
                                    Share Your Story
                                </a>
                                <a href="#posts" class="secondary-btn">
                                    <i class="fas fa-eye"></i>
                                    View Community Posts
                                </a>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="relative z-10">
                                <img src="https://images.unsplash.com/photo-1543852786-1cf6624b9987?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3"
                                     alt="Awareness and Community"
                                     class="rounded-3xl shadow-2xl shadow-cyan-500/20 w-full h-[500px] object-cover">
                            </div>
                            <div class="absolute w-64 h-64 -bottom-6 -right-6 gradient-bg rounded-3xl -z-10 animate-float"></div>
                            <div class="absolute w-48 h-48 -top-6 -left-6 bg-purple-500/30 rounded-3xl -z-10 animate-float" style="animation-delay: 1s;"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Upload Section -->
            <section id="upload" class="section-padding bg-gradient-to-b from-cyan-900/10 to-transparent">
                <div class="container-custom">
                    <div class="mb-12 text-center">
                        <h2 class="section-title">Share Your Content</h2>
                        <p class="section-subtitle">
                            Upload articles, videos, or images to raise awareness about stray animal welfare
                        </p>
                    </div>

                    <div class="max-w-2xl mx-auto">
                        <div class="upload-card">
                            <form id="uploadForm" class="space-y-6">
                                <div>
                                    <label class="block mb-3 font-medium">Content Type</label>
                                    <div class="grid grid-cols-3 gap-3">
                                        <label class="flex-1">
                                            <input type="radio" name="contentType" value="article" class="hidden peer" checked>
                                            <div class="flex flex-col items-center justify-center p-4 rounded-xl border-2 border-white/10 peer-checked:border-cyan-500 cursor-pointer transition-all duration-300">
                                                <i class="mb-2 text-2xl fas fa-newspaper text-cyan-400"></i>
                                                <span class="font-medium">Article</span>
                                            </div>
                                        </label>
                                        <label class="flex-1">
                                            <input type="radio" name="contentType" value="video" class="hidden peer">
                                            <div class="flex flex-col items-center justify-center p-4 rounded-xl border-2 border-white/10 peer-checked:border-cyan-500 cursor-pointer transition-all duration-300">
                                                <i class="mb-2 text-2xl fas fa-video text-cyan-400"></i>
                                                <span class="font-medium">Video</span>
                                            </div>
                                        </label>
                                        <label class="flex-1">
                                            <input type="radio" name="contentType" value="image" class="hidden peer">
                                            <div class="flex flex-col items-center justify-center p-4 rounded-xl border-2 border-white/10 peer-checked:border-cyan-500 cursor-pointer transition-all duration-300">
                                                <i class="mb-2 text-2xl fas fa-image text-cyan-400"></i>
                                                <span class="font-medium">Image</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <label class="block mb-2 font-medium">Title</label>
                                    <input type="text" id="contentTitle" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:border-cyan-500 transition-colors duration-300" placeholder="Enter a descriptive title" required>
                                </div>

                                <div>
                                    <label class="block mb-2 font-medium">Description</label>
                                    <textarea id="contentDescription" rows="4" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:border-cyan-500 transition-colors duration-300" placeholder="Describe your content..." required></textarea>
                                </div>

                                <div id="mediaUploadSection">
                                    <div id="fileUploadSection" class="file-input-container">
                                        <label class="block mb-2 font-medium">Upload Image/Video (Optional)</label>
                                        <input type="file" id="contentFile" class="file-input" accept=".jpg,.jpeg,.png,.gif,.mp4,.mov,.avi,.mkv" data-max-size="50">
                                        <label for="contentFile" class="file-label">
                                            <i class="mb-4 text-4xl fas fa-cloud-upload-alt text-cyan-400"></i>
                                            <span class="font-medium">Choose file or drag & drop</span>
                                            <span class="mt-2 text-sm text-gray-400">Images & Videos up to 50MB</span>
                                        </label>
                                        <div id="mediaPreview" class="image-preview hidden"></div>
                                    </div>

                                    <div id="youtubeUploadSection" class="hidden">
                                        <label class="block mb-2 font-medium">YouTube Video URL (Optional)</label>
                                        <input type="text" id="youtubeUrl" class="youtube-input" placeholder="Paste YouTube video URL here...">
                                        <p class="text-sm text-gray-400 mb-4">Example: https://www.youtube.com/watch?v=VIDEO_ID</p>
                                        <div id="youtubePreview" class="hidden video-container"></div>
                                    </div>
                                </div>

                                <button type="submit" class="w-full primary-btn">
                                    <i class="fas fa-paper-plane"></i>
                                    Share with Community
                                </button>
                            </form>
                        </div>

                        <div class="mt-8">
                            <div class="p-6 rounded-2xl glass-effect">
                                <h3 class="mb-4 text-xl font-bold">Community Guidelines</h3>
                                <ul class="space-y-3 text-sm text-gray-300">
                                    <li class="flex items-start gap-2">
                                        <i class="mt-1 text-cyan-400 fas fa-check-circle"></i>
                                        <span>Share genuine experiences and helpful information</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <i class="mt-1 text-cyan-400 fas fa-check-circle"></i>
                                        <span>Be respectful in comments and discussions</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <i class="mt-1 text-cyan-400 fas fa-check-circle"></i>
                                        <span>Images should be clear and not distressing</span>
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <i class="mt-1 text-cyan-400 fas fa-check-circle"></i>
                                        <span>Respect animal privacy and dignity</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Posts Section -->
            <section id="posts" class="section-padding">
                <div class="container-custom">
                    <div class="mb-12 text-center">
                        <h2 class="section-title">Community Posts</h2>
                        <p class="section-subtitle">
                            Latest stories and discussions from our community
                        </p>
                    </div>

                    <div id="postsContainer" class="max-w-4xl mx-auto"></div>

                    <div id="loadingIndicator" class="max-w-4xl mx-auto mt-8 text-center text-gray-400">
                        <i class="fas fa-paw animate-pulse"></i>
                        <span class="ml-2">Loading posts...</span>
                    </div>
                </div>
            </section>

            <!-- Edit Post Modal -->
            <div id="editPostModal" class="modal-overlay">
                <div class="modal-content">
                    <button onclick="closeEditModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white">
                        <i class="text-xl fas fa-times"></i>
                    </button>
                    <h3 class="mb-6 text-2xl font-bold">Edit Post</h3>
                    <form id="editPostForm" class="space-y-6">
                        <input type="hidden" id="editPostId">
                        <div>
                            <label class="block mb-2 font-medium">Title</label>
                            <input type="text" id="editPostTitle" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:border-cyan-500 transition-colors duration-300" required>
                        </div>
                        <div>
                            <label class="block mb-2 font-medium">Description</label>
                            <textarea id="editPostDescription" rows="4" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:border-cyan-500 transition-colors duration-300" required></textarea>
                        </div>
                        <div class="flex gap-3">
                            <button type="submit" class="flex-1 primary-btn">
                                <i class="fas fa-save"></i>
                                Save Changes
                            </button>
                            <button type="button" onclick="closeEditModal()" class="flex-1 secondary-btn">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Edit Comment Modal -->
            <div id="editCommentModal" class="modal-overlay">
                <div class="modal-content" style="max-width: 500px;">
                    <button onclick="closeEditCommentModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white">
                        <i class="text-xl fas fa-times"></i>
                    </button>
                    <h3 class="mb-6 text-2xl font-bold">Edit Comment</h3>
                    <form id="editCommentForm" class="space-y-6">
                        <input type="hidden" id="editCommentId">
                        <input type="hidden" id="editCommentPostId">
                        <div>
                            <textarea id="editCommentText" rows="4" class="w-full px-4 py-3 rounded-xl bg-white/5 border border-white/10 text-white placeholder-gray-400 focus:outline-none focus:border-cyan-500 transition-colors duration-300" required></textarea>
                        </div>
                        <div class="flex gap-3">
                            <button type="submit" class="flex-1 primary-btn">
                                <i class="fas fa-save"></i>
                                Update Comment
                            </button>
                            <button type="button" onclick="closeEditCommentModal()" class="flex-1 secondary-btn">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-gradient-to-b from-transparent to-[#0b2447] pt-16 pb-8">
                <div class="px-5 container-custom">
                    <div class="grid gap-8 mb-12 md:grid-cols-3">
                        <div>
                            <a href="{{ route('home') }}" class="flex items-center gap-3 mb-6">
                                <div class="flex items-center justify-center w-12 h-12 gradient-bg rounded-xl">
                                    <i class="text-xl text-white fas fa-paw"></i>
                                </div>
                                <div>
                                    <span class="text-2xl font-bold">SafePaws</span>
                                    <div class="text-xs text-gray-300">Awareness Corner</div>
                                </div>
                            </a>
                            <p class="mb-6 text-gray-300">
                                A platform for sharing stories and raising awareness about stray animal welfare.
                            </p>
                        </div>

                        <div>
                            <h4 class="mb-6 text-lg font-bold">Quick Links</h4>
                            <ul class="space-y-3">
                                <li><a href="#upload" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Share Content</a></li>
                                <li><a href="#posts" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">View Posts</a></li>
                                <li><a href="{{ route('home') }}" class="text-gray-300 transition-colors duration-300 hover:text-cyan-400">Back to Home</a></li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="mb-6 text-lg font-bold">Need Help?</h4>
                            <ul class="space-y-4">
                                <li class="flex items-center gap-3">
                                    <i class="fas fa-envelope text-cyan-400"></i>
                                    <span class="text-gray-300">awareness@safepaws.org</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <i class="fas fa-flag text-cyan-400"></i>
                                    <span class="text-gray-300">Report Inappropriate Content</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-white/10">
                        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                            <p class="text-sm text-gray-400">
                                &copy; <span id="current-year"></span> SafePaws Awareness Corner. All rights reserved.
                            </p>
                            <p class="text-sm text-gray-400">
                                Made with <i class="mx-1 text-red-400 fas fa-heart"></i> for animals everywhere
                            </p>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- Back to Top Button -->
            <button id="back-to-top" class="fixed flex items-center justify-center hidden w-12 h-12 text-white transition-all duration-300 rounded-full shadow-lg bottom-8 right-8 gradient-bg shadow-cyan-500/30 hover:scale-110">
                <i class="fas fa-arrow-up"></i>
            </button>
        </div>

        <script>
            document.getElementById('current-year').textContent = new Date().getFullYear();

            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                    mobileMenuBtn.innerHTML = mobileMenu.classList.contains('hidden')
                        ? '<i class="fas fa-bars"></i>'
                        : '<i class="fas fa-times"></i>';
                });
            }

            // Back to top button
            const backToTopBtn = document.getElementById('back-to-top');

            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.remove('hidden');
                } else {
                    backToTopBtn.classList.add('hidden');
                }
            });

            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                            mobileMenu.classList.add('hidden');
                            mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                        }
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Current user from Laravel auth
            let currentUser = @json(Auth::check() ? Auth::user()->name : null);
            let currentUserId = @json(Auth::check() ? Auth::user()->id : null);

            // Posts stored in localStorage
            let posts = JSON.parse(localStorage.getItem('safePawsPosts')) || [];

            // Sample initial posts
            const initialPosts = [
                {
                    id: 1,
                    type: 'article',
                    title: 'The Importance of Community Feeding Programs',
                    description: 'In our neighborhood, we started a community feeding program for stray animals. Every Sunday, volunteers gather to prepare and distribute food. The impact has been incredible - healthier animals and fewer conflicts.',
                    author: 'Sarah Johnson',
                    authorId: 0,
                    date: '2 days ago',
                    media: {
                        type: 'image',
                        url: 'https://images.unsplash.com/photo-1518717758536-85ae29035b6d?q=80&w=800&auto=format&fit=crop'
                    },
                    comments: [
                        { id: 1, author: 'Mike Chen', authorId: 0, text: 'This is amazing! How can I start something similar in my area?', date: '1 day ago' },
                        { id: 2, author: 'Lisa Park', authorId: 0, text: 'We did this too! It really brings the community together.', date: '12 hours ago' }
                    ]
                },
                {
                    id: 2,
                    type: 'image',
                    title: 'Before & After: Miracle the Street Cat',
                    description: "Found Miracle malnourished and injured on the streets. After 3 months of care, she's now a healthy, loving companion. Never underestimate the power of care and compassion.",
                    author: 'Animal Rescue Team',
                    authorId: 0,
                    date: '3 days ago',
                    media: {
                        type: 'image',
                        url: 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?q=80&w=800&auto=format&fit=crop'
                    },
                    comments: [
                        { id: 1, author: 'Tom Harris', authorId: 0, text: 'What an amazing transformation!', date: '2 days ago' }
                    ]
                }
            ];

            if (posts.length === 0) {
                posts = initialPosts;
                localStorage.setItem('safePawsPosts', JSON.stringify(posts));
            }

            function renderPosts() {
                const postsContainer = document.getElementById('postsContainer');
                const loadingIndicator = document.getElementById('loadingIndicator');
                loadingIndicator.style.display = 'none';
                postsContainer.innerHTML = '';

                const sortedPosts = [...posts].sort((a, b) => b.id - a.id);

                sortedPosts.forEach(post => {
                    const postElement = createPostElement(post);
                    postsContainer.appendChild(postElement);
                });

                if (posts.length === 0) {
                    postsContainer.innerHTML = `
                        <div class="text-center py-12">
                            <i class="text-4xl mb-4 text-gray-400 fas fa-paw"></i>
                            <h3 class="text-xl font-bold mb-2">No Posts Yet</h3>
                            <p class="text-gray-400">Be the first to share your story!</p>
                        </div>
                    `;
                }
            }

            function createPostElement(post) {
                const div = document.createElement('div');
                div.className = 'post-card animate-slide-in';
                div.id = `post-${post.id}`;

                let tagClass = 'article-tag';
                if (post.type === 'video') tagClass = 'video-tag';
                if (post.type === 'image') tagClass = 'image-tag';

                const isPostOwner = currentUserId && post.authorId === currentUserId;

                let mediaHTML = '';
                if (post.media) {
                    if (post.media.type === 'image') {
                        mediaHTML = `<div class="post-image-container"><img src="${post.media.url}" alt="Post image" class="post-image"></div>`;
                    } else if (post.media.type === 'video' || post.media.type === 'youtube') {
                        if (post.media.url.includes('youtube.com') || post.media.url.includes('youtu.be')) {
                            mediaHTML = `<div class="video-container"><iframe src="${post.media.url}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>`;
                        } else {
                            mediaHTML = `<div class="video-container"><video controls class="w-full"><source src="${post.media.url}" type="video/mp4">Your browser does not support the video tag.</video></div>`;
                        }
                    }
                }

                div.innerHTML = `
                    <div class="post-header">
                        <div class="post-avatar">${post.author.charAt(0)}</div>
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-1">
                                <h3 class="font-bold text-lg">${post.author}</h3>
                                <span class="${tagClass}">
                                    <i class="mr-1 fas ${post.type === 'article' ? 'fa-newspaper' : post.type === 'video' ? 'fa-video' : 'fa-image'}"></i>
                                    ${post.type.charAt(0).toUpperCase() + post.type.slice(1)}
                                </span>
                            </div>
                            <p class="text-sm text-gray-400">${post.date}</p>
                        </div>
                    </div>
                    <div class="post-content">
                        <h2 class="text-2xl font-bold mb-3">${post.title}</h2>
                        <p class="text-gray-300 mb-4">${post.description}</p>
                        ${mediaHTML}
                    </div>
                    ${isPostOwner ? `
                        <div class="post-actions">
                            <button onclick="editPost(${post.id})" class="edit-btn"><i class="fas fa-edit"></i> Edit</button>
                            <button onclick="deletePost(${post.id})" class="delete-btn"><i class="fas fa-trash"></i> Delete</button>
                        </div>
                    ` : ''}
                    <div class="comment-section">
                        <h4 class="font-bold mb-4">Comments (${post.comments.length})</h4>
                        <div id="comments-${post.id}" class="mb-6">
                            ${post.comments.map(comment => {
                                const isCommentOwner = currentUserId && comment.authorId === currentUserId;
                                return `
                                    <div class="comment-card" id="comment-${comment.id}">
                                        ${isCommentOwner ? `
                                            <div class="absolute top-3 right-3 flex gap-2">
                                                <button onclick="editComment(${comment.id}, ${post.id})" class="edit-btn text-xs px-2 py-1"><i class="fas fa-edit"></i></button>
                                                <button onclick="deleteComment(${comment.id}, ${post.id})" class="delete-btn text-xs px-2 py-1"><i class="fas fa-trash"></i></button>
                                            </div>
                                        ` : ''}
                                        <div class="comment-header">
                                            <div class="comment-avatar">${comment.author.charAt(0)}</div>
                                            <div>
                                                <span class="font-medium">${comment.author}</span>
                                                <div class="text-xs text-gray-400">${comment.date}</div>
                                            </div>
                                        </div>
                                        <p class="text-gray-300">${comment.text}</p>
                                    </div>
                                `;
                            }).join('')}
                        </div>
                        ${currentUser ? `
                        <div class="mt-4">
                            <textarea id="comment-input-${post.id}" class="comment-input" placeholder="Add a comment..." rows="2"></textarea>
                            <div class="flex justify-end mt-3">
                                <button onclick="addComment(${post.id})" class="px-6 py-2 rounded-full gradient-bg text-white hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300">
                                    <i class="mr-2 fas fa-paper-plane"></i>Post Comment
                                </button>
                            </div>
                        </div>
                        ` : `
                        <div class="mt-4 text-center py-4 glass-effect rounded-xl">
                            <p class="text-gray-400"><a href="{{ route('login') }}" class="text-cyan-400 hover:underline">Log in</a> to leave a comment</p>
                        </div>
                        `}
                    </div>
                `;

                return div;
            }

            function addComment(postId) {
                if (!currentUser) { showNotification('Please log in to comment'); return; }
                const commentInput = document.getElementById(`comment-input-${postId}`);
                const commentText = commentInput.value.trim();
                if (!commentText) { alert('Please enter a comment'); return; }

                const postIndex = posts.findIndex(p => p.id === postId);
                if (postIndex === -1) return;

                const newComment = { id: Date.now(), author: currentUser, authorId: currentUserId, text: commentText, date: 'Just now' };
                posts[postIndex].comments.push(newComment);
                localStorage.setItem('safePawsPosts', JSON.stringify(posts));
                commentInput.value = '';

                const commentsContainer = document.getElementById(`comments-${postId}`);
                const commentElement = document.createElement('div');
                commentElement.className = 'comment-card';
                commentElement.id = `comment-${newComment.id}`;
                commentElement.innerHTML = `
                    <div class="absolute top-3 right-3 flex gap-2">
                        <button onclick="editComment(${newComment.id}, ${postId})" class="edit-btn text-xs px-2 py-1"><i class="fas fa-edit"></i></button>
                        <button onclick="deleteComment(${newComment.id}, ${postId})" class="delete-btn text-xs px-2 py-1"><i class="fas fa-trash"></i></button>
                    </div>
                    <div class="comment-header">
                        <div class="comment-avatar">${newComment.author.charAt(0)}</div>
                        <div>
                            <span class="font-medium">${newComment.author}</span>
                            <div class="text-xs text-gray-400">${newComment.date}</div>
                        </div>
                    </div>
                    <p class="text-gray-300">${newComment.text}</p>
                `;
                commentsContainer.appendChild(commentElement);

                const commentSection = document.querySelector(`#post-${postId} .comment-section h4`);
                commentSection.textContent = `Comments (${posts[postIndex].comments.length})`;
                showNotification('Comment added successfully!');
            }

            function editComment(commentId, postId) {
                if (!currentUser) return;
                const postIndex = posts.findIndex(p => p.id === postId);
                if (postIndex === -1) return;
                const commentIndex = posts[postIndex].comments.findIndex(c => c.id === commentId);
                if (commentIndex === -1) return;
                const comment = posts[postIndex].comments[commentIndex];
                if (comment.authorId !== currentUserId) { showNotification('You can only edit your own comments'); return; }

                document.getElementById('editCommentId').value = commentId;
                document.getElementById('editCommentPostId').value = postId;
                document.getElementById('editCommentText').value = comment.text;
                document.getElementById('editCommentModal').classList.remove('hidden');
            }

            function deleteComment(commentId, postId) {
                if (!currentUser) return;
                if (!confirm('Are you sure you want to delete this comment?')) return;
                const postIndex = posts.findIndex(p => p.id === postId);
                if (postIndex === -1) return;
                const commentIndex = posts[postIndex].comments.findIndex(c => c.id === commentId);
                if (commentIndex === -1) return;
                if (posts[postIndex].comments[commentIndex].authorId !== currentUserId) { showNotification('You can only delete your own comments'); return; }

                posts[postIndex].comments = posts[postIndex].comments.filter(c => c.id !== commentId);
                localStorage.setItem('safePawsPosts', JSON.stringify(posts));
                const commentElement = document.getElementById(`comment-${commentId}`);
                if (commentElement) commentElement.remove();

                const commentSection = document.querySelector(`#post-${postId} .comment-section h4`);
                commentSection.textContent = `Comments (${posts[postIndex].comments.length})`;
                showNotification('Comment deleted successfully!');
            }

            function editPost(postId) {
                if (!currentUser) return;
                const post = posts.find(p => p.id === postId);
                if (!post || post.authorId !== currentUserId) { showNotification('You can only edit your own posts'); return; }

                document.getElementById('editPostId').value = postId;
                document.getElementById('editPostTitle').value = post.title;
                document.getElementById('editPostDescription').value = post.description;
                document.getElementById('editPostModal').classList.remove('hidden');
            }

            function deletePost(postId) {
                if (!currentUser) return;
                const post = posts.find(p => p.id === postId);
                if (!post || post.authorId !== currentUserId) { showNotification('You can only delete your own posts'); return; }
                if (!confirm('Are you sure you want to delete this post?')) return;

                posts = posts.filter(p => p.id !== postId);
                localStorage.setItem('safePawsPosts', JSON.stringify(posts));
                const postElement = document.getElementById(`post-${postId}`);
                if (postElement) postElement.remove();
                showNotification('Post deleted successfully!');
            }

            // Upload form handling
            document.getElementById('uploadForm').addEventListener('submit', function(e) {
                e.preventDefault();
                if (!currentUser) { showNotification('Please log in to share content'); return; }

                const contentType = document.querySelector('input[name="contentType"]:checked').value;
                const title = document.getElementById('contentTitle').value.trim();
                const description = document.getElementById('contentDescription').value.trim();
                if (!title || !description) { alert('Please fill in all required fields'); return; }

                const newPost = {
                    id: posts.length > 0 ? Math.max(...posts.map(p => p.id)) + 1 : 1,
                    type: contentType, title, description,
                    author: currentUser, authorId: currentUserId,
                    date: 'Just now', media: null, comments: []
                };

                if (contentType === 'video') {
                    const youtubeUrl = document.getElementById('youtubeUrl').value.trim();
                    if (youtubeUrl) {
                        const videoId = extractYouTubeId(youtubeUrl);
                        if (videoId) {
                            newPost.media = { type: 'youtube', url: `https://www.youtube.com/embed/${videoId}` };
                            savePost(newPost);
                        } else { alert('Invalid YouTube URL.'); return; }
                    } else {
                        handleFileUpload(newPost, 'video');
                    }
                } else {
                    handleFileUpload(newPost, 'image');
                }
            });

            function handleFileUpload(newPost, type) {
                const file = document.getElementById('contentFile').files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        newPost.media = { type: type, url: e.target.result };
                        savePost(newPost);
                    };
                    reader.readAsDataURL(file);
                } else {
                    savePost(newPost);
                }
            }

            function extractYouTubeId(url) {
                const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
                const match = url.match(regExp);
                return (match && match[2].length === 11) ? match[2] : null;
            }

            function savePost(newPost) {
                posts.unshift(newPost);
                localStorage.setItem('safePawsPosts', JSON.stringify(posts));
                resetUploadForm();
                const postsContainer = document.getElementById('postsContainer');
                const postElement = createPostElement(newPost);
                postsContainer.prepend(postElement);
                setTimeout(() => { document.getElementById(`post-${newPost.id}`).scrollIntoView({ behavior: 'smooth', block: 'start' }); }, 100);
                showNotification('Post shared successfully!');
            }

            function resetUploadForm() {
                document.getElementById('uploadForm').reset();
                document.getElementById('mediaPreview').classList.add('hidden');
                document.getElementById('mediaPreview').innerHTML = '';
                document.getElementById('youtubePreview').classList.add('hidden');
                document.getElementById('youtubePreview').innerHTML = '';
                document.getElementById('youtubeUrl').value = '';
                document.querySelector('input[name="contentType"][value="article"]').checked = true;
                document.getElementById('fileUploadSection').classList.remove('hidden');
                document.getElementById('youtubeUploadSection').classList.add('hidden');
            }

            // Content type toggle
            document.querySelectorAll('input[name="contentType"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    const isVideo = this.value === 'video';
                    document.getElementById('fileUploadSection').classList.toggle('hidden', !isVideo);
                    document.getElementById('youtubeUploadSection').classList.toggle('hidden', !isVideo);
                });
            });

            // YouTube URL preview
            document.getElementById('youtubeUrl').addEventListener('input', function(e) {
                const url = e.target.value.trim();
                const preview = document.getElementById('youtubePreview');
                if (url) {
                    const videoId = extractYouTubeId(url);
                    if (videoId) {
                        preview.innerHTML = `<iframe src="https://www.youtube.com/embed/${videoId}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
                        preview.classList.remove('hidden');
                    }
                } else { preview.classList.add('hidden'); }
            });

            // File preview
            document.getElementById('contentFile').addEventListener('change', function(e) {
                const file = e.target.files[0];
                const preview = document.getElementById('mediaPreview');
                if (file) {
                    if (file.size > 50 * 1024 * 1024) { alert('File size exceeds 50MB limit'); this.value = ''; return; }
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        if (file.type.startsWith('video/')) {
                            preview.innerHTML = `<div class="relative"><video controls class="w-full"><source src="${e.target.result}" type="${file.type}"></video><button type="button" onclick="removeMedia()" class="remove-image"><i class="fas fa-times"></i></button></div>`;
                        } else {
                            preview.innerHTML = `<div class="relative"><img src="${e.target.result}" alt="Preview" class="w-full"><button type="button" onclick="removeMedia()" class="remove-image"><i class="fas fa-times"></i></button></div>`;
                        }
                        preview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });

            window.removeMedia = function() {
                document.getElementById('contentFile').value = '';
                document.getElementById('mediaPreview').classList.add('hidden');
                document.getElementById('mediaPreview').innerHTML = '';
            }

            // Edit post form
            document.getElementById('editPostForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const postId = parseInt(document.getElementById('editPostId').value);
                const title = document.getElementById('editPostTitle').value.trim();
                const description = document.getElementById('editPostDescription').value.trim();
                const postIndex = posts.findIndex(p => p.id === postId);
                if (postIndex !== -1) {
                    posts[postIndex].title = title;
                    posts[postIndex].description = description;
                    localStorage.setItem('safePawsPosts', JSON.stringify(posts));
                    const postElement = document.getElementById(`post-${postId}`);
                    if (postElement) {
                        const titleEl = postElement.querySelector('h2.text-2xl');
                        const descEl = postElement.querySelector('p.text-gray-300');
                        if (titleEl) titleEl.textContent = title;
                        if (descEl) descEl.textContent = description;
                    }
                    closeEditModal();
                    showNotification('Post updated successfully!');
                }
            });

            // Edit comment form
            document.getElementById('editCommentForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const commentId = parseInt(document.getElementById('editCommentId').value);
                const postId = parseInt(document.getElementById('editCommentPostId').value);
                const text = document.getElementById('editCommentText').value.trim();
                const postIndex = posts.findIndex(p => p.id === postId);
                if (postIndex === -1) return;
                const commentIndex = posts[postIndex].comments.findIndex(c => c.id === commentId);
                if (commentIndex === -1) return;
                posts[postIndex].comments[commentIndex].text = text;
                posts[postIndex].comments[commentIndex].date = 'Edited just now';
                localStorage.setItem('safePawsPosts', JSON.stringify(posts));
                const commentElement = document.getElementById(`comment-${commentId}`);
                if (commentElement) {
                    const textEl = commentElement.querySelector('p.text-gray-300');
                    const dateEl = commentElement.querySelector('.text-xs.text-gray-400');
                    if (textEl) textEl.textContent = text;
                    if (dateEl) dateEl.textContent = 'Edited just now';
                }
                closeEditCommentModal();
                showNotification('Comment updated successfully!');
            });

            window.closeEditModal = function() { document.getElementById('editPostModal').classList.add('hidden'); }
            window.closeEditCommentModal = function() { document.getElementById('editCommentModal').classList.add('hidden'); }

            function showNotification(message) {
                const notification = document.createElement('div');
                notification.className = 'fixed top-20 right-5 bg-gradient-to-r from-green-600 to-green-800 text-white px-6 py-3 rounded-xl shadow-lg z-50 animate-slide-in';
                notification.innerHTML = `<div class="flex items-center gap-3"><i class="fas fa-check-circle"></i><span>${message}</span></div>`;
                document.body.appendChild(notification);
                setTimeout(() => notification.remove(), 3000);
            }

            // Initialize
            document.addEventListener('DOMContentLoaded', function() {
                renderPosts();

                const fileLabel = document.querySelector('.file-label');
                const fileInput = document.getElementById('contentFile');

                fileLabel.addEventListener('dragover', function(e) { e.preventDefault(); this.style.borderColor = '#0ea5e9'; });
                fileLabel.addEventListener('dragleave', function(e) { e.preventDefault(); this.style.borderColor = ''; });
                fileLabel.addEventListener('drop', function(e) {
                    e.preventDefault(); this.style.borderColor = '';
                    if (e.dataTransfer.files.length) { fileInput.files = e.dataTransfer.files; fileInput.dispatchEvent(new Event('change')); }
                });

                document.querySelectorAll('.modal-overlay').forEach(modal => {
                    modal.addEventListener('click', function(e) { if (e.target === this) this.classList.add('hidden'); });
                });
            });
        </script>
    </body>
</html>
