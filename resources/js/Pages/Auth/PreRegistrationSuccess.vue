<script setup>
import PublicLayout from "@/Layouts/PublicLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
    preRegistration: Object,
});

const printReceipt = () => {
    window.print();
};

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString("fr-FR", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
};
</script>

<template>
    <PublicLayout>
        <Head title="Préinscription Réussie" />

        <div class="py-8 bg-slate-50 min-h-screen print:bg-white print:py-0">
            <div class="max-w-4xl mx-auto px-4 print:max-w-none print:px-0">
                <!-- Success Message -->
                <div class="text-center mb-6 no-print">
                    <div
                        class="inline-flex items-center justify-center w-12 h-12 bg-green-100 rounded-full mb-3 shadow-sm"
                    >
                        <svg
                            class="w-6 h-6 text-green-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            ></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-black text-slate-900">
                        Préinscription Validée !
                    </h1>
                    <div class="mt-4 flex justify-center">
                        <button
                            @click="printReceipt"
                            class="px-6 py-2 bg-blue-700 text-white font-bold rounded-lg shadow-md hover:bg-blue-800 transition"
                        >
                            Imprimer mon reçu
                        </button>
                    </div>
                </div>

                <!-- Receipt Document -->
                <div
                    id="receipt"
                    class="bg-white shadow-xl rounded-2xl overflow-hidden border border-slate-200 print:shadow-none print:rounded-none print:border-none print:w-full"
                >
                    <!-- Header -->
                    <div
                        class="bg-slate-900 px-8 py-6 text-white flex justify-between items-center print:text-slate-900 print:bg-white print:border-b-2 print:border-slate-900 print:py-4"
                    >
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 bg-white rounded-lg flex items-center justify-center text-slate-900 print:border print:border-slate-200"
                            >
                                <span class="text-2xl">📚</span>
                            </div>
                            <div>
                                <h2
                                    class="text-2xl font-black tracking-tighter"
                                >
                                    ACADECOL
                                </h2>
                                <p
                                    class="text-blue-400 font-bold uppercase text-[10px] tracking-widest print:text-slate-500"
                                >
                                    Institut de Formation Professionnelle
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <div
                                class="text-blue-400 font-bold uppercase text-[10px] tracking-widest print:text-slate-800"
                            >
                                Dossier N°
                            </div>
                            <div class="text-2xl font-mono font-black">
                                {{ preRegistration.registration_number }}
                            </div>
                            <div
                                class="text-slate-400 text-[10px] print:text-slate-500"
                            >
                                Le {{ formatDate(preRegistration.created_at) }}
                            </div>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="px-8 py-6 print:py-4">
                        <!-- Student & Speciality Row -->
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6 border-b border-slate-100 pb-6 print:gap-4 print:mb-4 print:pb-4"
                        >
                            <div>
                                <h3
                                    class="text-slate-900 font-black uppercase text-[10px] tracking-widest mb-3 text-blue-600"
                                >
                                    Identité de l'Étudiant
                                </h3>
                                <div class="space-y-1">
                                    <p
                                        class="text-lg font-black text-slate-900 uppercase"
                                    >
                                        {{ preRegistration.user.name }}
                                    </p>
                                    <p class="text-sm text-slate-600">
                                        Né(e) le :
                                        <span
                                            class="font-bold text-slate-900"
                                            >{{
                                                formatDate(
                                                    preRegistration.birth_date,
                                                )
                                            }}</span
                                        >
                                    </p>
                                    <p class="text-sm text-slate-600">
                                        Sexe :
                                        <span
                                            class="font-bold text-slate-900 uppercase"
                                            >{{
                                                preRegistration.gender === "M"
                                                    ? "Masculin"
                                                    : "Féminin"
                                            }}</span
                                        >
                                    </p>
                                    <p class="text-sm text-slate-600">
                                        Contact :
                                        <span
                                            class="font-bold text-slate-900"
                                            >{{ preRegistration.phone }}</span
                                        >
                                    </p>
                                </div>
                            </div>
                            <div
                                class="bg-blue-50 rounded-xl p-4 border border-blue-100 print:bg-white print:border-slate-300"
                            >
                                <h3
                                    class="text-blue-600 font-black uppercase text-[10px] tracking-widest mb-2"
                                >
                                    Formation Choisie
                                </h3>
                                <p
                                    class="text-xl font-black text-blue-900 leading-tight print:text-slate-900"
                                >
                                    {{
                                        preRegistration.formation.titre.fr ||
                                        preRegistration.formation.titre
                                    }}
                                </p>
                                <div
                                    class="mt-2 inline-block px-3 py-1 bg-blue-600 text-white text-[9px] font-bold uppercase rounded-md print:bg-slate-100 print:text-slate-900 print:border"
                                >
                                    Session 2026
                                </div>
                            </div>
                        </div>

                        <!-- Academic Details Row -->
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6 print:gap-4 print:mb-4"
                        >
                            <div>
                                <h3
                                    class="text-slate-900 font-black uppercase text-[10px] tracking-widest mb-3 text-blue-600"
                                >
                                    Parcours Académique
                                </h3>
                                <div class="space-y-2">
                                    <div
                                        class="flex justify-between text-xs py-1 border-b border-slate-50"
                                    >
                                        <span class="text-slate-500"
                                            >Dernier diplôme</span
                                        >
                                        <span
                                            class="font-bold text-slate-900"
                                            >{{
                                                preRegistration.education_level
                                            }}</span
                                        >
                                    </div>
                                    <div
                                        class="flex justify-between text-xs py-1 border-b border-slate-50"
                                    >
                                        <span class="text-slate-500"
                                            >Établissement</span
                                        >
                                        <span
                                            class="font-bold text-slate-900 truncate ml-4"
                                            >{{
                                                preRegistration.last_school ||
                                                "N/A"
                                            }}</span
                                        >
                                    </div>
                                    <div
                                        class="flex justify-between text-xs py-1"
                                    >
                                        <span class="text-slate-500"
                                            >Résidence</span
                                        >
                                        <span
                                            class="font-bold text-slate-900"
                                            >{{ preRegistration.address }}</span
                                        >
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3
                                    class="text-slate-900 font-black uppercase text-[10px] tracking-widest mb-3 text-blue-600"
                                >
                                    Lieu de l'Entretien
                                </h3>
                                <div
                                    class="p-3 bg-slate-50 rounded-lg border border-slate-100 print:bg-white"
                                >
                                    <p
                                        class="text-[11px] font-bold text-slate-900 mb-1"
                                    >
                                        Cameroun - Bafoussam
                                    </p>
                                    <p
                                        class="text-[10px] text-slate-600 leading-relaxed italic"
                                    >
                                        En face de l'ancienne gare routière
                                        général voyage
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Documents Section -->
                        <div
                            class="border-2 border-slate-900 rounded-xl p-4 bg-slate-900 text-white print:bg-white print:text-slate-900"
                        >
                            <h3
                                class="text-[10px] font-black uppercase tracking-widest mb-3 text-blue-400 print:text-slate-900"
                            >
                                Pièces à fournir pour l'inscription définitive
                            </h3>
                            <ul
                                class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2 text-[10px]"
                            >
                                <li class="flex items-center gap-2">
                                    <span
                                        class="w-1.5 h-1.5 bg-blue-500 rounded-full"
                                    ></span>
                                    01 Photocopie certifiée de l'Acte de
                                    Naissance
                                </li>
                                <li class="flex items-center gap-2">
                                    <span
                                        class="w-1.5 h-1.5 bg-blue-500 rounded-full"
                                    ></span>
                                    01 Photocopie du diplôme ou relevé de notes
                                </li>
                                <li class="flex items-center gap-2">
                                    <span
                                        class="w-1.5 h-1.5 bg-blue-500 rounded-full"
                                    ></span>
                                    02 Photos d'identité 4x4 (fond blanc)
                                </li>
                                <li class="flex items-center gap-2">
                                    <span
                                        class="w-1.5 h-1.5 bg-blue-500 rounded-full"
                                    ></span>
                                    Frais d'inscription (à régler au
                                    secrétariat)
                                </li>
                            </ul>
                        </div>

                        <!-- Legal Mention -->
                        <div
                            class="mt-8 text-center border-t border-slate-100 pt-4 print:mt-4"
                        >
                            <p
                                class="text-[8px] text-slate-400 uppercase tracking-widest font-medium"
                            >
                                Ce reçu de préinscription est valable uniquement
                                pour la session spécifiée. La validation finale
                                dépend de la vérification physique des documents
                                originaux.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-center no-print pb-8">
                    <Link
                        :href="route('home')"
                        class="text-xs text-slate-500 hover:text-blue-700 font-bold transition"
                    >
                        Retourner à l'accueil
                    </Link>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>

<style>
@media print {
    /* Critical A4 optimization */
    @page {
        size: A4;
        margin: 10mm;
    }

    header,
    footer,
    nav,
    .no-print {
        display: none !important;
    }

    body,
    html {
        height: auto;
        background-color: white !important;
        margin: 0 !important;
        padding: 0 !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    #receipt {
        border: 1px solid #000 !important;
        border-radius: 0 !important;
        width: 100% !important;
    }
}
</style>
