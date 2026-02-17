<template>
    <div
        class="bg-white border-b-2 border-blue-900 shadow-sm print:border-none font-serif"
    >
        <div class="container mx-auto px-2 py-2">
            <!-- MOBILE VIEW (Simplified) -->
            <div class="md:hidden flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <img
                        src="/img/logofr.jpeg"
                        alt="ACADECOL Logo FR"
                        class="h-14 w-auto object-contain"
                        @dblclick="$emit('leftLogoDblClick')"
                    />
                    <img
                        src="/img/minefop.jpg"
                        alt="MINEFOP Logo"
                        class="h-10 w-auto object-contain"
                    />
                    <img
                        src="/img/logoen.jpeg"
                        alt="ACADECOL Logo EN"
                        class="h-14 w-auto object-contain"
                        @dblclick="$emit('rightLogoDblClick')"
                    />
                </div>
                <div class="text-center space-y-1">
                    <h1
                        class="text-[0.6rem] font-bold uppercase text-gray-900 leading-tight"
                    >
                        Académie Africaine pour le Développement des Compétences
                        Locales – ACADECOL
                    </h1>
                    <p class="text-[0.5rem] font-bold text-gray-700">
                        Arrêté N° : 000644/MINEFOP/SG/DFOP/SDGSF/CSADC/CBAC
                    </p>
                </div>
            </div>

            <!-- DESKTOP VIEW (Formal Layout) -->
            <div class="hidden md:flex flex-col gap-1 w-full max-w-6xl mx-auto">
                <!-- ROW 1: Ministries & Republic -->
                <div
                    class="grid grid-cols-[1fr_auto_1fr] gap-4 items-start pt-2"
                >
                    <!-- Left: French -->
                    <div class="text-center">
                        <h3
                            class="text-xs font-bold uppercase text-gray-900 leading-snug"
                        >
                            République du Cameroun
                        </h3>
                        <p class="text-[0.65rem] italic text-gray-700 mb-1">
                            Paix – Travail – Patrie
                        </p>
                        <h4
                            class="text-[0.7rem] font-bold text-gray-800 leading-tight"
                        >
                            Ministère de l'Emploi et de la<br />Formation
                            Professionnelle
                        </h4>
                    </div>

                    <!-- Center: MINEFOP Logo -->
                    <div class="flex justify-center px-4">
                        <img
                            src="/img/minefop.jpg"
                            alt="MINEFOP Logo"
                            class="h-16 w-auto object-contain"
                        />
                    </div>

                    <!-- Right: English -->
                    <div class="text-center">
                        <h3
                            class="text-xs font-bold uppercase text-gray-900 leading-snug"
                        >
                            Republic of Cameroon
                        </h3>
                        <p class="text-[0.65rem] italic text-gray-700 mb-1">
                            Peace – Work – Fatherland
                        </p>
                        <h4
                            class="text-[0.7rem] font-bold text-gray-800 leading-tight"
                        >
                            Ministry of Employment and<br />Vocational Training
                        </h4>
                    </div>
                </div>

                <!-- ROW 2: Institute Info -->
                <div
                    class="flex items-center justify-between gap-4 mt-2 border-t border-gray-100 pt-2"
                >
                    <!-- Left Logo -->
                    <img
                        src="/img/logofr.jpeg"
                        alt="ACADECOL Logo"
                        class="h-24 w-auto object-contain cursor-pointer"
                        @dblclick="$emit('leftLogoDblClick')"
                    />

                    <!-- Center Info -->
                    <div class="text-center flex-1">
                        <h1
                            class="text-xl font-black uppercase text-gray-900 tracking-wide mb-1"
                        >
                            Académie Africaine pour le Développement des
                            Compétences Locales – ACADECOL
                        </h1>
                        <h2
                            class="text-lg font-bold italic text-gray-800 tracking-wide mb-1"
                        >
                            African Academy for Local Skills Development –
                            A.A.L.S.D
                        </h2>

                        <div class="text-red-600 font-bold text-sm mb-1">
                            Arrêté N° : 000644/MINEFOP/SG/DFOP/SDGSF/CSADC/CBAC
                        </div>

                        <div class="text-gray-900 font-bold text-sm mb-2">
                            Sis à Bafoussam, Entrée Ecole Normale.
                        </div>

                        <div
                            class="flex items-center justify-center gap-6 text-sm font-bold text-blue-900"
                        >
                            <a
                                href="mailto:acadecol25@gmail.com"
                                class="hover:underline"
                                >E.mail : acadecol25@gmail.com</a
                            >
                            <span
                                >Téléphone : (+237) 651 53 23 88 / 691 05 69
                                65</span
                            >
                        </div>
                    </div>

                    <!-- Right Logo -->
                    <img
                        src="/img/logoen.jpeg"
                        alt="ACADECOL Logo"
                        class="h-24 w-auto object-contain cursor-pointer"
                        @dblclick="$emit('rightLogoDblClick')"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineEmits(["leftLogoDblClick", "rightLogoDblClick"]);
</script>

<style scoped>
@media print {
    .container {
        width: 100%;
        max-width: none;
    }
}
</style>
