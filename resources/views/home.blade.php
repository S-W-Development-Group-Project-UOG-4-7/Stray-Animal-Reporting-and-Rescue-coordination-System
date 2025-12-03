<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SafePaws — A Better World for Every Paw</title>
      @vite('resources/css/app.css')
<style>
            @keyframes paw-touch {
                0%,
                80
                





                10%,
                50% {
                    opacity: 1;
                    transform: translateY(-10px) scale(1.1);
                }
            }

            .animate-paw {
                animation: paw-touch 2s infinite;
            }
            @keyframes paw-tap {
                0%,
                100% {
                    transform: scale(1);
                }
                50% {
                    transform: scale(0.9);
                }
            }
            button svg {
                animation: paw-tap 2s infinite;
            }

            .delay-0 {
                animation-delay: 0s;
            }
            .delay-300 {
                animation-delay: 0.3s;
            }
            .delay-600 {
                animation-delay: 0.6s;
            }
            .delay-900 {
                animation-delay: 0.9s;
            }
            .delay-1200 {
                animation-delay: 1.2s;
            }
            .delay-0 {
                animation-delay: 0s;
            }
            .delay-300 {
                animation-delay: 0.3s;
            }
            .delay-600 {
                animation-delay: 0.6s;
            }
            .delay-900 {
                animation-delay: 0.9s;
            }
            .delay-1200 {
                animation-delay: 1.2s;
            }
            .delay-0 {
                animation-delay: 0s;
            }
            .delay-300 {
                animation-delay: 0.3s;
            }
            .delay-600 {
                animation-delay: 0.6s;
            }
            .delay-900 {
                animation-delay: 0.9s;
            }
            .delay-1200 {
                animation-delay: 1.2s;
            }
            /* Typography helpers converted from your original */
            .title {
                @apply text-[1.75rem] md:text-[3.125rem] leading-[1.05] font-semibold tracking-wide;
            }
            .subtitle {
                @apply text-[1.125rem] md:text-[1.625rem] font-light;
            }

            /* Buttons / UI */
            .primary-btn {
                @apply bg-[#0ea5e9] hover:bg-[#0891b2] text-white px-6 py-3 rounded-md font-medium inline-flex items-center gap-2;
            }
            .outline-btn {
                @apply border border-[#0ea5e9] text-[#0ea5e9] px-5 py-2 rounded-md font-medium;
            }

            /* card */
            .card {
                @apply bg-white/5 p-6 md:p-8 rounded-xl shadow-md;
            }

            /* FAQ / list icons */
            .list-item-icon {
                @apply md:w-6 md:h-6 w-5 h-5 text-white fill-current rotate-45;
            }

            .gray-border {
                @apply border-t-[8px] border-[#0b2447]; /* deep blue for section separators */
            }

            body {
                background-color: #071331; /* deep navy background */
            }
        </style>
    </head>
    <body class="text-white">
        <!-- HERO / NAV -->
        <header class="relative">
            <div
                class="bg-[url('https://images.unsplash.com/photo-1518791841217-8f162f1e1131?q=80&w=1600&auto=format&fit=crop&ixlib=rb-4.0.3&s=3a5a1d5c6b2e9596d3e214d2f0c7a2e2')] bg-cover bg-center md:h-[90vh] h-[70vh] relative"
            >
                <div
                    class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/30 to-black/70"
                ></div>

                <header class="relative z-50">
                    <div
                        class="flex items-center justify-between px-5 py-4 mx-auto max-w-7xl md:px-12"
                    >
                        <!-- Logo -->
                        <a href="#" class="flex items-center gap-3">
                            <svg
                                width="42"
                                height="42"
                                viewBox="0 0 64 64"
                                fill="none"
                                xmlns="https://cdn.pixabay.com/photo/2016/06/15/17/46/feet-1459485_1280.png"
                            >
                                <rect
                                    width="64"
                                    height="64"
                                    rx="12"
                                    fill="#0ea5e9"
                                ></rect>
                                <path
                                    d="M34.5 36c4-1 8.5 0 11 3 2.5 3 1.8 7.4-0.6 10.7C43.9 53 39.6 54 34.5 54c-5 0-9.7-1-12.6-3.8C17.2 47.4 16.4 43 18.9 40c2.7-3.2 6.9-4.2 11.6-4z"
                                    fill="#fff"
                                ></path>
                                <circle
                                    cx="22.5"
                                    cy="20.5"
                                    r="6"
                                    fill="#fff"
                                ></circle>
                                <circle
                                    cx="31.5"
                                    cy="14.5"
                                    r="5"
                                    fill="#fff"
                                ></circle>
                                <circle
                                    cx="43.5"
                                    cy="18.5"
                                    r="4.5"
                                    fill="#fff"
                                ></circle>
                            </svg>
                            <span class="text-xl font-semibold text-white"
                                >SafePaws</span
                            >
                        </a>

                        <!-- Desktop Menu -->
                        <nav
                            class="items-center hidden gap-6 text-sm font-medium text-white md:flex"
                        >
                            <a
                                href="#about"
                                class="transition hover:text-yellow-300"
                                >ABOUT US</a
                            >

                            <!-- OUR TEAM Dropdown -->
                            <div class="relative">
                                <button
                                    class="flex items-center gap-1 transition dropdown-btn hover:text-yellow-300"
                                >
                                    OUR TEAM
                                    <svg
                                        class="w-3 h-3 mt-0.5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 9l-7 7-7-7"
                                        ></path>
                                    </svg>
                                </button>
                                <div
                                    class="absolute left-0 flex-col hidden w-48 mt-2 rounded shadow-lg dropdown top-full bg-blue-500/90 backdrop-blur-sm"
                                >
                                    <a
                                        href="#vet"
                                        class="block px-4 py-2 transition hover:bg-blue-400"
                                        >Vet</a
                                    >
                                    <a
                                        href="#rescue"
                                        class="block px-4 py-2 transition hover:bg-blue-400"
                                        >Rescue Team</a
                                    >
                                </div>
                            </div>

                            <!-- OUR WORK Dropdown -->
                            <div class="relative">
                                <button
                                    class="flex items-center gap-1 transition dropdown-btn hover:text-yellow-300"
                                >
                                    OUR WORK
                                    <svg
                                        class="w-3 h-3 mt-0.5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 9l-7 7-7-7"
                                        ></path>
                                    </svg>
                                </button>
                                <div
                                    class="absolute left-0 flex-col hidden w-64 mt-2 rounded shadow-lg dropdown top-full bg-blue-500/90 backdrop-blur-sm"
                                >
                                    <a
                                        href="#sterilisation"
                                        class="block px-4 py-2 transition hover:bg-blue-400"
                                        >Sterilisation & Adoption</a
                                    >
                                    <a
                                        href="#shelters"
                                        class="block px-4 py-2 transition hover:bg-blue-400"
                                        >Shelters</a
                                    >
                                    <a
                                        href="#vaccinations"
                                        class="block px-4 py-2 transition hover:bg-blue-400"
                                        >Vaccinations & Medication</a
                                    >
                                </div>
                            </div>

                            <!-- GET INVOLVED Dropdown -->
                            <div class="relative">
                                <button
                                    class="flex items-center gap-1 transition dropdown-btn hover:text-yellow-300"
                                >
                                    GET INVOLVED
                                    <svg
                                        class="w-3 h-3 mt-0.5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 9l-7 7-7-7"
                                        ></path>
                                    </svg>
                                </button>
                                <div
                                    class="absolute left-0 flex-col hidden w-64 mt-2 rounded shadow-lg dropdown top-full bg-blue-500/90 backdrop-blur-sm"
                                >
                                    <a
                                        href="#donations"
                                        class="block px-4 py-2 transition hover:bg-blue-400"
                                        >Donations</a
                                    >
                                    <a
                                        href="#adoptions"
                                        class="block px-4 py-2 transition hover:bg-blue-400"
                                        >Adoptions</a
                                    >
                                    <a
                                        href="#sponsor"
                                        class="block px-4 py-2 transition hover:bg-blue-400"
                                        >Sponsor a Dog or Cat</a
                                    >
                                    <a
                                        href="#member"
                                        class="block px-4 py-2 transition hover:bg-blue-400"
                                        >Become a Member</a
                                    >
                                    <a
                                        href="#volunteer"
                                        class="block px-4 py-2 transition hover:bg-blue-400"
                                        >Volunteer</a
                                    >
                                </div>
                            </div>

                            <a
                                href="#news"
                                class="transition hover:text-yellow-300"
                                >NEWS</a
                            >
                            <a
                                href="#contact"
                                class="transition hover:text-yellow-300"
                                >CONTACT US</a
                            >
                        </nav>
                    </div>
                </header>

                <script>
                    // Handle dropdowns
                    document
                        .querySelectorAll(".dropdown-btn")
                        .forEach((btn) => {
                            btn.addEventListener("click", function (e) {
                                e.stopPropagation(); // prevent closing when clicking the button
                                const dropdown = this.nextElementSibling;
                                // Close other dropdowns
                                document
                                    .querySelectorAll(".dropdown")
                                    .forEach((d) => {
                                        if (d !== dropdown)
                                            d.classList.add("hidden");
                                    });
                                dropdown.classList.toggle("hidden");
                            });
                        });

                    // Close dropdown when clicking outside
                    document.addEventListener("click", () => {
                        document
                            .querySelectorAll(".dropdown")
                            .forEach((d) => d.classList.add("hidden"));
                    });
                </script>

                <script>
                    function toggleDropdown(id) {
                        const el = document.getElementById(id);

                        // Close other dropdowns
                        document
                            .querySelectorAll("nav > div > div")
                            .forEach((d) => {
                                if (d.id !== id) d.classList.add("hidden");
                            });

                        el.classList.toggle("hidden"); // Toggle current
                    }
                </script>

                <!-- Hero content -->
                <div
                    class="relative z-20 flex flex-col items-center justify-center text-center w-full h-[70vh] md:h-[75vh] px-5"
                >
                    <h1 class="max-w-screen-sm title">
                        Join the SafePaws community
                    </h1>
                    <p class="mt-3 text-gray-100 subtitle">
                        A Better World for Every Paw
                    </p>
                    <p
                        class="mt-4 md:mt-6 text-[1rem] md:text-[1.15rem] font-light text-gray-200 max-w-xl"
                    >
                        Report animals in need, track rescue progress, adopt
                        verified pets, or volunteer — help us protect & reunite
                        every paw.
                    </p>

                    <div
                        class="flex flex-col items-center gap-4 mt-6 md:flex-row"
                    >
                        <a href="#report" class="primary-btn">
                            <span>Report an Animal</span>
                            <svg
                                class="w-4 h-4"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M5 12h14"
                                    stroke="white"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path
                                    d="M12 5l7 7-7 7"
                                    stroke="white"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </a>
                        <a href="#adopt" class="outline-btn"
                            >Find Pets to Adopt</a
                        >
                    </div>
                </div>
            </div>
        </header>

        <!-- Section: Report lost/abandoned animals -->
        <section id="report" class="gray-border">
            <div
                class="max-w-[1200px] mx-auto px-5 py-16 md:py-20 flex flex-col md:flex-row items-center gap-8"
            >
                <div class="text-center md:w-1/2 md:text-left">
                    <h2 class="mb-4 text-white title">
                        Report lost or abandoned animals
                    </h2>
                    <p class="mb-6 text-gray-200 subtitle">
                        Quickly notify rescuers — share a photo, a last-seen
                        location, and details. Our team will respond and keep
                        you updated.
                    </p>

                    <div class="flex flex-col gap-3 sm:flex-row">
                        <a href="#report-form" class="primary-btn"
                            >Report Now</a
                        >
                        <a href="#track" class="outline-btn">Track a Report</a>
                    </div>
                </div>

                <div class="md:w-1/2">
                    <div class="card">
                        <!-- Simple form mockup; integrate with laravel later -->
                        <form id="report-form" class="space-y-4 text-black">
                            <div>
                                <label class="block mb-1 text-sm font-medium"
                                    >Report Type</label
                                >
                                <select
                                    class="w-full p-2 rounded-md"
                                    name="report_type"
                                >
                                    <option>Stray</option>
                                    <option>Sick</option>
                                    <option>Aggressive</option>
                                </select>
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-medium"
                                    >Location (address or coordinates)</label
                                >
                                <input
                                    type="text"
                                    class="w-full p-2 rounded-md"
                                    placeholder="Street, city or lat,lng"
                                />
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-medium"
                                    >Last Seen</label
                                >
                                <input
                                    type="datetime-local"
                                    class="w-full p-2 rounded-md"
                                />
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-medium"
                                    >Image (photo)</label
                                >
                                <input
                                    type="file"
                                    accept="image/*"
                                    class="w-full"
                                />
                            </div>

                            <div>
                                <label class="block mb-1 text-sm font-medium"
                                    >Details</label
                                >
                                <textarea
                                    class="w-full p-2 rounded-md"
                                    rows="3"
                                    placeholder="Describe the animal..."
                                ></textarea>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="primary-btn">
                                    Submit Report
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Track rescue status -->
        <section id="track" class="gray-border">
            <div
                class="max-w-[1200px] mx-auto px-5 py-16 md:py-20 flex flex-col md:flex-row items-center gap-8"
            >
                <div class="order-2 md:w-1/2 md:order-1">
                    <img
                        src="https://images.unsplash.com/photo-1525253086316-d0c936c814f8?q=80&w=900&auto=format&fit=crop&ixlib=rb-4.0.3&s=8b3b1f8f0f2a046b7db0d8518ae9d7b0"
                        alt="Rescue tracking"
                        class="rounded-xl w-full object-cover h-[300px]"
                    />
                </div>

                <div
                    class="order-1 text-center md:w-1/2 md:order-2 md:text-left"
                >
                    <h2 class="mb-4 title">Track rescue status</h2>
                    <p class="mb-6 text-gray-200 subtitle">
                        Enter your report ID to see live updates from rescuers.
                        Users can view rescue messages, status changes, and
                        final outcomes.
                    </p>

                    <div class="flex gap-3">
                        <input
                            type="text"
                            placeholder="Enter report ID"
                            class="w-full p-3 text-black rounded-md md:w-2/3"
                        />
                        <button class="primary-btn">Track</button>
                    </div>

                    <!-- Mockup status -->
                    <div class="mt-6 card">
                        <div class="text-sm text-gray-200">Last update</div>
                        <div class="mt-2 font-medium">
                            Report #SP-1024 — Assigned to Rescue Team A
                        </div>
                        <div class="mt-1 text-sm text-gray-300">
                            Estimated ETA: 45 minutes
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Adopt verified pets -->
        <section id="adopt" class="gray-border">
            <div class="max-w-[1200px] mx-auto px-5 py-16 md:py-20">
                <div class="mb-10 text-center">
                    <h2 class="title">Adopt verified pets</h2>
                    <p class="max-w-2xl mx-auto text-gray-200 subtitle">
                        Browse animals that are ready for adoption — view
                        profiles, health checks, and request an adoption through
                        our secure form.
                    </p>
                </div>

                <!-- Adoption cards grid (sample) -->
                <div
                    class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3"
                >
                    <!-- Card 1 -->
                    <div class="p-5 bg-white/5 rounded-xl">
                        <img
                            class="object-cover w-full mb-4 rounded-md h-44"
                            src="https://images.unsplash.com/photo-1558944350-b2ec1b2a4b5a?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=2d7b40b3f7f8b0f4a2a1f8e0f2a6ad5b"
                            alt="adopt dog"
                        />
                        <h3 class="text-lg font-semibold">
                            Buddy • Dog • 3 yrs
                        </h3>
                        <p class="mt-1 text-sm text-gray-300">
                            Friendly, vaccinated, neutered.
                        </p>
                        <div class="flex gap-2 mt-4">
                            <button class="primary-btn">
                                Request Adoption
                            </button>
                            <button class="outline-btn">View Profile</button>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="p-5 bg-white/5 rounded-xl">
                        <img
                            class="object-cover w-full mb-4 rounded-md h-44"
                            src="https://images.unsplash.com/photo-1546182990-dffeafbe841d?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=50b6b7d3c6f4f8a1ef0b6f5b8a9c3d1e"
                            alt="adopt cat"
                        />
                        <h3 class="text-lg font-semibold">
                            Mittens • Cat • 2 yrs
                        </h3>
                        <p class="mt-1 text-sm text-gray-300">
                            Calm, indoor cat, litter-trained.
                        </p>
                        <div class="flex gap-2 mt-4">
                            <button class="primary-btn">
                                Request Adoption
                            </button>
                            <button class="outline-btn">View Profile</button>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="p-5 bg-white/5 rounded-xl">
                        <img
                            class="object-cover w-full mb-4 rounded-md h-44"
                            src="https://images.unsplash.com/photo-1525253086316-d0c936c814f8?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=8b3b1f8f0f2a046b7db0d8518ae9d7b0"
                            alt="adopt rabbit"
                        />
                        <h3 class="text-lg font-semibold">
                            Clover • Rabbit • 1 yr
                        </h3>
                        <p class="mt-1 text-sm text-gray-300">
                            Playful and social.
                        </p>
                        <div class="flex gap-2 mt-4">
                            <button class="primary-btn">
                                Request Adoption
                            </button>
                            <button class="outline-btn">View Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Volunteer & donate -->
        <section id="volunteer" class="gray-border">
            <div
                class="max-w-[1200px] mx-auto px-5 py-16 md:py-20 flex flex-col md:flex-row items-center gap-8"
            >
                <div class="md:w-1/2">
                    <h2 class="mb-4 title">Volunteer & donate</h2>
                    <p class="mb-6 text-gray-200 subtitle">
                        Support rescue operations by volunteering or donating
                        supplies. Every contribution helps us respond faster and
                        care better.
                    </p>

                    <div class="flex gap-3">
                        <a href="#" class="primary-btn">Become a Volunteer</a>
                        <a href="#" class="outline-btn">Donate Supplies</a>
                    </div>
                </div>

                <div class="md:w-1/2">
                    <img
                        class="rounded-xl w-full object-cover h-[300px]"
                        src="https://images.unsplash.com/photo-1494256997604-768d1f608cac?q=80&w=1200&auto=format&fit=crop&ixlib=rb-4.0.3&s=f6f3fa2f7b4b2f2f4c6e5c1a2a4d7a7b"
                        alt="volunteer with animals"
                    />
                </div>
            </div>
        </section>

        <!-- FAQ / About -->
        <section class="gray-border">
            <div class="max-w-[1100px] mx-auto px-5 py-16 md:py-20">
                <h2 class="mb-10 text-center title">
                    Frequently Asked Questions
                </h2>
                <ul class="space-y-4">
                    <li class="flex items-center justify-between card">
                        <div>
                            <div class="font-medium">
                                How do I report an animal?
                            </div>
                            <div class="text-sm text-gray-300">
                                Use the Report form above — attach photo,
                                location and last-seen time.
                            </div>
                        </div>
                        <svg
                            id="thin-x"
                            viewBox="0 0 26 26"
                            class="list-item-icon"
                            focusable="true"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M10.5 9.3L1.8 0.5 0.5 1.8 9.3 10.5 0.5 19.3 1.8 20.5 10.5 11.8 19.3 20.5 20.5 19.3 11.8 10.5 20.5 1.8 19.3 0.5 10.5 9.3Z"
                            ></path>
                        </svg>
                    </li>

                    <li class="flex items-center justify-between card">
                        <div>
                            <div class="font-medium">
                                Can I track my report?
                            </div>
                            <div class="text-sm text-gray-300">
                                Yes — every report gets an ID. Use Track to see
                                updates from rescue teams.
                            </div>
                        </div>
                        <svg
                            viewBox="0 0 26 26"
                            class="list-item-icon"
                            focusable="true"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M10.5 9.3L1.8 0.5 0.5 1.8 9.3 10.5 0.5 19.3 1.8 20.5 10.5 11.8 19.3 20.5 20.5 19.3 11.8 10.5 20.5 1.8 19.3 0.5 10.5 9.3Z"
                            ></path>
                        </svg>
                    </li>

                    <li class="flex items-center justify-between card">
                        <div>
                            <div class="font-medium">
                                How does adoption work?
                            </div>
                            <div class="text-sm text-gray-300">
                                Submit an adoption request on the pet profile.
                                Rescue team reviews and schedules visits.
                            </div>
                        </div>
                        <svg
                            viewBox="0 0 26 26"
                            class="list-item-icon"
                            focusable="true"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M10.5 9.3L1.8 0.5 0.5 1.8 9.3 10.5 0.5 19.3 1.8 20.5 10.5 11.8 19.3 20.5 20.5 19.3 11.8 10.5 20.5 1.8 19.3 0.5 10.5 9.3Z"
                            ></path>
                        </svg>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Footer -->
        <footer class="gray-border">
            <div class="max-w-[1000px] mx-auto px-5 py-12 text-gray-300">
                <div
                    class="flex flex-col items-start justify-between gap-6 md:flex-row"
                >
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <!-- small logo -->
                            <svg
                                width="34"
                                height="34"
                                viewBox="0 0 64 64"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect
                                    width="64"
                                    height="64"
                                    rx="12"
                                    fill="#0ea5e9"
                                ></rect>
                                <path
                                    d="M34.5 36c4-1 8.5 0 11 3 2.5 3 1.8 7.4-0.6 10.7C43.9 53 39.6 54 34.5 54c-5 0-9.7-1-12.6-3.8C17.2 47.4 16.4 43 18.9 40c2.7-3.2 6.9-4.2 11.6-4z"
                                    fill="#fff"
                                ></path>
                            </svg>
                            <div>
                                <div class="font-semibold">SafePaws</div>
                                <div class="text-xs text-gray-400">
                                    A Better World for Every Paw
                                </div>
                            </div>
                        </div>
                        <p class="max-w-sm text-sm text-gray-400">
                            SafePaws protects animals and connects the community
                            — report, rescue and adopt with ease.
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-6 mt-4 text-sm md:mt-0">
                        <div>
                            <div class="mb-2 font-medium text-white">
                                Support
                            </div>
                            <div class="text-gray-400">Help Center</div>
                            <div class="text-gray-400">Contact</div>
                            <div class="text-gray-400">Volunteer</div>
                        </div>

                        <div>
                            <div class="mb-2 font-medium text-white">About</div>
                            <div class="text-gray-400">Our Mission</div>
                            <div class="text-gray-400">Privacy</div>
                            <div class="text-gray-400">Terms</div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-xs text-gray-500">
                    © <span id="year"></span> SafePaws. All rights reserved.
                </div>
            </div>
        </footer>

        <script>
            // Footer year
            document.getElementById("year").textContent =
                new Date().getFullYear();

            // Demo report form submit prevention
            const reportForm = document.getElementById("report-form");
            if (reportForm) {
                reportForm.addEventListener("submit", (e) => {
                    e.preventDefault();
                    alert(
                        "Report submitted (demo). Integrate this form with your Laravel API to save reports."
                    );
                });
            }

            // Paw animation for Sign In button
            const button = document.getElementById("signInBtn");
            const paws = document.querySelectorAll(".paw");

            if (button) {
                button.addEventListener("click", () => {
                    paws.forEach((paw, index) => {
                        setTimeout(() => {
                            paw.classList.remove("hidden");
                            paw.classList.add("paw-touch");

                            paw.addEventListener(
                                "animationend",
                                () => {
                                    paw.classList.remove("paw-touch");
                                    paw.classList.add("hidden");
                                },
                                { once: true }
                            );
                        }, index * 300);
                    });
                });
            }
        </script>
    </body>
</html