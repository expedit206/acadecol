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
            <div class="hidden md:flex flex-col gap-1 w-full mx-auto justify-center ">
                <!-- ROW 1: Ministries & Republic -->
                <div
                    class="flex justify-between px-8 gap-4 items-center pt-2"
                >
                    <!-- Left: French -->
                    <div class="text-center w-1/3">
                        <h3
                            class="text-lg font-bold uppercase text-gray-900 leading-snug"
                        >
                            République du Cameroun
                        </h3>
                        <p class="text-[0.7rem] italic text-gray-700 mb-1">
                            Paix – Travail – Patrie
                        </p>
                        <h4
                            class="text-[.9rem]  font-bold text-gray-700 leading-tight"
                        >
                            Ministère de l'Emploi et de la Formation <br />
                            Professionnelle
                        </h4>
                    </div>

                    <!-- Center: MINEFOP Logo -->
                    <div class="flex justify-center px-4 ">
                        <img
                            src="/img/minefop.jpg"
                            alt="MINEFOP Logo"
                            class="h-[9rem] w-[9rem] "
                        />
                    </div>

                    <!-- Right: English -->
                    <div class="text-center w-1/3">
                        <h3
                            class="text-lg font-bold uppercase text-gray-900 leading-snug"
                        >
                            Republic of Cameroon
                        </h3>
                        <p class="text-[0.7rem] italic text-gray-700 mb-1">
                            Peace – Work – Fatherland
                        </p>
                        <h4
                            class="text-[0.9rem] font-bold text-gray-800 leading-tight"
                        >
                            Ministry of Employment and Vocational <br /> Training
                        </h4>
                    </div>
                </div>

                <!-- ROW 2: Institute Info -->
                <div
                    class="flex items-center justify-between gap-4 mt-2 border-t border-gray-100 pt-2 px-6"
                >
                    <!-- Left Logo -->
                    <img
                        src="/img/logofr.jpeg"
                        alt="ACADECOL Logo"
                        class="h-[10rem] object-contain cursor-pointer"
                        @dblclick="$emit('leftLogoDblClick')"
                    />

                    <!-- Center Info -->
                    <div class="text-center flex-1 px-1">
                        <h1
                            class="text-[1rem] font-black uppercase text-gray-900 tracking-wide mb-1"
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
                        class="h-[10rem] w-auto object-contain cursor-pointer"
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
