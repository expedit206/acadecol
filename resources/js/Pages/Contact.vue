<template>
    <PublicLayout>
        <Head :title="t.meta.title[locale]">
            <meta name="description" :content="t.meta.desc[locale]" />
        </Head>

        <!-- HERO SECTION - Moderne et minimaliste -->
        <section
            class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white overflow-hidden"
        >
            <!-- Éléments décoratifs -->
            <div class="absolute inset-0 opacity-5">
                <div
                    class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"
                ></div>
                <div
                    class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/3 translate-y-1/3"
                ></div>
            </div>

            <!-- Pattern points -->
            <div
                class="absolute inset-0 opacity-10"
                style="
                    background-image: radial-gradient(
                        circle at 2px 2px,
                        white 1px,
                        transparent 1px
                    );
                    background-size: 24px 24px;
                "
            ></div>

            <div class="container mx-auto px-4 py-8 md:py-8 relative">
                <div class="max-w-3xl mx-auto text-center">
                    <!-- Badge -->
                    <div
                        class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full border border-white/20 mb-6"
                    >
                        <span
                            class="w-1.5 h-1.5 bg-yellow-400 rounded-full animate-pulse"
                        ></span>
                        <span
                            class="text-xs font-semibold uppercase tracking-wider"
                            >{{ t.hero.badge[locale] }}</span
                        >
                    </div>

                    <!-- Titre -->
                    <h1 class="text-xl md:text-3xl lg:text-5xl font-bold">
                        {{ t.hero.title[locale] }}
                        <span class="text-yellow-300">{{
                            t.hero.titleHighlight[locale]
                        }}</span>
                    </h1>

                    <!-- Description -->
                    <p
                        class="text-lg md:text-xl text-blue-100 mb-8 max-w-2xl mx-auto"
                    >
                        {{ t.hero.desc[locale] }}
                    </p>

                    <!-- Stats rapides -->
                    <div class="flex flex-wrap justify-center gap-6 md:gap-10">
                        <div class="text-center">
                            <div class="text-sm text-yellow-300 mb-1">
                                {{ t.hero.stats.responseLabel[locale] }}
                            </div>
                            <div
                                class="text-lg md:text-2xl font-bold text-white"
                            >
                                {{ t.hero.stats.responseValue[locale] }}
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="text-sm text-yellow-300 mb-1">
                                {{ t.hero.stats.availabilityLabel[locale] }}
                            </div>
                            <div
                                class="text-lg md:text-2xl font-bold text-white"
                            >
                                {{ t.hero.stats.availabilityValue[locale] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CONTACT SECTION - Design moderne -->
        <section class="py-8 md:py-12 bg-white">
            <div class="container mx-auto px-4">
                <!-- En-tête de section -->
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span
                        class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full mb-4"
                    >
                        {{ t.methods.badge[locale] }}
                    </span>
                    <h2
                        class="text-2xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        {{ t.methods.title[locale] }}
                        <span class="text-blue-600">{{
                            t.methods.titleHighlight[locale]
                        }}</span>
                    </h2>
                    <p class="text-gray-600 text-sm md:text-base">
                        {{ t.methods.desc[locale] }}
                    </p>
                </div>

                <!-- Cartes de contact -->
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-16"
                >
                    <!-- WhatsApp -->
                    <a
                        href="https://wa.me/237691056965"
                        target="_blank"
                        class="group bg-gradient-to-br from-green-500 to-green-600 p-6 rounded-xl text-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300"
                    >
                        <div class="flex items-start justify-between">
                            <div>
                                <div class="text-3xl mb-3">💬</div>
                                <h3 class="text-lg font-bold mb-1">
                                    {{ t.methods.whatsapp.title[locale] }}
                                </h3>
                                <p class="text-green-100 text-sm mb-2">
                                    {{ t.methods.whatsapp.desc[locale] }}
                                </p>
                                <div class="text-xs text-green-100">
                                    +237 691 05 69 65
                                </div>
                            </div>
                            <span
                                class="text-2xl opacity-0 group-hover:opacity-100 transition-all transform group-hover:translate-x-1"
                                >→</span
                            >
                        </div>
                    </a>

                    <!-- Téléphone -->
                    <a
                        href="tel:+237691056965"
                        class="group bg-gradient-to-br from-blue-500 to-blue-600 p-6 rounded-xl text-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300"
                    >
                        <div class="flex items-start justify-between">
                            <div>
                                <div class="text-3xl mb-3">📞</div>
                                <h3 class="text-lg font-bold mb-1">
                                    {{ t.methods.phone.title[locale] }}
                                </h3>
                                <p class="text-blue-100 text-sm mb-2">
                                    {{ t.methods.phone.desc[locale] }}
                                </p>
                                <div class="text-xs text-blue-100">
                                    +237 691 05 69 65
                                </div>
                            </div>
                            <span
                                class="text-2xl opacity-0 group-hover:opacity-100 transition-all transform group-hover:translate-x-1"
                                >→</span
                            >
                        </div>
                    </a>

                    <!-- Email -->
                    <a
                        href="mailto:info@acadecol.cm"
                        class="group bg-gradient-to-br from-purple-500 to-purple-600 p-6 rounded-xl text-white hover:shadow-xl hover:-translate-y-1 transition-all duration-300"
                    >
                        <div class="flex items-start justify-between">
                            <div>
                                <div class="text-3xl mb-3">📧</div>
                                <h3 class="text-lg font-bold mb-1">
                                    {{ t.methods.email.title[locale] }}
                                </h3>
                                <p class="text-purple-100 text-sm mb-2">
                                    {{ t.methods.email.desc[locale] }}
                                </p>
                                <div class="text-xs text-purple-100">
                                    info@acadecol.cm
                                </div>
                            </div>
                            <span
                                class="text-2xl opacity-0 group-hover:opacity-100 transition-all transform group-hover:translate-x-1"
                                >→</span
                            >
                        </div>
                    </a>

                    <!-- Localisation -->
                    <div
                        class="group bg-gradient-to-br from-gray-700 to-gray-800 p-6 rounded-xl text-white"
                    >
                        <div class="flex items-start justify-between">
                            <div>
                                <div class="text-3xl mb-3">📍</div>
                                <h3 class="text-lg font-bold mb-1">
                                    {{ t.methods.location.title[locale] }}
                                </h3>
                                <p class="text-gray-300 text-sm mb-2">
                                    {{ t.methods.location.desc[locale] }}
                                </p>
                                <div class="text-xs text-gray-300">
                                    {{ t.methods.location.country[locale] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grille principale : Carte + Formulaire -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- MAP / LOCALISATION - Iframe Google Maps intégré -->
                    <div
                        class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100"
                    >
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-lg font-bold text-gray-900">
                                {{ t.map.title[locale] }}
                            </h3>
                            <p class="text-sm text-gray-500">
                                {{ t.map.address[locale] }}
                            </p>
                        </div>

                        <!-- Iframe Google Maps - Responsive et sans bordure -->
                        <div class="relative w-full h-80 md:h-96">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d992.8799973612561!2d10.404056747014586!3d5.489501783309361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x105f9a8d728f79b1%3A0x6386e25eee0c1741!2sGENERAL%20EXPRESS%20VOYAGES!5e0!3m2!1sfr!2scm!4v1771190342967!5m2!1sfr!2scm"
                                class="absolute top-0 left-0 w-full h-full"
                                style="border: 0"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Localisation ACADECOL - GENERAL EXPRESS VOYAGES, Bafoussam"
                            >
                            </iframe>
                        </div>

                        <!-- Lien Google Maps -->
                        <div
                            class="p-3 bg-gray-50 border-t border-gray-100 text-center"
                        >
                            <a
                                href="https://maps.app.goo.gl/zXzJ52Vk4Z1mA3Fq5"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-xs text-blue-600 hover:text-blue-800 inline-flex items-center gap-1"
                            >
                                <i class="fas fa-external-link-alt"></i>
                                {{ t.map.openLink[locale] }}
                            </a>
                        </div>
                    </div>

                    <!-- FORMULAIRE DE CONTACT - Design moderne -->
                    <div
                        class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 md:p-8"
                    >
                        <h3 class="text-xl font-bold text-gray-900 mb-1">
                            {{ t.form.title[locale] }}
                        </h3>
                        <p class="text-sm text-gray-500 mb-6">
                            {{ t.form.subtitle[locale] }}
                        </p>

                        <form @submit.prevent="submitForm" class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-xs font-semibold text-gray-700 mb-1"
                                        >{{
                                            t.form.fields.name.label[locale]
                                        }}</label
                                    >
                                    <input
                                        v-model="form.name"
                                        type="text"
                                        required
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm"
                                        :placeholder="
                                            t.form.fields.name.placeholder[
                                                locale
                                            ]
                                        "
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-semibold text-gray-700 mb-1"
                                        >{{
                                            t.form.fields.email.label[locale]
                                        }}</label
                                    >
                                    <input
                                        v-model="form.email"
                                        type="email"
                                        required
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm"
                                        :placeholder="
                                            t.form.fields.email.placeholder[
                                                locale
                                            ]
                                        "
                                    />
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-xs font-semibold text-gray-700 mb-1"
                                        >{{
                                            t.form.fields.phone.label[locale]
                                        }}</label
                                    >
                                    <input
                                        v-model="form.phone"
                                        type="tel"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm"
                                        :placeholder="
                                            t.form.fields.phone.placeholder[
                                                locale
                                            ]
                                        "
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-semibold text-gray-700 mb-1"
                                        >{{
                                            t.form.fields.subject.label[locale]
                                        }}</label
                                    >
                                    <select
                                        v-model="form.subject"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm"
                                    >
                                        <option value="">
                                            {{
                                                t.form.fields.subject.options
                                                    .default[locale]
                                            }}
                                        </option>
                                        <option value="formation">
                                            {{
                                                t.form.fields.subject.options
                                                    .training[locale]
                                            }}
                                        </option>
                                        <option value="inscription">
                                            {{
                                                t.form.fields.subject.options
                                                    .registration[locale]
                                            }}
                                        </option>
                                        <option value="autre">
                                            {{
                                                t.form.fields.subject.options
                                                    .other[locale]
                                            }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-semibold text-gray-700 mb-1"
                                    >{{
                                        t.form.fields.message.label[locale]
                                    }}</label
                                >
                                <textarea
                                    v-model="form.message"
                                    rows="4"
                                    required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition text-sm resize-none"
                                    :placeholder="
                                        t.form.fields.message.placeholder[
                                            locale
                                        ]
                                    "
                                ></textarea>
                            </div>

                            <button
                                type="submit"
                                class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition-all hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-2"
                            >
                                <span>{{ t.form.submit[locale] }}</span>
                                <i class="fas fa-paper-plane text-sm"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ SECTION - Design moderne -->
        <section class="py-8 md:py-12 bg-gray-50">
            <div class="container mx-auto px-4 max-w-4xl">
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span
                        class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full mb-4"
                    >
                        {{ t.faq.badge[locale] }}
                    </span>
                    <h2
                        class="text-2xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
                        {{ t.faq.title[locale] }}
                        <span class="text-blue-600">{{
                            t.faq.titleHighlight[locale]
                        }}</span>
                    </h2>
                </div>

                <div class="grid gap-3">
                    <div
                        v-for="(faq, idx) in faqs"
                        :key="idx"
                        class="bg-white border border-gray-100 rounded-xl overflow-hidden hover:border-blue-200 transition-all"
                    >
                        <button
                            @click="toggleFaq(idx)"
                            class="w-full px-6 py-4 text-left flex justify-between items-center"
                        >
                            <span
                                class="font-semibold text-gray-900 text-sm md:text-base"
                                >{{ faq.q }}</span
                            >
                            <span
                                class="w-6 h-6 rounded-full bg-gray-50 flex items-center justify-center"
                            >
                                <i
                                    class="fas fa-chevron-down text-xs text-gray-500"
                                    :class="{ 'rotate-180': openedFaq === idx }"
                                ></i>
                            </span>
                        </button>
                        <div
                            v-show="openedFaq === idx"
                            class="px-6 pb-4 text-sm text-gray-600 border-t border-gray-100 pt-3"
                        >
                            {{ faq.a }}
                        </div>
                    </div>
                </div>

                <!-- Contact rapide -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-500 mb-3">
                        {{ t.faq.notfound[locale] }}
                    </p>
                    <a
                        href="https://wa.me/237691056965"
                        target="_blank"
                        class="inline-flex items-center gap-2 bg-green-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-600 transition-all hover:shadow-lg"
                    >
                        <i class="fab fa-whatsapp"></i>
                        {{ t.faq.whatsapp[locale] }}
                    </a>
                </div>
            </div>
        </section>

        <!-- CTA SECTION -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4 text-center">
                <div class="max-w-2xl mx-auto">
                    <span class="text-4xl mb-4 block">🎓</span>
                    <h3
                        class="text-xl md:text-2xl font-bold text-gray-900 mb-2"
                    >
                        {{ t.cta.subtitle[locale] }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-6">
                        {{ t.cta.desc[locale] }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <Link
                            href="/formations"
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
                        >
                            {{ t.cta.button[locale] }}
                        </Link>
                        <a
                            href="tel:+237691056965"
                            class="border border-gray-300 text-gray-700 px-6 py-3 rounded-lg font-semibold hover:border-blue-600 hover:text-blue-600 transition"
                        >
                            <i class="fas fa-phone-alt mr-2"></i
                            >{{ t.cta.call[locale] }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayyout>
</template>

<script setup>
import { ref, computed } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import { useLocale } from "@/Composables/useLocale";

const { locale } = useLocale();

const t = {
    meta: {
        title: { fr: "Nous Contacter", en: "Contact Us" },
        desc: {
            fr: "Contactez ACADECOL à Bafoussam. Téléphone, WhatsApp, Email ou rendez-nous visite pour votre inscription.",
            en: "Contact ACADECOL in Bafoussam. Phone, WhatsApp, Email or visit us for your registration.",
        },
    },
    hero: {
        badge: { fr: "Support 24/7", en: "24/7 Support" },
        title: { fr: "On reste", en: "Let's stay" },
        titleHighlight: { fr: "en contact", en: "in touch" },
        desc: {
            fr: "Une question ? Une inscription ? Notre équipe est là pour vous accompagner.",
            en: "A question? A registration? Our team is here to support you.",
        },
        stats: {
            responseLabel: {
                fr: "⏱️ Temps de réponse",
                en: "⏱️ Response time",
            },
            responseValue: { fr: "< 15 min", en: "< 15 min" },
            availabilityLabel: {
                fr: "📞 Disponibilité",
                en: "📞 Availability",
            },
            availabilityValue: { fr: "24/7", en: "24/7" },
        },
    },
    methods: {
        badge: { fr: "Comment nous joindre", en: "How to reach us" },
        title: { fr: "Plusieurs façons de", en: "Multiple ways to" },
        titleHighlight: { fr: "discuter", en: "chat" },
        desc: {
            fr: "Choisissez la méthode qui vous convient le mieux. Nous répondons généralement en moins de 15 minutes.",
            en: "Choose the method that suits you best. We usually respond in less than 15 minutes.",
        },
        whatsapp: {
            title: { fr: "WhatsApp", en: "WhatsApp" },
            desc: { fr: "Réponse instantanée", en: "Instant response" },
        },
        phone: {
            title: { fr: "Téléphone", en: "Phone" },
            desc: { fr: "Lun-Ven 8h-17h", en: "Mon-Fri 8am-5pm" },
        },
        email: {
            title: { fr: "Email", en: "Email" },
            desc: { fr: "Réponse sous 24h", en: "Response within 24h" },
        },
        location: {
            title: { fr: "Bafoussam", en: "Bafoussam" },
            desc: {
                fr: "En face de l'ancienne gare",
                en: "Opposite the old bus station",
            },
            country: { fr: "Cameroun", en: "Cameroon" },
        },
    },
    map: {
        title: { fr: "Notre emplacement", en: "Our Location" },
        address: {
            fr: "Bafoussam, en face de l'ancienne gare routière général voyage",
            en: "Bafoussam, opposite the old General Voyage bus station",
        },
        openLink: { fr: "Ouvrir dans Google Maps", en: "Open in Google Maps" },
    },
    form: {
        title: { fr: "Envoyez-nous un message", en: "Send us a message" },
        subtitle: {
            fr: "Remplissez le formulaire ci-dessous",
            en: "Fill out the form below",
        },
        fields: {
            name: {
                label: { fr: "Nom complet", en: "Full Name" },
                placeholder: { fr: "Ex: Jean Dupont", en: "Ex: John Doe" },
            },
            email: {
                label: { fr: "Email", en: "Email" },
                placeholder: { fr: "jean@email.com", en: "john@email.com" },
            },
            phone: {
                label: { fr: "Téléphone", en: "Phone" },
                placeholder: { fr: "+237 6XX XXX XXX", en: "+237 6XX XXX XXX" },
            },
            subject: {
                label: { fr: "Sujet", en: "Subject" },
                options: {
                    default: { fr: "Sélectionner", en: "Select" },
                    training: { fr: "Formation", en: "Training" },
                    registration: { fr: "Inscription", en: "Registration" },
                    other: { fr: "Autre", en: "Other" },
                },
            },
            message: {
                label: { fr: "Message", en: "Message" },
                placeholder: {
                    fr: "Bonjour, je souhaite avoir plus d'informations sur...",
                    en: "Hello, I would like more information about...",
                },
            },
        },
        submit: { fr: "Envoyer le message", en: "Send message" },
        success: {
            fr: "Merci ! Votre message a été envoyé. Nous vous répondrons dans les plus brefs délais.",
            en: "Thank you! Your message has been sent. We will reply as soon as possible.",
        },
    },
    faq: {
        badge: { fr: "Questions fréquentes", en: "Frequently Asked Questions" },
        title: { fr: "Tout ce que vous devez", en: "Everything you need to" },
        titleHighlight: { fr: "savoir", en: "know" },
        items: [
            {
                q: {
                    fr: "Comment s'inscrire à une formation ?",
                    en: "How to register for a training?",
                },
                a: {
                    fr: "Vous pouvez vous préinscrire directement sur notre site via le formulaire de contact, nous contacter par téléphone au +237 691 05 69 65, ou passer directement à notre bureau à Bafoussam pour finaliser votre inscription.",
                    en: "You can pre-register directly on our site via the contact form, contact us by phone at +237 691 05 69 65, or come directly to our office in Bafoussam to finalize your registration.",
                },
            },
            {
                q: {
                    fr: "Proposez-vous des paiements en plusieurs fois ?",
                    en: "Do you offer installment payments?",
                },
                a: {
                    fr: "Oui ! Nous offrons des plans de paiement flexibles adaptés à votre budget. Contactez-nous pour discuter des options disponibles selon la formation choisie.",
                    en: "Yes! We offer flexible payment plans tailored to your budget. Contact us to discuss available options depending on the chosen training.",
                },
            },
            {
                q: {
                    fr: "Les formations sont-elles certifiées ?",
                    en: "Are the trainings certified?",
                },
                a: {
                    fr: "Toutes nos formations sont certifiées par le MINEFOP (Ministère de la Formation Professionnelle) et délivrent des diplômes reconnus au niveau national et international.",
                    en: "All our trainings are certified by MINEFOP (Ministry of Vocational Training) and issue diplomas recognized nationally and internationally.",
                },
            },
            {
                q: {
                    fr: "Peut-on suivre les formations en ligne ?",
                    en: "Can we follow the trainings online?",
                },
                a: {
                    fr: "Absolument ! Nous proposons des formations en présentiel à Bafoussam, en ligne (à distance) ou en format hybride selon vos préférences.",
                    en: "Absolutely! We offer face-to-face training in Bafoussam, online (remote) or in hybrid format depending on your preferences.",
                },
            },
        ],
        notfound: {
            fr: "Vous ne trouvez pas votre réponse ?",
            en: "Can't find your answer?",
        },
        whatsapp: { fr: "Discuter sur WhatsApp", en: "Chat on WhatsApp" },
    },
    cta: {
        subtitle: {
            fr: "Prêt à commencer votre formation ?",
            en: "Ready to start your training?",
        },
        desc: {
            fr: "Rejoignez +2000 apprenants qui ont déjà fait confiance à ACADECOL",
            en: "Join +2000 learners who have already trusted ACADECOL",
        },
        button: { fr: "Voir nos formations", en: "View our trainings" },
        call: { fr: "Appeler", en: "Call" },
    },
};

const form = ref({
    name: "",
    email: "",
    phone: "",
    subject: "",
    message: "",
});

const openedFaq = ref(0);

const faqs = computed(() => {
    return t.faq.items.map((item) => ({
        q: item.q[locale.value],
        a: item.a[locale.value],
    }));
});

const toggleFaq = (index) => {
    openedFaq.value = openedFaq.value === index ? null : index;
};

const submitForm = () => {
    console.log("Formulaire envoyé:", form.value);
    alert(t.form.success[locale.value]);
    form.value = { name: "", email: "", phone: "", subject: "", message: "" };
};
</script>
