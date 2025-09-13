<x-header></x-header>

<!-- Registration Process -->
<section id="registration" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Status of Account</h2>
            <p class="text-gray-600 max-w-3xl mx-auto">Kindly wait for our verification team to confirm your account. You
                may provide more information to help the team confirm your record.</p>
        </div>


        <!-- Registration Form -->
        <div class="bg-white rounded text-center shadow-lg p-8 max-w-3xl mx-auto">
            <h3 class="text-2xl text-center font-bold text-gray-800 mb-6">Account Status:



                @if ($status_id == 0)
                    Pending
                @endif



                @if ($status_id == 1)
                    Verified.
                @endif
            </h3>

            @if ($status_id == 1)
                Visit <a style="width: 30%;" href='/member/login'
                    class=" items-center bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">Login
                </a>
                <p>Default Password is 1000</p>
            @endif




            <p>

            </p>
            <br>
            <div class="text-center mb-12">
                <a style="width: 30%;margin-left:35%" href="/logout"
                    class="block items-center bg-primary text-white px-4 py-2 !rounded-button whitespace-nowrap hover:bg-primary/90 transition">Logout
                </a>
                </h4>
            </div>
            {{-- <a href="/membership">Back</a> --}}
        </div>
    </div>
</section>


<!-- Footer -->
<x-footer></x-footer>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ Accordion
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', function() {
                const answer = this.nextElementSibling;
                const icon = this.querySelector('i');

                if (answer.classList.contains('hidden')) {
                    answer.classList.remove('hidden');
                    icon.classList.replace('ri-add-line', 'ri-subtract-line');
                } else {
                    answer.classList.add('hidden');
                    icon.classList.replace('ri-subtract-line', 'ri-add-line');
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Registration Steps Interaction
        const stepItems = document.querySelectorAll('.step-item');
        const stepNumbers = document.querySelectorAll('.step-number');

        stepNumbers.forEach((number, index) => {
            number.addEventListener('click', function() {
                // Reset all steps
                stepItems.forEach(item => {
                    item.classList.remove('active');
                    item.querySelector('.step-number').classList.remove('bg-primary',
                        'text-white');
                    item.querySelector('.step-number').classList.add('bg-gray-200',
                        'text-gray-700');
                });

                // Activate clicked step and all previous steps
                for (let i = 0; i <= index; i++) {
                    stepItems[i].classList.add('active');
                    stepItems[i].querySelector('.step-number').classList.remove('bg-gray-200',
                        'text-gray-700');
                    stepItems[i].querySelector('.step-number').classList.add('bg-primary',
                        'text-white');
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // File Upload Preview
        const fileInput = document.getElementById('certificate');
        const uploadLabel = fileInput.parentElement;

        fileInput.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const fileName = this.files[0].name;
                const filePreview = document.createElement('p');
                filePreview.classList.add('text-primary', 'mt-2');
                filePreview.textContent = `Selected file: ${fileName}`;

                // Remove any existing preview
                const existingPreview = uploadLabel.querySelector('p:not(:first-of-type)');
                if (existingPreview) {
                    uploadLabel.removeChild(existingPreview);
                }

                uploadLabel.appendChild(filePreview);
            }
        });
    });
</script>
</body>

</html>
