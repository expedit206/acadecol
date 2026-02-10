<template>
    <div
        class="bg-white border-b-2 border-blue-200 shadow-sm print:border-none"
    >
        <div class="container mx-auto px-2 py-3">
            <div
                class="flex flex-col md:flex-row items-center justify-between gap-2 md:gap-8"
            >
                <!-- Mobile: Logos Row -->
                <div
                    class="flex items-center justify-between w-full md:w-auto md:hidden px-1"
                >
                    <img
                        src="/img/logofr.jpeg"
                        alt="ACADECOL Logo FR"
                        class="h-16 w-auto object-contain"
                    />

                    <div class="text-center flex-1 space-y-1">
                    <!-- Coat of Arms -->
                  
                    <h1
                        class="text-[3px] font-extrabold text-gray-900 uppercase leading-snug tracking-wide"
                    >
                        Institut de Formation Professionnelle – ACADECOL
                    </h1>
                    <h2
                        class="text-[3px] md:text-xs font-bold text-gray-800 uppercase leading-snug tracking-wide"
                    >
                        Vocational Training Institute – A.A.L.S.D
                    </h2>
                    </div>
                    <img
                        src="/img/logoen.jpeg"
                        alt="ACADECOL Logo EN"
                        class="h-16 w-auto object-contain"
                    />
                </div>

                <!-- Desktop: Left Logo -->
                <div class="hidden md:block flex-shrink-0">
                    <img
                        src="/img/logofr.jpeg"
                        alt="ACADECOL Logo FR"
                        class="h-20 w-auto md:h-20 object-contain"
                    />
                </div>

                <!-- Center Text -->
                <div class="text-center flex-1 space-y-1">
                    <!-- Coat of Arms -->
                  
                    <h1
                        class="hidden md:block  text-[3px] md:text-xs font-extrabold text-gray-900 uppercase leading-snug tracking-wide"
                    >
                        Institut de Formation Professionnelle – ACADECOL
                    </h1>
                    <h2
                        class=" hidden md:block     text-[3px] md:text-xs font-bold text-gray-800 uppercase leading-snug tracking-wide"
                    >
                        Vocational Training Institute – A.A.L.S.D
                    </h2>

                    <div
                        class="inline-block border-b-2 border-gray-900 pb-0.5 mt-1"
                    >
                        <p
                            class="text-[3px] md:text-xs font-bold text-gray-700"
                        >
                            Arrêté N° : 000644/MINEFOP/SG/DFOP/SDGSF/CSADC/CBAC
                        </p>
                    </div>

                    <p
                        class="text-[5px] md:text-sm font-semibold text-gray-600 mt-1"
                    >
                        Sis à Bafoussam, Entrée Ecole Normale.
                    </p>
                </div>

                <!-- Desktop: Right Logo -->
                <div class="hidden md:block flex-shrink-0">
                    <img
                        src="/img/logoen.jpeg"
                        alt="ACADECOL Logo EN"
                        class="h-20 w-auto md:h-20 object-contain"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
// No props needed for this static banner
</script>

<style scoped>
@media print {
    .container {
        width: 100%;
        max-width: none;
    }
}
</style>
