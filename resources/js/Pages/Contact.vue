<template>
    <PublicLayout>
        <Head title="Nous Contacter">
            <meta
                name="description"
                content="Contactez ACADECOL à Bafoussam. Téléphone, WhatsApp, Email ou rendez-nous visite pour votre inscription."
            />
            <meta
                property="og:title"
                content="Contact - ACADECOL | Académie Africaine Bilingue"
            />
            <meta
                property="og:description"
                content="Besoin d'informations ? Notre équipe est à votre écoute. Contactez-nous pour en savoir plus sur nos formations."
            />
        </Head>
        <!-- Hero Section -->
        <section
            class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-16"
        >
            <div class="container mx-auto px-4">
                <h1 class="text-5xl font-bold mb-4">Nous Contacter</h1>
                <p class="text-xl text-blue-100">
                    Nous sommes à votre écoute. N'hésitez pas à nous écrire !
                </p>
            </div>
        </section>

        <!-- Contact Information & Form -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-6">
                            Informations
                        </h3>

                        <div class="space-y-6">
                            <div class="flex gap-4">
                                <div class="text-2xl flex-shrink-0">📍</div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">
                                        Adresse
                                    </h4>
                                    <p class="text-gray-600">
                                        Bafoussam, Cameroun<br />En face de
                                        l'ancienne gare routière général voyage
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="text-2xl flex-shrink-0">📱</div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">
                                        Téléphone
                                    </h4>
                                    <p class="text-gray-600">
                                        <a
                                            href="tel:+237677000000"
                                            class="hover:text-blue-600"
                                            >+237 6 77 00 00 00</a
                                        >
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="text-2xl flex-shrink-0">📧</div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">
                                        Email
                                    </h4>
                                    <p class="text-gray-600">
                                        <a
                                            href="mailto:info@acadecol.cm"
                                            class="hover:text-blue-600"
                                            >info@acadecol.cm</a
                                        >
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <div class="text-2xl flex-shrink-0">🕒</div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">
                                        Horaires
                                    </h4>
                                    <p class="text-gray-600">
                                        Lun - Ven: 8h00 - 17h00
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="md:col-span-2">
                        <form @submit.prevent="submitForm" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                        >Nom</label
                                    >
                                    <input
                                        v-model="form.name"
                                        type="text"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                        >Email</label
                                    >
                                    <input
                                        v-model="form.email"
                                        type="email"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                        >Téléphone</label
                                    >
                                    <input
                                        v-model="form.phone"
                                        type="tel"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-semibold text-gray-700 mb-2"
                                        >Sujet</label
                                    >
                                    <select
                                        v-model="form.subject"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    >
                                        <option value="">
                                            -- Sélectionner --
                                        </option>
                                        <option value="formation">
                                            Formation
                                        </option>
                                        <option value="inscription">
                                            Inscription
                                        </option>
                                        <option value="autre">Autre</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                    >Message</label
                                >
                                <textarea
                                    v-model="form.message"
                                    rows="5"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    required
                                ></textarea>
                            </div>

                            <button
                                type="submit"
                                class="w-full px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition"
                            >
                                Envoyer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-4 max-w-3xl">
                <h2 class="text-4xl font-bold text-center text-gray-900 mb-12">
                    Questions Fréquentes
                </h2>

                <div class="space-y-4">
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">
                            Comment s'inscrire ?
                        </h3>
                        <p class="text-gray-600">
                            Vous pouvez vous preinscrire directement sur notre
                            site ou nous contacter par téléphone. et vous
                            inscrit par la suite a l'école.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">
                            Offrez-vous des paiements en plusieurs tranches ?
                        </h3>
                        <p class="text-gray-600">
                            Oui ! Nous proposons des plans de paiement
                            flexibles. Contactez-nous pour plus d'infos.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">
                            Les formations sont-elles certifiantes ?
                        </h3>
                        <p class="text-gray-600">
                            Oui, toutes nos formations incluent des
                            certifications reconnues.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";

const form = ref({
    name: "",
    email: "",
    phone: "",
    subject: "",
    message: "",
});

const submitForm = () => {
    console.log("Formulaire envoyé:", form.value);
    alert("Merci ! Votre message a été envoyé.");
    form.value = { name: "", email: "", phone: "", subject: "", message: "" };
};
</script>
