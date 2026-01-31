<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post | SafePaws</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Reuse the same styles from awareness.blade.php -->
    <style type="text/tailwindcss">
        /* Copy all the CSS styles from your awareness.blade.php */
        /* ... paste all the CSS here ... */
        
        /* Add these additional styles for edit page */
        .edit-page-bg {
            background-color: #071331;
            min-height: 100vh;
        }
        
        .edit-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .back-btn {
            background: rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
            border-radius: 10px;
            transition: all 0.3s;
        }
        
        .back-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="edit-page-bg text-white">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50" style="background: rgba(7, 19, 49, 0.85); backdrop-filter: blur(15px); border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
        <div class="edit-container px-5 py-3">
            <div class="flex items-center justify-between">
                <a href="{{ route('awareness') }}" class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 shadow-lg" style="background: linear-gradient(135deg, #0ea5e9, #22d3ee, #67e8f9); border-radius: 12px;">
                        <i class="text-lg text-white fas fa-paw"></i>
                    </div>
                    <div>
                        <span class="text-xl font-bold">SafePaws</span>
                        <div class="text-[10px] text-gray-300 leading-tight">Edit Post</div>
                    </div>
                </a>
                
                <a href="{{ route('awareness') }}" class="back-btn">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Posts
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-32 pb-20">
        <div class="edit-container px-5">
            <div class="max-w-4xl mx-auto">
                <!-- Header -->
                <div class="text-center mb-12 animate-slide-in">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">
                        <span style="background: linear-gradient(90deg, #0ea5e9, #22d3ee, #67e8f9); -webkit-background-clip: text; background-clip: text; color: transparent;">
                            Edit Your Post
                        </span>
                    </h1>
                    <p class="text-xl text-gray-300">Update your content, videos, and YouTube links</p>
                </div>

                <!-- Edit Form -->
                <div id="editFormContainer" class="rounded-2xl p-6 md:p-8" style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1);">
                    <!-- Loading indicator -->
                    <div id="loadingIndicator" class="text-center py-12">
                        <i class="fas fa-paw text-4xl text-cyan-400 animate-pulse"></i>
                        <p class="mt-4 text-gray-300">Loading post data...</p>
                    </div>
                    
                    <!-- Edit form will be inserted here by JavaScript -->
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript -->
    <script>
        // Get post ID from Laravel blade
        const postId = {{ $postId ?? 'null' }};
        let currentPost = null;
        
        document.addEventListener('DOMContentLoaded', function() {
            if (!postId) {
                showError('No post selected for editing');
                setTimeout(() => window.location.href = "{{ route('awareness') }}", 2000);
                return;
            }
            
            loadPostData();
        });
        
        function loadPostData() {
            // Get posts from localStorage
            const posts = JSON.parse(localStorage.getItem('safePawsPosts')) || [];
            currentPost = posts.find(p => p.id === postId);
            
            if (!currentPost) {
                showError('Post not found or may have been deleted');
                setTimeout(() => window.location.href = "{{ route('awareness') }}", 2000);
                return;
            }
            
            // Check if current user is the author
            const currentUser = localStorage.getItem('currentUser') || '';
            if (currentPost.author !== currentUser) {
                showError('You can only edit your own posts');
                setTimeout(() => window.location.href = "{{ route('awareness') }}", 2000);
                return;
            }
            
            // Render edit form
            renderEditForm();
        }
        
        function renderEditForm() {
            const container = document.getElementById('editFormContainer');
            const loadingIndicator = document.getElementById('loadingIndicator');
            
            // Hide loading indicator
            loadingIndicator.style.display = 'none';
            
            // Create edit form HTML
            const tagHTML = getTagHTML(currentPost.type);
            let mediaPreviewHTML = '';
            
            if (currentPost.media) {
                mediaPreviewHTML = `
                    <div class="mb-8 p-4 rounded-xl" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1);">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium" style="background: rgba(14, 165, 233, 0.2); color: #0ea5e9;">
                                    <i class="${getMediaIcon(currentPost.media.type)}"></i>
                                    ${getMediaTypeText(currentPost.media.type)}
                                </span>
                                <span class="text-sm text-gray-300">Current media</span>
                            </div>
                            <button type="button" onclick="removeCurrentMedia()" class="px-3 py-1.5 rounded-lg text-sm font-medium" style="background: rgba(239, 68, 68, 0.2); color: #ef4444; hover:bg-red-500/30 transition-all duration-300;">
                                <i class="fas fa-trash mr-1"></i> Remove
                            </button>
                        </div>
                        <div id="currentMediaPreview" class="rounded-lg overflow-hidden">
                            ${getMediaPreviewHTML(currentPost.media)}
                        </div>
                    </div>
                `;
            }
            
            container.innerHTML = `
                <!-- Post Info -->
                <div class="mb-8 p-4 rounded-xl" style="background: linear-gradient(90deg, rgba(14, 165, 233, 0.1), rgba(34, 211, 238, 0.1));">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <div class="text-sm text-gray-300">Post ID</div>
                            <div class="font-bold">#${currentPost.id}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-300">Author</div>
                            <div class="font-bold">${currentPost.author}</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-300">Created</div>
                            <div class="font-bold">${currentPost.date}</div>
                        </div>
                    </div>
                </div>
                
                <form id="editPostForm" onsubmit="event.preventDefault(); saveEditedPost();">
                    <input type="hidden" id="editPostId" value="${currentPost.id}">
                    
                    <!-- Content Type -->
                    <div class="mb-8">
                        <label class="block mb-3 text-sm font-medium text-gray-300">Content Type</label>
                        <div class="flex gap-2">
                            <button type="button" onclick="changeContentType('article')" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 ${currentPost.type === 'article' ? 'bg-cyan-500/20 text-cyan-400 border border-cyan-500/30' : 'bg-white/5 text-gray-300 hover:bg-white/10'}">
                                <i class="fas fa-newspaper mr-2"></i> Article
                            </button>
                            <button type="button" onclick="changeContentType('video')" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 ${currentPost.type === 'video' ? 'bg-cyan-500/20 text-cyan-400 border border-cyan-500/30' : 'bg-white/5 text-gray-300 hover:bg-white/10'}">
                                <i class="fas fa-video mr-2"></i> Video
                            </button>
                            <button type="button" onclick="changeContentType('image')" class="px-4 py-2 rounded-lg font-medium transition-all duration-300 ${currentPost.type === 'image' ? 'bg-cyan-500/20 text-cyan-400 border border-cyan-500/30' : 'bg-white/5 text-gray-300 hover:bg-white/10'}">
                                <i class="fas fa-image mr-2"></i> Image
                            </button>
                        </div>
                        <input type="hidden" id="contentType" value="${currentPost.type}">
                    </div>
                    
                    <!-- Title -->
                    <div class="mb-6">
                        <label for="editTitle" class="block mb-2 text-sm font-medium text-gray-300">Title *</label>
                        <input type="text" id="editTitle" class="w-full px-4 py-3 rounded-xl text-white placeholder-gray-400" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1);" 
                               value="${escapeHtml(currentPost.title)}" placeholder="Enter post title" required>
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-6">
                        <label for="editDescription" class="block mb-2 text-sm font-medium text-gray-300">Description *</label>
                        <textarea id="editDescription" rows="5" class="w-full px-4 py-3 rounded-xl text-white placeholder-gray-400" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1);" 
                                  placeholder="Describe your post..." required>${escapeHtml(currentPost.description)}</textarea>
                    </div>
                    
                    <!-- Current Media -->
                    ${mediaPreviewHTML}
                    
                    <!-- New Media Upload -->
                    <div class="mb-8">
                        <label class="block mb-3 text-sm font-medium text-gray-300">Update Media (Optional)</label>
                        <p class="mb-4 text-sm text-gray-400">Add new media or replace existing</p>
                        
                        <!-- YouTube URL Section -->
                        <div id="youtubeSection" class="${currentPost.type === 'video' ? '' : 'hidden'} mb-6">
                            <label for="youtubeUrl" class="block mb-2 text-sm font-medium text-gray-300">YouTube Video URL</label>
                            <input type="text" id="youtubeUrl" class="w-full px-4 py-3 rounded-xl text-white placeholder-gray-400 mb-4" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1);" 
                                   placeholder="https://www.youtube.com/watch?v=...">
                            <div id="youtubePreview" class="hidden"></div>
                        </div>
                        
                        <!-- File Upload Section -->
                        <div id="fileUploadSection">
                            <div class="w-full p-8 border-2 border-dashed border-white/20 rounded-xl text-center transition-all duration-300 hover:border-cyan-500/50 hover:bg-white/5 cursor-pointer" id="dropZone" onclick="document.getElementById('fileUpload').click()">
                                <i class="mb-4 text-3xl text-gray-400 fas fa-cloud-upload-alt"></i>
                                <p class="mb-2 text-gray-300" id="uploadText">Choose file or drag & drop</p>
                                <p class="text-sm text-gray-400" id="fileTypeText">${getFileTypeText(currentPost.type)}</p>
                                <input type="file" id="fileUpload" class="hidden" accept="${getFileAccept(currentPost.type)}">
                            </div>
                            <div id="fileName" class="mt-2 text-sm text-gray-400"></div>
                            <div id="mediaPreview" class="hidden mt-4 rounded-xl overflow-hidden max-h-96"></div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-white/10">
                        <button type="submit" class="flex-1 px-8 py-4 rounded-full font-medium transition-all duration-300 hover:scale-105 inline-flex items-center justify-center gap-2" style="background: linear-gradient(135deg, #0ea5e9, #22d3ee, #67e8f9); color: white;">
                            <i class="fas fa-save"></i>
                            Save Changes
                        </button>
                        <button type="button" onclick="previewChanges()" class="flex-1 px-8 py-4 rounded-full font-medium transition-all duration-300 hover:scale-105 inline-flex items-center justify-center gap-2" style="border: 2px solid #0ea5e9; color: #0ea5e9; hover:bg-[#0ea5e9] hover:text-white;">
                            <i class="fas fa-eye"></i>
                            Preview
                        </button>
                        <button type="button" onclick="confirmDelete()" class="flex-1 px-8 py-4 rounded-full font-medium transition-all duration-300 hover:scale-105 inline-flex items-center justify-center gap-2" style="border: 2px solid #ef4444; color: #ef4444; hover:bg-[#ef4444] hover:text-white;">
                            <i class="fas fa-trash"></i>
                            Delete Post
                        </button>
                    </div>
                </form>
            `;
            
            // Setup event listeners for the form
            setupEditFormListeners();
        }
        
        function setupEditFormListeners() {
            // File upload
            const fileInput = document.getElementById('fileUpload');
            const dropZone = document.getElementById('dropZone');
            
            fileInput.addEventListener('change', handleFileSelect);
            
            // Drag and drop
            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.style.borderColor = '#0ea5e9';
                dropZone.style.background = 'rgba(255, 255, 255, 0.1)';
            });
            
            dropZone.addEventListener('dragleave', () => {
                dropZone.style.borderColor = '';
                dropZone.style.background = '';
            });
            
            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.style.borderColor = '';
                dropZone.style.background = '';
                
                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files;
                    handleFileSelect();
                }
            });
            
            // YouTube URL input
            document.getElementById('youtubeUrl')?.addEventListener('input', handleYouTubeInput);
        }
        
        function handleFileSelect() {
            const fileInput = document.getElementById('fileUpload');
            const fileName = document.getElementById('fileName');
            const mediaPreview = document.getElementById('mediaPreview');
            
            if (fileInput.files.length) {
                const file = fileInput.files[0];
                fileName.textContent = `Selected: ${file.name} (${(file.size / (1024*1024)).toFixed(2)}MB)`;
                fileName.style.color = '#0ea5e9';
                
                // Clear YouTube URL if file is uploaded
                const youtubeUrl = document.getElementById('youtubeUrl');
                if (youtubeUrl) youtubeUrl.value = '';
                const youtubePreview = document.getElementById('youtubePreview');
                if (youtubePreview) youtubePreview.classList.add('hidden');
                
                // Create preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (file.type.startsWith('video/')) {
                        mediaPreview.innerHTML = `
                            <video controls class="w-full h-64">
                                <source src="${e.target.result}" type="${file.type}">
                                Your browser does not support the video tag.
                            </video>
                        `;
                    } else {
                        mediaPreview.innerHTML = `
                            <img src="${e.target.result}" alt="Preview" class="w-full h-64 object-cover">
                        `;
                    }
                    mediaPreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
        
        function handleYouTubeInput() {
            const youtubeUrl = document.getElementById('youtubeUrl').value;
            const preview = document.getElementById('youtubePreview');
            
            if (youtubeUrl) {
                const videoId = extractYouTubeId(youtubeUrl);
                if (videoId) {
                    preview.innerHTML = `
                        <div style="position: relative; padding-bottom: 56.25%; height: 0; margin-bottom: 16px; border-radius: 12px; overflow: hidden;">
                            <iframe src="https://www.youtube.com/embed/${videoId}" 
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                            </iframe>
                        </div>
                    `;
                    preview.classList.remove('hidden');
                    
                    // Clear file upload
                    document.getElementById('fileUpload').value = '';
                    document.getElementById('fileName').textContent = '';
                    document.getElementById('mediaPreview').classList.add('hidden');
                }
            } else {
                preview.classList.add('hidden');
            }
        }
        
        function changeContentType(type) {
            document.getElementById('contentType').value = type;
            
            // Update active button
            document.querySelectorAll('#editFormContainer button[onclick^="changeContentType"]').forEach(btn => {
                btn.classList.remove('bg-cyan-500/20', 'text-cyan-400', 'border', 'border-cyan-500/30');
                btn.classList.add('bg-white/5', 'text-gray-300');
            });
            
            const activeBtn = document.querySelector(`#editFormContainer button[onclick="changeContentType('${type}')"]`);
            activeBtn.classList.remove('bg-white/5', 'text-gray-300');
            activeBtn.classList.add('bg-cyan-500/20', 'text-cyan-400', 'border', 'border-cyan-500/30');
            
            // Update file upload text
            document.getElementById('uploadText').textContent = getUploadText(type);
            document.getElementById('fileTypeText').textContent = getFileTypeText(type);
            document.getElementById('fileUpload').setAttribute('accept', getFileAccept(type));
            
            // Show/hide YouTube section
            const youtubeSection = document.getElementById('youtubeSection');
            if (type === 'video') {
                youtubeSection.classList.remove('hidden');
            } else {
                youtubeSection.classList.add('hidden');
            }
            
            // Clear uploads when changing type
            document.getElementById('fileUpload').value = '';
            document.getElementById('fileName').textContent = '';
            document.getElementById('mediaPreview').classList.add('hidden');
            const youtubeUrl = document.getElementById('youtubeUrl');
            if (youtubeUrl) youtubeUrl.value = '';
            const youtubePreview = document.getElementById('youtubePreview');
            if (youtubePreview) youtubePreview.classList.add('hidden');
        }
        
        function saveEditedPost() {
            const title = document.getElementById('editTitle').value.trim();
            const description = document.getElementById('editDescription').value.trim();
            const contentType = document.getElementById('contentType').value;
            
            if (!title || !description) {
                alert('Please fill in all required fields');
                return;
            }
            
            // Get posts from localStorage
            const posts = JSON.parse(localStorage.getItem('safePawsPosts')) || [];
            const postIndex = posts.findIndex(p => p.id === postId);
            
            if (postIndex === -1) {
                showError('Post not found');
                return;
            }
            
            // Update post
            posts[postIndex].title = title;
            posts[postIndex].description = description;
            posts[postIndex].type = contentType;
            posts[postIndex].date = 'Updated just now';
            
            // Handle media updates
            const youtubeUrl = document.getElementById('youtubeUrl')?.value.trim();
            const fileInput = document.getElementById('fileUpload');
            
            if (youtubeUrl) {
                const videoId = extractYouTubeId(youtubeUrl);
                if (videoId) {
                    posts[postIndex].media = {
                        type: 'youtube',
                        url: `https://www.youtube.com/embed/${videoId}`
                    };
                } else {
                    alert('Please enter a valid YouTube URL');
                    return;
                }
            } else if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    posts[postIndex].media = {
                        type: file.type.startsWith('video/') ? 'uploaded_video' : 'image',
                        url: e.target.result
                    };
                    completeSave(posts);
                };
                
                reader.readAsDataURL(file);
            } else {
                // Check if media was removed
                const currentMediaSection = document.querySelector('[id^="currentMediaSection"]');
                if (!currentMediaSection || currentMediaSection.classList.contains('hidden')) {
                    delete posts[postIndex].media;
                }
                completeSave(posts);
            }
            
            function completeSave(updatedPosts) {
                localStorage.setItem('safePawsPosts', JSON.stringify(updatedPosts));
                
                showNotification('Post updated successfully!');
                
                setTimeout(() => {
                    window.location.href = "{{ route('awareness') }}";
                }, 1500);
            }
        }
        
        function removeCurrentMedia() {
            if (confirm('Remove current media from this post?')) {
                const currentMediaPreview = document.getElementById('currentMediaPreview');
                const currentMediaSection = document.querySelector('[id^="currentMediaSection"]');
                
                if (currentMediaPreview) currentMediaPreview.innerHTML = '<p class="text-gray-400 p-4">Media removed</p>';
                if (currentMediaSection) currentMediaSection.classList.add('hidden');
                
                showNotification('Media removed');
            }
        }
        
        function previewChanges() {
            // Create a simple preview
            const title = document.getElementById('editTitle').value.trim();
            const description = document.getElementById('editDescription').value.trim();
            
            alert(`Preview:\n\nTitle: ${title || 'No title'}\n\nDescription: ${description || 'No description'}\n\n(Full preview would show media and formatting)`);
        }
        
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this post? This action cannot be undone.')) {
                const posts = JSON.parse(localStorage.getItem('safePawsPosts')) || [];
                const updatedPosts = posts.filter(p => p.id !== postId);
                
                localStorage.setItem('safePawsPosts', JSON.stringify(updatedPosts));
                
                showNotification('Post deleted successfully!');
                
                setTimeout(() => {
                    window.location.href = "{{ route('awareness') }}";
                }, 1500);
            }
        }
        
        // Helper functions
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
        
        function getTagHTML(type) {
            switch(type) {
                case 'article': return '<span class="px-3 py-1 rounded-full text-xs font-semibold" style="background: linear-gradient(90deg, #8b5cf6, #7c3aed); color: white;"><i class="fas fa-newspaper mr-1"></i> Article</span>';
                case 'video': return '<span class="px-3 py-1 rounded-full text-xs font-semibold" style="background: linear-gradient(90deg, #ef4444, #dc2626); color: white;"><i class="fas fa-video mr-1"></i> Video</span>';
                case 'image': return '<span class="px-3 py-1 rounded-full text-xs font-semibold" style="background: linear-gradient(90deg, #10b981, #059669); color: white;"><i class="fas fa-image mr-1"></i> Image</span>';
                default: return '';
            }
        }
        
        function getMediaIcon(type) {
            switch(type) {
                case 'youtube': return 'fab fa-youtube';
                case 'uploaded_video': return 'fas fa-video';
                case 'image': return 'fas fa-image';
                default: return 'fas fa-file';
            }
        }
        
        function getMediaTypeText(type) {
            switch(type) {
                case 'youtube': return 'YouTube Video';
                case 'uploaded_video': return 'Uploaded Video';
                case 'image': return 'Image';
                default: return 'Media';
            }
        }
        
        function getMediaPreviewHTML(media) {
            if (!media) return '';
            
            switch(media.type) {
                case 'youtube':
                    return `
                        <div style="position: relative; padding-bottom: 56.25%; height: 0;">
                            <iframe src="${media.url}" 
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                            </iframe>
                        </div>
                    `;
                case 'uploaded_video':
                    return `
                        <video controls class="w-full h-64">
                            <source src="${media.url}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    `;
                case 'image':
                    return `<img src="${media.url}" alt="Current media" class="w-full h-64 object-cover">`;
                default:
                    return '';
            }
        }
        
        function getUploadText(type) {
            switch(type) {
                case 'video': return 'Choose video file or drag & drop';
                case 'image': return 'Choose image file or drag & drop';
                default: return 'Choose file or drag & drop';
            }
        }
        
        function getFileTypeText(type) {
            switch(type) {
                case 'video': return 'MP4, MOV, AVI up to 50MB';
                case 'image': return 'JPG, PNG, GIF up to 50MB';
                default: return 'Images & Videos up to 50MB';
            }
        }
        
        function getFileAccept(type) {
            switch(type) {
                case 'video': return 'video/*';
                case 'image': return 'image/*';
                default: return 'image/*,video/*';
            }
        }
        
        function extractYouTubeId(url) {
            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
            const match = url.match(regExp);
            return (match && match[2].length === 11) ? match[2] : null;
        }
        
        function showNotification(message) {
            // Create notification element
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 16px 24px;
                border-radius: 12px;
                background: linear-gradient(90deg, #10b981, #059669);
                color: white;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
                z-index: 1000;
                animation: slideIn 0.3s ease-out;
            `;
            
            notification.innerHTML = `
                <div class="flex items-center gap-3">
                    <i class="fas fa-check-circle"></i>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
        
        function showError(message) {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 16px 24px;
                border-radius: 12px;
                background: linear-gradient(90deg, #ef4444, #dc2626);
                color: white;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
                z-index: 1000;
                animation: slideIn 0.3s ease-out;
            `;
            
            notification.innerHTML = `
                <div class="flex items-center gap-3">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    </script>
</body>
</html>