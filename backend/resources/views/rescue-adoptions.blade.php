<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafePaws - Adoption</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #1a365d;
            --secondary: #2d74da;
            --accent: #e53e3e;
            --light: #f7fafc;
            --dark: #2d3748;
            --gray: #718096;
            --light-blue: #ebf8ff;
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
        }

        /* Header & Navigation - Dark Blue Theme */
        header {
            background: var(--primary);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .top-bar {
            background: rgba(0, 0, 0, 0.2);
            color: white;
            padding: 6px 20px;
            font-size: 0.85rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar i {
            margin-right: 5px;
            color: var(--secondary);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .logo-icon {
            background: var(--secondary);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        .logo-text {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            letter-spacing: 0.5px;
        }

        .logo-text span {
            color: var(--secondary);
        }

        nav {
            flex-grow: 1;
            margin-left: 40px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2px;
        }

        .nav-links li {
            position: relative;
        }

        .nav-links a {
            display: block;
            padding: 14px 20px;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            transition: all 0.3s ease;
            border-radius: 4px;
            font-size: 0.95rem;
        }

        .nav-links a:hover {
            color: white;
            background: rgba(45, 116, 218, 0.2);
        }

        .nav-links a.active {
            color: white;
            background: var(--secondary);
        }

        .nav-icons {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-left: 20px;
        }

        .nav-icons i {
            font-size: 1.2rem;
            color: white;
            cursor: pointer;
            transition: color 0.3s;
        }

        .nav-icons i:hover {
            color: var(--secondary);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            cursor: pointer;
        }

        .user-profile img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid var(--secondary);
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--light-blue);
        }

        .page-title {
            font-size: 2.2rem;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-title i {
            color: var(--accent);
            background: rgba(229, 62, 62, 0.1);
            padding: 12px;
            border-radius: 50%;
        }

        .filter-bar {
            display: flex;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
            border-left: 5px solid var(--secondary);
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-width: 180px;
        }

        .filter-group label {
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 8px;
            font-weight: 600;
        }

        select, input {
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-size: 1rem;
            background: white;
            color: var(--dark);
            transition: border 0.3s;
        }

        select:focus, input:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(45, 116, 218, 0.1);
        }

        .search-btn {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px 25px;
            font-weight: 600;
            cursor: pointer;
            align-self: flex-end;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .search-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        /* Animal Cards */
        .section-title {
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-blue);
        }

        .animals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .animal-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .animal-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
            border-color: var(--secondary);
        }

        .animal-img-container {
            height: 220px;
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .animal-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .animal-card:hover .animal-img {
            transform: scale(1.05);
        }

        .animal-status {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .animal-info {
            padding: 25px;
        }

        .animal-name {
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .animal-breed {
            color: var(--secondary);
            font-size: 1rem;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .animal-description {
            color: var(--gray);
            margin-bottom: 20px;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .animal-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .detail-icon {
            background: var(--light-blue);
            color: var(--secondary);
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .detail-text {
            display: flex;
            flex-direction: column;
        }

        .detail-label {
            color: var(--gray);
            font-size: 0.8rem;
        }

        .detail-value {
            font-weight: 600;
            color: var(--dark);
        }

        .adopt-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 14px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .adopt-btn:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        /* Adoption Process */
        .process-section {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.08);
            margin-bottom: 50px;
            border-top: 5px solid var(--secondary);
        }

        .process-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .process-step {
            text-align: center;
            padding: 25px;
            border-radius: 10px;
            background: var(--light-blue);
            transition: transform 0.3s;
        }

        .process-step:hover {
            transform: translateY(-5px);
        }

        .step-number {
            background: var(--primary);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0 auto 20px;
        }

        .step-title {
            color: var(--primary);
            margin-bottom: 12px;
            font-size: 1.3rem;
        }

        /* Footer */
        footer {
            background: var(--primary);
            color: white;
            padding: 50px 20px 20px;
            margin-top: 60px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h3 {
            font-size: 1.4rem;
            margin-bottom: 25px;
            color: white;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--secondary);
        }

        .footer-section p {
            margin-bottom: 20px;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.7;
        }

        .footer-contact i {
            color: var(--secondary);
            margin-right: 10px;
            width: 20px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-links a:hover {
            color: var(--secondary);
            padding-left: 5px;
        }

        .copyright {
            text-align: center;
            padding-top: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
            padding: 35px;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            animation: modalFade 0.3s;
        }

        @keyframes modalFade {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 1.8rem;
            cursor: pointer;
            color: var(--gray);
            transition: color 0.3s;
        }

        .close-modal:hover {
            color: var(--accent);
        }

        .modal-title {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.95rem;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 14px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            background: #f8fafc;
            transition: all 0.3s;
        }

        .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            outline: none;
            border-color: var(--secondary);
            background: white;
            box-shadow: 0 0 0 3px rgba(45, 116, 218, 0.1);
        }

        .submit-application {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 16px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .submit-application:hover {
            background: var(--secondary);
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            nav {
                margin-left: 0;
                width: 100%;
            }
            
            .nav-links {
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .animals-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .filter-group {
                min-width: 100%;
            }
            
            .process-grid {
                grid-template-columns: 1fr;
            }
        }

        .url-display {
            font-size: 0.85rem;
            color: var(--gray);
            background: var(--light-blue);
            padding: 8px 15px;
            border-radius: 6px;
            border-left: 4px solid var(--secondary);
            margin-top: 10px;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="top-bar">
            <div><i class="fas fa-phone"></i> (123) 456-7890 | <i class="fas fa-envelope"></i> contact@safepaws.org</div>
            <div><i class="fas fa-clock"></i> Mon-Fri: 9AM-6PM, Sat: 10AM-4PM</div>
        </div>
        <div class="header-content">
            <a href="/" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="logo-text">Safe<span>Paws</span></div>
            </a>
            
            <nav>
                <ul class="nav-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="/animal-reports">Animal Reports</a></li>
                    <li><a href="/animals">Animals</a></li>
                    <li><a href="/adoption" class="active">Adoption</a></li>
                    <li><a href="/rescue-team">Rescue Team</a></li>
                </ul>
            </nav>
            
            <div class="nav-icons">
                <i class="fas fa-search" title="Search"></i>
                <i class="fas fa-bell" title="Notifications"></i>
                <div class="user-profile">
                    <i class="fas fa-user-circle"></i>
                    <span>User</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="page-header">
            <h1 class="page-title"><i class="fas fa-heart"></i> Find Your New Best Friend</h1>
            <div class="url-display">Current URL: 127.0.0.1:8000/adoption</div>
        </div>

        <p style="font-size: 1.1rem; margin-bottom: 30px; color: var(--gray); line-height: 1.7;">Browse our adorable animals looking for their forever homes. Each one has been cared for by our rescue team and is ready to become part of your family. Use the filters below to find your perfect match.</p>

        <!-- Filter Section -->
        <div class="filter-bar">
            <div class="filter-group">
                <label for="animal-type"><i class="fas fa-paw"></i> Animal Type</label>
                <select id="animal-type">
                    <option value="all">All Animals</option>
                    <option value="dog">Dogs</option>
                    <option value="cat">Cats</option>
                    <option value="rabbit">Rabbits</option>
                    <option value="bird">Birds</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="age"><i class="fas fa-birthday-cake"></i> Age</label>
                <select id="age">
                    <option value="all">Any Age</option>
                    <option value="puppy">Puppy/Kitten (0-1 year)</option>
                    <option value="young">Young (1-3 years)</option>
                    <option value="adult">Adult (3-8 years)</option>
                    <option value="senior">Senior (8+ years)</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="size"><i class="fas fa-weight"></i> Size</label>
                <select id="size">
                    <option value="all">Any Size</option>
                    <option value="small">Small (0-20 lbs)</option>
                    <option value="medium">Medium (20-50 lbs)</option>
                    <option value="large">Large (50+ lbs)</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="gender"><i class="fas fa-venus-mars"></i> Gender</label>
                <select id="gender">
                    <option value="all">Any Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <button class="search-btn"><i class="fas fa-search"></i> Search Animals</button>
        </div>

        <!-- Animals Grid -->
        <h2 class="section-title">Animals Available for Adoption</h2>
        <div class="animals-grid">
            <!-- Animal Card 1 -->
            <div class="animal-card">
                <div class="animal-img-container">
                    <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Golden Retriever" class="animal-img">
                    <div class="animal-status">Available</div>
                </div>
                <div class="animal-info">
                    <h3 class="animal-name">Max <span style="color: var(--accent); font-size: 1rem;">#SP001</span></h3>
                    <p class="animal-breed">Golden Retriever</p>
                    <p class="animal-description">Friendly and energetic, loves playing fetch and going for long walks. Great with kids and other pets. Vaccinated and neutered.</p>
                    <div class="animal-details">
                        <div class="detail-item">
                            <div class="detail-icon"><i class="fas fa-birthday-cake"></i></div>
                            <div class="detail-text">
                                <span class="detail-label">Age</span>
                                <span class="detail-value">3 years</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon"><i class="fas fa-weight"></i></div>
                            <div class="detail-text">
                                <span class="detail-label">Size</span>
                                <span class="detail-value">Large</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon"><i class="fas fa-venus-mars"></i></div>
                            <div class="detail-text">
                                <span class="detail-label">Gender</span>
                                <span class="detail-value">Male</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon"><i class="fas fa-home"></i></div>
                            <div class="detail-text">
                                <span class="detail-label">Location</span>
                                <span class="detail-value">Kennel A</span>
                            </div>
                        </div>
                    </div>
                    <button class="adopt-btn" data-animal="Max"><i class="fas fa-heart"></i> Adopt Max</button>
                </div>
            </div>

            <!-- Animal Card 2 -->
            <div class="animal-card">
                <div class="animal-img-container">
                    <img src="https://images.unsplash.com/photo-1514888286974-6d03bde4ba04?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Tabby Cat" class="animal-img">
                    <div class="animal-status">Available</div>
                </div>
                <div class="animal-info">
                    <h3 class="animal-name">Luna <span style="color: var(--accent); font-size: 1rem;">#SP002</span></h3>
                    <p class="animal-breed">Tabby Cat</p>
                    <p class="animal-description">A calm and affectionate cat who enjoys lounging in sunny spots and gentle petting. Litter trained, vaccinated, and spayed.</p>
                    <div class="animal-details">
                        <div class="detail-item">
                            <div class="detail-icon"><i class="fas fa-birthday-cake"></i></div>
                            <div class="detail-text">
                                <span class="detail-label">Age</span>
                                <span class="detail-value">2 years</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon"><i class="fas fa-weight"></i></div>
                            <div class="detail-text">
                                <span class="detail-label">Size</span>
                                <span class="detail-value">Small</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon"><i class="fas fa-venus-mars"></i></div>
                            <div class="detail-text">
                                <span class="detail-label">Gender</span>
                                <span class="detail-value">Female</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon"><i class="fas fa-home"></i></div>
                            <div class="detail-text">
                                <span class="detail-label">Location</span>
                                <span class="detail-value">Cat Room B</span>
                            </div>
                        </div>
                    </div>
                    <button class="adopt-btn" data-animal="Luna"><i class="fas fa-heart"></i> Adopt Luna</button>
                </div>
            </div>

            <!-- Animal Card 3 -->
            <div class="animal-card">
                <div class="animal-img-container">
                    <img src="https://images.unsplash.com/photo-1593627010886-d34828365da7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Rabbit" class="animal-img">
                    <div class="animal-status">Available</div>
                </div>
                <div class="animal-info">
                    <h3 class="animal-name">Coco <span style="color: var(--accent); font-size: 1rem;">#SP003</span></h3>
                    <p class="animal-breed">Holland Lop Rabbit</p>
                    <p class="animal-description">A gentle and curious rabbit who enjoys exploring and munching on fresh vegetables. Already spayed and litter trained.</p>
                    <div class="animal-details">
                        <div class="detail-item">
                            <div class="detail-icon"><i class="fas fa-birthday-cake"></i></div>
                            <div class="detail-text">
                                <span class="detail-label">Age</span>
                                <span class="detail-value">1 year</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon"><i class="fas fa-weight"></i></div>
                            <div class="detail-text">
                                <span class="detail-label">Size</span>
                                <span class="detail-value">Small</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon"><i class="fas fa-venus-mars"></i></div>
                            <div class="detail-text">
                                <span class="detail-label">Gender</span>
                                <span class="detail-value">Female</span>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon"><i class="fas fa-home"></i></div>
                            <div class="detail-text">
                                <span class="detail-label">Location</span>
                                <span class="detail-value">Small Pets Area</span>
                            </div>
                        </div>
                    </div>
                    <button class="adopt-btn" data-animal="Coco"><i class="fas fa-heart"></i> Adopt Coco</button>
                </div>
            </div>
        </div>

        <!-- Adoption Process -->
        <div class="process-section">
            <h2 class="section-title">Our Adoption Process</h2>
            <div class="process-grid">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Browse & Select</h3>
                    <p>View our available animals online or visit our shelter to meet them in person.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Submit Application</h3>
                    <p>Complete our adoption application form either online or at the shelter.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Screening & Meet</h3>
                    <p>Our team reviews your application and schedules a meet-and-greet.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h3 class="step-title">Home Check & Finalize</h3>
                    <p>We conduct a home visit and finalize the adoption paperwork.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>SafePaws</h3>
                <p>Providing shelter, care, and new beginnings for animals in need since 2010. Our mission is to rescue, rehabilitate, and rehome animals while promoting responsible pet ownership.</p>
                <div class="footer-contact">
                    <p><i class="fas fa-map-marker-alt"></i> 123 Rescue Street, Animal City, AC 12345</p>
                    <p><i class="fas fa-phone"></i> (123) 456-7890</p>
                    <p><i class="fas fa-envelope"></i> contact@safepaws.org</p>
                </div>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="/"><i class="fas fa-chevron-right"></i> Home</a></li>
                    <li><a href="/dashboard"><i class="fas fa-chevron-right"></i> Dashboard</a></li>
                    <li><a href="/animal-reports"><i class="fas fa-chevron-right"></i> Animal Reports</a></li>
                    <li><a href="/animals"><i class="fas fa-chevron-right"></i> Animals</a></li>
                    <li><a href="/adoption"><i class="fas fa-chevron-right"></i> Adoption</a></li>
                    <li><a href="/rescue-team"><i class="fas fa-chevron-right"></i> Rescue Team</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Adoption Resources</h3>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Adoption Requirements</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Adoption Fees</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Pet Care Guides</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> FAQ</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Volunteer Opportunities</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Donate</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2023 SafePaws Animal Rescue. All rights reserved. | Current URL: 127.0.0.1:8000/adoption</p>
        </div>
    </footer>

    <!-- Adoption Application Modal -->
    <div class="modal" id="adoptionModal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2 class="modal-title"><i class="fas fa-file-alt"></i> Adoption Application</h2>
            <p>You're applying to adopt <span id="selectedAnimal" style="font-weight: bold; color: var(--secondary);">Max</span>. Please fill out the form below.</p>
            
            <div class="form-group">
                <label for="applicantName">Full Name *</label>
                <input type="text" id="applicantName" placeholder="Enter your full name" required>
            </div>
            
            <div class="form-group">
                <label for="applicantEmail">Email Address *</label>
                <input type="email" id="applicantEmail" placeholder="Enter your email" required>
            </div>
            
            <div class="form-group">
                <label for="applicantPhone">Phone Number *</label>
                <input type="tel" id="applicantPhone" placeholder="Enter your phone number" required>
            </div>
            
            <div class="form-group">
                <label for="applicantAddress">Home Address *</label>
                <input type="text" id="applicantAddress" placeholder="Enter your address" required>
            </div>
            
            <div class="form-group">
                <label for="housingType">Housing Type *</label>
                <select id="housingType" required>
                    <option value="">Select housing type</option>
                    <option value="house">House</option>
                    <option value="apartment">Apartment</option>
                    <option value="condo">Condo</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="applicantExperience">Previous Pet Experience</label>
                <textarea id="applicantExperience" rows="3" placeholder="Tell us about your experience with pets"></textarea>
            </div>
            
            <button class="submit-application"><i class="fas fa-paper-plane"></i> Submit Application</button>
        </div>
    </div>

    <script>
        // Modal functionality
        const adoptButtons = document.querySelectorAll('.adopt-btn');
        const modal = document.getElementById('adoptionModal');
        const closeModal = document.querySelector('.close-modal');
        const selectedAnimalSpan = document.getElementById('selectedAnimal');
        
        adoptButtons.forEach(button => {
            button.addEventListener('click', () => {
                const animalName = button.getAttribute('data-animal');
                selectedAnimalSpan.textContent = animalName;
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            });
        });
        
        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
        
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
        
        // Form submission
        const submitBtn = document.querySelector('.submit-application');
        submitBtn.addEventListener('click', () => {
            const name = document.getElementById('applicantName').value;
            const email = document.getElementById('applicantEmail').value;
            const phone = document.getElementById('applicantPhone').value;
            const address = document.getElementById('applicantAddress').value;
            const housing = document.getElementById('housingType').value;
            
            if (name && email && phone && address && housing) {
                alert(`Thank you, ${name}! Your application for ${selectedAnimalSpan.textContent} has been submitted. We'll contact you at ${email} within 2-3 business days.`);
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
                
                // Reset form
                document.getElementById('applicantName').value = '';
                document.getElementById('applicantEmail').value = '';
                document.getElementById('applicantPhone').value = '';
                document.getElementById('applicantAddress').value = '';
                document.getElementById('housingType').value = '';
                document.getElementById('applicantExperience').value = '';
            } else {
                alert('Please fill in all required fields marked with *.');
            }
        });
        
        // Filter button functionality
        const searchBtn = document.querySelector('.search-btn');
        searchBtn.addEventListener('click', () => {
            const type = document.getElementById('animal-type').value;
            const age = document.getElementById('age').value;
            const size = document.getElementById('size').value;
            const gender = document.getElementById('gender').value;
            
            // Show filtered results animation
            const animalCards = document.querySelectorAll('.animal-card');
            animalCards.forEach(card => {
                card.style.opacity = '0.5';
                card.style.transform = 'scale(0.95)';
            });
            
            setTimeout(() => {
                animalCards.forEach(card => {
                    card.style.opacity = '1';
                    card.style.transform = 'scale(1)';
                });
                alert(`Showing results for: ${type !== 'all' ? type : 'all'} animals, ${age !== 'all' ? age : 'any'} age, ${size !== 'all' ? size : 'any'} size, ${gender !== 'all' ? gender : 'any'} gender.`);
            }, 300);
        });
        
        // Add active state to current page in nav
        document.addEventListener('DOMContentLoaded', () => {
            const currentPage = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-links a');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPage) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>