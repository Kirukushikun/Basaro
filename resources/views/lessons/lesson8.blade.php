<div class="card w-full h-[70vh] min-h-[50vh] flex flex-col relative text-lg">
    {{-- ===== PAGE 1 ===== --}}
        <div x-show="page === 1" class="w-full flex-1 flex flex-col gap-6 px-2">
        <header class="header">
            <h1 class="text-3xl font-bold border-b border-gray-500 pb-4">
                <span class="!text-[#F4C300]">Sesyon 8:</span>
                Pang-unawa sa Binasang Talata

            </h1>
            <h1 class="text-2xl font-bold mt-4">
                Alam mo ba kung ano ang <span class="!text-[#F4C300]">Talata</span>?
            </h1>
            <p class="text-2xl font-semibold !text-gray-200 mt-4">
                Ito ay binubuo ng mga magkakaugnay na pangungusap. Dahil dito ay nakakabuo tayo ng isang kuwento. Narito ang isang halimbawa
            </p>
        </header>
    </div>

    {{-- ===== PAGE 2 ===== --}}
    <div x-show="page === 2" class="w-full flex-1 flex flex-col gap-4 px-2">
        <div class="flex items-center justify-center p-4">
            <div class="bg-gray-800/50 p-6 rounded-lg border-2 border-[#F4C300]">
                <p class="text-2xl font-semibold leading-relaxed text-center">
                    May lobo sa loob ng kotse. Kay Bambi ang asul na lobo. Masaya siya sa lobo niya.
                </p>
            </div>
        </div>

        <header class="header">
            <p class="text-xl font-semibold !text-gray-200">
                Ang unang pangungusap ay
            </p>
        </header>

        <div class="flex items-center">
            <p class="text-2xl font-bold !text-[#F4C300]">
                "May lobo sa loob ng kotse"
            </p>
        </div>

        <header class="header">
            <p class="text-xl font-semibold !text-gray-200">
                Ikalawa ay
            </p>
        </header>

        <div class="flex items-center">
            <p class="text-2xl font-bold !text-[#F4C300]">
                "Kay Bambi ang asul na lobo"
            </p>
        </div>

        <header class="header">
            <p class="text-xl font-semibold !text-gray-200">
                Panghuli ay
            </p>
        </header>

        <div class="flex items-center">
            <p class="text-2xl font-bold !text-[#F4C300]">
                "Masaya siya sa lobo niya"
            </p>
        </div>
    </div>

    {{-- ===== PAGE 3 ===== --}}
    <div x-show="page === 3" class="w-full flex-1 flex flex-col gap-6 px-2">
        <div class="flex-1 flex items-center justify-center">
            <div class="text-center">
                <p class="text-2xl font-semibold !text-gray-200 mb-6">
                    Ilan ang pangungusap na bumbuo sa talatang ito? <br>
                    Sagutin mo nga. Kung tatlo ang iyong sagot, ito ay
                </p>
                <p class="text-8xl font-bold !text-[#F4C300]">
                    TAMA
                </p>
            </div>
        </div>
    </div>

    {{-- ===== PAGE 4 ===== --}}
    <div x-show="page === 4"
        x-data="{
            questions: [
                { text: 'Kanino ang lobo?', answer: 'kay bambi', value: '' },
                { text: 'Anong kulay ang lobo?', answer: 'asul', value: '' },
                { text: 'Sino ang masaya?', answer: 'si bambi', value: '' },
                { text: 'Nasaan ang lobo?', answer: 'sa loob ng kotse', value: '' },
            ],
            normalize(val) {
                return val.toLowerCase().trim()
            }
        }"
        class="w-full flex-1 flex flex-col gap-6 px-2">

        <header class="header">
            <p class="text-2xl font-semibold !text-gray-200">
                Para maunawaan mo ang talata, sagutin mo ang mga sumusunod na tanong.
            </p>
        </header>

        <div class="flex-1 flex flex-col justify-center gap-8 overflow-y-auto p-5">
            <template x-for="(q, index) in questions" :key="index">
                <div class="text-3xl font-bold flex flex-wrap items-center gap-3">

                    <!-- Question -->
                    <span x-text="q.text"></span>

                    <!-- Answer Input -->
                    <input
                        x-model="q.value"
                        type="text"
                        placeholder="iyong sagot"
                        class="min-w-[250px] bg-transparent border-b-4 outline-none transition-colors duration-300"
                        :class="{
                            'border-[#F4C300] text-[#F4C300]':
                                normalize(q.value) === q.answer,

                            'border-red-500 text-red-500':
                                q.value && normalize(q.value) !== q.answer,

                            'border-gray-400 text-gray-200':
                                !q.value
                        }"
                    />
                </div>
            </template>
        </div>
    </div>


    {{-- Navigation Buttons --}}
    @include('partials.lesson-navigation')
</div>