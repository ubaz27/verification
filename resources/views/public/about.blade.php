<x-header>
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .timeline-item:nth-child(odd) {
            flex-direction: row;
        }

        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-item:nth-child(odd) .timeline-content {
            text-align: right;
            padding-right: 2rem;
        }

        .timeline-item:nth-child(even) .timeline-content {
            text-align: left;
            padding-left: 2rem;
        }

        @media (max-width: 768px) {
            .timeline-item {
                flex-direction: column !important;
            }

            .timeline-item .timeline-content {
                text-align: left !important;
                padding-left: 2rem !important;
                padding-right: 0 !important;
            }

            .nav-link {
                position: relative;
            }

            .nav-link::after {
                content: '';
                position: absolute;
                width: 0;
                height: 2px;
                bottom: -4px;
                left: 0;
                background-color: #00a0b0;
                transition: width 0.3s ease;
            }

            .nav-link:hover::after {
                width: 100%;
            }

            .nav-link.active::after {
                width: 100%;
            }
        }


        p {
            text-align: justify;
        }
    </style>
</x-header>

<!-- Hero Banner -->
<section class="relative h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('img/bukaa6.jpg') }}" alt="BUK Campus" class="w-full h-full object-cover object-top">
        <div class="absolute inset-0 bg-primary/60"></div>
    </div>
    <div class="container mx-auto px-4 z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">About Us</h1>
        <p class="text-xl md:text-2xl text-white/90 font-light" style="text-align:center;">Nigerian Institute of Transport
            Technology (NITT), Zaria
        </p>
    </div>
</section>

<!-- Introduction Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Nigerian Institute of Transport Technology (NITT), Zaria
            </h2>
            <p class="text-gray-700 mb-6 leading-relaxed text-justify">The Nigerian Institute of Transport Technology
                (NITT), Zaria, is the apex management development institute for transport and logistics in Nigeria and
                the West African sub-region. Established on March 14, 1986, NITT plays a critical role in the
                professionalization and development of the transport sector through training, research, consultancy, and
                transport intelligence activities.</p>
            <p class="text-gray-700 leading-relaxed text-justify">NITT provides comprehensive training across all modes
                of transport including air, rail, road, maritime, and pipeline transport. The institute awards
                certificates, diplomas, advanced diplomas, postgraduate diplomas, and master's degrees in transport and
                logistics fields. It aims to equip transport personnel with the skills and knowledge necessary to
                improve efficiency and productivity in the transport industry.</p>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="grid md:grid-cols-2 gap-8">
                <div
                    class="bg-white p-8 rounded shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
                    <div class="w-16 h-16 flex items-center justify-center bg-primary/10 rounded-full mb-6">
                        <i class="ri-focus-3-line ri-2x text-primary"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
                    <p class="text-gray-700 flex-grow text-justify">
                        To systematically provide and offer research and consultancy services to private and public
                        transport agencies for the achievement of management excellence in all modes of transport in
                        Nigeria and the West African Sub-region. </p>
                </div>
                <div
                    class="bg-white p-8 rounded shadow-md hover:shadow-lg transition-shadow duration-300 flex flex-col h-full">
                    <div class="w-16 h-16 flex items-center justify-center bg-secondary/10 rounded-full mb-6">
                        <i class="ri-eye-line ri-2x text-secondary"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
                    <p class="text-gray-700 flex-grow text-justify">
                        The Nigerian Institute of Transport Technology has a vision to become an internationally
                        recognized center of excellence, providing world-class professional training, research, advice,
                        and solutions to all issues relating to transportation in Nigeria and Africa.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Objectives Section -->


<!-- Footer -->
<x-footer></x-footer>

<script></script>
</body>

</html>
