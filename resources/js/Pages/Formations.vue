<template>
    <PublicLayout>
        <!-- Hero Section -->
        <section class="relative bg-gray-900 text-white py-24 overflow-hidden">
            <div
                class="absolute inset-0 opacity-20 bg-[url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')] bg-cover bg-center"
            ></div>
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-purple-900/90"
            ></div>
            <div class="container mx-auto px-4 relative z-10 text-center">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 tracking-tight">
                    Nos Programmes de Formation
                </h1>
                <p
                    class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto leading-relaxed"
                >
                    Des cursus certifiés par l'État pour propulser votre
                    carrière dans les secteurs d'avenir.
                </p>
            </div>
        </section>

        <!-- Navigation Tabs (Sticky) -->
        <section
            class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-sm transition-all duration-300"
        >
            <div class="container mx-auto px-4">
                <div
                    class="flex overflow-x-auto pb-0 hide-scrollbar gap-2 py-4 justify-start md:justify-center"
                >
                    <button
                        v-for="domain in domains"
                        :key="domain.id"
                        @click="selectDomain(domain.id)"
                        :class="[
                            'flex items-center gap-3 px-6 py-3 rounded-full font-semibold text-sm transition-all duration-300 whitespace-nowrap mb-1',
                            selectedDomainId === domain.id
                                ? `bg-gradient-to-r ${domain.color} text-white shadow-lg transform scale-105`
                                : 'bg-gray-50 text-gray-600 hover:bg-gray-100 hover:text-gray-900 border border-gray-200',
                        ]"
                    >
                        <!-- Use <i> for FontAwesome icons -->
                        <i :class="[domain.iconClass, 'text-lg']"></i>
                        <span>{{ domain.name }}</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="py-16 bg-gray-50 min-h-screen">
            <div class="container mx-auto px-4">
                <!-- Domain Header -->
                <div
                    v-if="selectedDomain"
                    class="mb-12 text-center animate-fade-in-up"
                >
                    <div
                        :class="`inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br ${selectedDomain.color} text-white text-4xl mb-6 shadow-xl transform rotate-3`"
                    >
                        <!-- Header Icon -->
                        <i :class="selectedDomain.iconClass"></i>
                    </div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">
                        {{ selectedDomain.name }}
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        {{ selectedDomain.description }}
                    </p>
                </div>

                <!-- Formations Grid -->
                <div
                    v-if="filteredFormations.length > 0"
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                >
                    <div
                        v-for="formation in filteredFormations"
                        :key="formation.id"
                        @click="openDetails(formation)"
                        class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 cursor-pointer border border-gray-100 flex flex-col h-full"
                    >
                        <!-- Card Header -->
                        <div
                            :class="`h-2 bg-gradient-to-r ${selectedDomain.color}`"
                        ></div>
                        <div class="p-8 flex-grow">
                            <div class="flex justify-between items-start mb-4">
                                <span
                                    v-if="formation.is_featured"
                                    class="px-3 py-1 bg-amber-100 text-amber-700 text-xs font-bold uppercase tracking-wider rounded-full"
                                    >Populaire</span
                                >
                                <span v-else></span>
                                <span class="text-gray-400 text-sm"
                                    ><i class="far fa-clock mr-1"></i>
                                    {{
                                        formation.duree || "Durée variable"
                                    }}</span
                                >
                            </div>

                            <h3
                                class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition-colors"
                            >
                                {{ getText(formation.titre) }}
                            </h3>
                            <p class="text-gray-500 text-sm mb-6 line-clamp-3">
                                {{
                                    getText(formation.description_courte) ||
                                    getText(formation.description_complete) ||
                                    "Cliquez pour voir les détails."
                                }}
                            </p>

                            <div class="flex items-center gap-2 mb-2">
                                <div
                                    class="bg-blue-50 text-blue-700 px-3 py-1 rounded-md text-xs font-medium"
                                >
                                    <i class="fas fa-certificate mr-1"></i>
                                    Certifiant
                                </div>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div
                            class="px-8 py-6 bg-gray-50 border-t border-gray-100 mt-auto flex items-center justify-between group-hover:bg-blue-50/50 transition-colors"
                        >
                            <span class="text-gray-900 font-bold text-lg">
                                {{
                                    formation.prix
                                        ? formatPrice(formation.prix)
                                        : "Nous contacter"
                                }}
                            </span>
                            <span
                                class="inline-flex items-center text-blue-600 font-semibold group-hover:translate-x-1 transition-transform"
                            >
                                Détails <i class="fas fa-arrow-right ml-2"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div
                    v-else
                    class="text-center py-20 bg-white rounded-3xl shadow-sm border border-gray-100"
                >
                    <div class="text-gray-300 text-6xl mb-4">
                        <i class="far fa-folder-open"></i>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900">
                        Aucune formation trouvée pour le moment.
                    </h3>
                    <p class="text-gray-500 mt-2">
                        Revenez bientôt pour découvrir nos nouveaux programmes.
                    </p>
                </div>
            </div>
        </section>

        <!-- Modal Détails -->
        <Transition name="modal">
            <div
                v-if="selectedFormation"
                class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
                role="dialog"
            >
                <!-- Backdrop -->
                <div
                    class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity"
                    @click="closeDetails"
                ></div>

                <!-- Modal Content -->
                <div
                    class="relative bg-white rounded-3xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto flex flex-col md:flex-row overflow-hidden"
                >
                    <!-- Left Side (Visual + Key Info) -->
                    <div
                        :class="`md:w-1/3 p-8 text-white bg-gradient-to-br ${selectedDomain.color} relative overflow-hidden flex flex-col justify-between`"
                    >
                        <div
                            class="absolute top-0 right-0 -mr-10 -mt-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"
                        ></div>
                        <div
                            class="absolute bottom-0 left-0 -ml-10 -mb-10 w-40 h-40 bg-black/10 rounded-full blur-2xl"
                        ></div>

                        <div class="relative z-10">
                            <div
                                class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-3xl mb-6"
                            >
                                <i :class="selectedDomain.iconClass"></i>
                            </div>
                            <h2 class="text-3xl font-bold leading-tight mb-2">
                                {{ getText(selectedFormation.titre) }}
                            </h2>
                            <p
                                class="text-white/80 text-sm font-medium uppercase tracking-wider mb-8"
                            >
                                {{ selectedDomain.name }}
                            </p>

                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center"
                                    >
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <p
                                            class="text-xs text-white/70 uppercase"
                                        >
                                            Durée
                                        </p>
                                        <p class="font-semibold">
                                            {{
                                                selectedFormation.duree ||
                                                "Flexible"
                                            }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center"
                                    >
                                        <i class="fas fa-tag"></i>
                                    </div>
                                    <div>
                                        <p
                                            class="text-xs text-white/70 uppercase"
                                        >
                                            Coût
                                        </p>
                                        <p class="font-semibold">
                                            {{
                                                selectedFormation.prix
                                                    ? formatPrice(
                                                          selectedFormation.prix,
                                                      )
                                                    : "Sur demande"
                                            }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center"
                                    >
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <p
                                            class="text-xs text-white/70 uppercase"
                                        >
                                            Mode
                                        </p>
                                        <p class="font-semibold">
                                            {{
                                                selectedDomain.description.includes(
                                                    "En ligne",
                                                )
                                                    ? "En ligne / Hybride"
                                                    : "Présentiel"
                                            }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="relative z-10 mt-8 md:mt-0">
                            <button
                                @click="closeDetails"
                                class="md:hidden w-full py-3 bg-white/20 hover:bg-white/30 rounded-xl font-bold backdrop-blur-md transition mb-2"
                            >
                                Fermer
                            </button>
                        </div>
                    </div>

                    <!-- Right Side (Details) -->
                    <div class="md:w-2/3 p-8 lg:p-12 bg-white overflow-y-auto">
                        <div class="flex justify-end mb-4 hidden md:block">
                            <button
                                @click="closeDetails"
                                class="text-gray-400 hover:text-gray-600 transition p-2"
                            >
                                <i class="fas fa-times text-2xl"></i>
                            </button>
                        </div>

                        <div class="prose prose-blue max-w-none">
                            <h3
                                class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-2"
                            >
                                À propos de la formation
                            </h3>
                            <p
                                class="text-gray-600 leading-relaxed text-lg mb-8"
                            >
                                {{
                                    getText(
                                        selectedFormation.description_complete,
                                    ) ||
                                    getText(
                                        selectedFormation.description_courte,
                                    )
                                }}
                            </p>

                            <!-- Modules List -->
                            <div
                                v-if="selectedFormation.modules?.length"
                                class="mb-8"
                            >
                                <h4
                                    class="text-lg font-bold text-gray-900 mb-4 border-b pb-2"
                                >
                                    Programme Académique
                                </h4>
                                <ul class="space-y-3">
                                    <li
                                        v-for="(
                                            module, idx
                                        ) in selectedFormation.modules"
                                        :key="idx"
                                        class="flex gap-3 items-start"
                                    >
                                        <span
                                            class="flex-shrink-0 w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold mt-0.5"
                                            >{{ idx + 1 }}</span
                                        >
                                        <span
                                            class="text-gray-700 font-medium"
                                            >{{ getText(module.titre) }}</span
                                        >
                                    </li>
                                </ul>
                            </div>

                            <!-- CTA -->
                            <div
                                class="mt-8 pt-8 border-t border-gray-100 flex flex-col sm:flex-row gap-4"
                            >
                                <Link
                                    href="/contact"
                                    class="flex-1 text-center px-8 py-4 bg-gray-900 text-white font-bold rounded-xl hover:bg-gray-800 hover:shadow-lg transition transform hover:-translate-y-1"
                                >
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    Candidater maintenant
                                </Link>
                                <Link
                                    href="/contact"
                                    class="flex-1 text-center px-8 py-4 bg-white border-2 border-gray-200 text-gray-700 font-bold rounded-xl hover:border-gray-900 hover:text-gray-900 transition"
                                >
                                    <i class="fas fa-phone mr-2"></i> Un
                                    conseiller vous rappelle
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Transition>
    </PublicLayout>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import { Link } from "@inertiajs/vue3";
import PublicLayout from "@/Layouts/PublicLayout.vue";

const props = defineProps({
    formations: { type: Array, default: () => [] },
    categories: { type: Array, default: () => [] },
});

const selectedDomainId = ref(null);
const selectedFormation = ref(null);

// Transform data for UI
const domains = computed(() => {
    return props.categories.map((cat, index) => {
        const colors = [
            "from-blue-600 to-indigo-700",
            "from-emerald-500 to-teal-700",
            "from-rose-500 to-pink-700",
            "from-violet-600 to-purple-700",
            "from-amber-500 to-orange-700",
        ];

        return {
            id: cat.id,
            name: getText(cat.nom),
            description: getText(cat.description),
            iconClass: cat.icon_class || "fas fa-graduation-cap",
            color: colors[index % colors.length],
        };
    });
});

const selectedDomain = computed(() => {
    return (
        domains.value.find((d) => d.id === selectedDomainId.value) ||
        domains.value[0]
    );
});

const filteredFormations = computed(() => {
    if (!selectedDomainId.value) return [];
    return props.formations.filter(
        (f) => f.category_id === selectedDomainId.value,
    );
});

// Set default domain on load
onMounted(() => {
    if (domains.value.length > 0 && !selectedDomainId.value) {
        selectedDomainId.value = domains.value[0].id;
    }
});

function selectDomain(id) {
    selectedDomainId.value = id;
}

function openDetails(formation) {
    selectedFormation.value = formation;
    document.body.style.overflow = "hidden";
}

function closeDetails() {
    selectedFormation.value = null;
    document.body.style.overflow = "";
}

// Helpers
function getText(jsonField) {
    if (!jsonField) return "";
    if (typeof jsonField === "string") {
        // Try parsing only if it looks like JSON
        if (jsonField.trim().startsWith("{")) {
            try {
                const parsed = JSON.parse(jsonField);
                return parsed.fr || parsed.en || jsonField;
            } catch (e) {
                return jsonField;
            }
        }
        return jsonField;
    }
    return jsonField.fr || jsonField.en || "";
}

function formatPrice(price) {
    return new Intl.NumberFormat("fr-CM", {
        style: "currency",
        currency: "XAF",
        maximumFractionDigits: 0,
    }).format(price);
}
</script>

<style scoped>
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}
.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
.animate-fade-in-up {
    animation: fadeInUp 0.5s ease-out forwards;
}

.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
    opacity: 0;
}
</style>
