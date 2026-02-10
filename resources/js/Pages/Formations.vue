<template>
    <PublicLayout>
        <!-- Hero Section -->
        <section
            class="relative bg-gray-900 text-white py-10 md:py-24 overflow-hidden"
        >
            <div
                class="absolute inset-0 opacity-20 bg-[url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')] bg-cover bg-center"
            ></div>
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-purple-900/90"
            ></div>
            <div class="container mx-auto px-4 relative z-10 text-center">
                <h1 class="text-3xl md:text-6xl font-bold mb-6 tracking-tight">
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

        <!-- Navigation Tabs/Dropdown (Sticky) -->
        <!-- Navigation Pills (Sticky) -->
        <section
            class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-sm transition-all duration-300"
        >
            <div class="container mx-auto px-4 py-3">
                <div
                    class="flex flex-wrap overflow-x-auto gap-3 hide-scrollbar pb-1 -mx-4 px-2 sm:mx-0 sm:px-0"
                >
                    <!-- 'Tous' Option -->
                    <button
                        @click="selectDomain(null)"
                        :class="[
                            'flex-shrink-0 px-5 py-2 rounded-full text-[5px] font-bold transition-all border whitespace-nowrap',
                            selectedDomainId === null
                                ? 'bg-blue-600 text-white border-blue-600 shadow-md'
                                : 'bg-white text-gray-600 border-gray-200 hover:border-blue-400 hover:text-blue-600',
                        ]"
                    >
                        Toutes les formations
                    </button>

                    <!-- Categories -->
                    <button
                        v-for="domain in domains"
                        :key="domain.id"
                        @click="selectDomain(domain.id)"
                        :class="[
                            'flex-shrink-0 flex flex-wrap items-center gap-2 px-1 py-2 rounded-full text-[4px] font-bold transition-all border whitespace-nowrap',
                            selectedDomainId === domain.id
                                ? 'bg-blue-600 text-white border-blue-600 shadow-md'
                                : 'bg-white text-gray-600 border-gray-200 hover:border-blue-400 hover:text-blue-600',
                        ]"
                    >
                        <i :class="domain.iconClass"></i>
                        {{ domain.name }}
                    </button>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="py-10 md:py-16 bg-gray-50 min-h-screen">
            <div class="container mx-auto px-4">
                <!-- Domain Header -->
                <div
                    v-if="selectedDomain"
                    class="mb-8 text-center animate-fade-in-up"
                >
                    <div
                        :class="`inline-flex items-center justify-center w-16 h-16 md:w-20 md:h-20 rounded-2xl bg-gradient-to-br ${selectedDomain.color} text-white text-3xl md:text-4xl mb-6 shadow-xl transform rotate-3`"
                    >
                        <!-- Header Icon -->
                        <i :class="selectedDomain.iconClass"></i>
                    </div>
                    <h2
                        class="text-2xl md:text-4xl font-bold text-gray-900 mb-4"
                    >
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
                        class="group bg-white rounded-xl md:rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 cursor-pointer border border-gray-100 flex flex-col h-full transform hover:-translate-y-1"
                    >
                        <!-- Image Section -->
                        <div class="relative h-48 overflow-hidden">
                            <img
                                :src="
                                    getCategoryImage(
                                        getDomain(formation.category_id)?.name,
                                    )
                                "
                                :alt="
                                    getDomain(formation.category_id)?.name ||
                                    'Formation'
                                "
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                            />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"
                            ></div>

                            <!-- Badges -->
                            <div
                                class="absolute top-4 right-4 flex flex-col gap-2 items-end"
                            >
                                <span
                                    v-if="formation.is_featured"
                                    class="px-3 py-1 bg-amber-500 text-white text-[10px] font-bold uppercase tracking-wider rounded-full shadow-lg"
                                >
                                    Populaire
                                </span>
                            </div>

                            <!-- Duration Badge -->
                            <div class="absolute bottom-4 left-4">
                                <span
                                    class="px-3 py-1 bg-black/40 backdrop-blur-md text-white border border-white/20 text-xs font-semibold rounded-lg flex items-center gap-1"
                                >
                                    <i class="far fa-clock"></i>
                                    {{ formation.duree || "Durée variable" }}
                                </span>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6 flex-grow flex flex-col">
                            <!-- Category Tag -->
                            <div class="mb-3">
                                <span
                                    :class="`text-xs font-bold uppercase tracking-wider text-transparent bg-clip-text bg-gradient-to-r ${selectedDomain?.color}`"
                                >
                                    {{ getDomain(formation.category_id)?.name }}
                                </span>
                            </div>

                            <h3
                                class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors line-clamp-2"
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
                        </div>

                        <!-- Card Footer -->
                        <div
                            class="px-6 py-4 bg-gray-50 border-t border-gray-100 mt-auto flex items-center justify-between group-hover:bg-blue-50/30 transition-colors"
                        >
                            <span class="text-gray-900 font-bold text-lg">
                                {{
                                    formation.prix
                                        ? formatPrice(formation.prix)
                                        : "Sur devis"
                                }}
                            </span>
                            <span
                                class="inline-flex items-center text-blue-600 text-sm font-bold uppercase tracking-wider group-hover:translate-x-1 transition-transform"
                            >
                                Voir <i class="fas fa-arrow-right ml-2"></i>
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
                        v-if="selectedFormation"
                        :class="`md:w-1/3 p-8 text-white bg-gradient-to-br ${getDomain(selectedFormation.category_id)?.color || 'from-blue-600 to-indigo-700'} relative overflow-hidden flex flex-col justify-between`"
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
                                <i
                                    :class="
                                        getDomain(selectedFormation.category_id)
                                            ?.iconClass
                                    "
                                ></i>
                            </div>
                            <h2 class="text-3xl font-bold leading-tight mb-2">
                                {{ getText(selectedFormation.titre) }}
                            </h2>
                            <p
                                class="text-white/80 text-sm font-medium uppercase tracking-wider mb-8"
                            >
                                {{
                                    getDomain(selectedFormation.category_id)
                                        ?.name
                                }}
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
                                                (
                                                    getDomain(
                                                        selectedFormation.category_id,
                                                    )?.description || ""
                                                ).includes("En ligne")
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

                            <!-- Débouchés & Prérequis -->
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8"
                            >
                                <div
                                    v-if="selectedFormation.debouches"
                                    class="bg-blue-50 p-6 rounded-2xl border border-blue-100"
                                >
                                    <h4
                                        class="text-lg font-bold text-blue-900 mb-3 flex items-center gap-2"
                                    >
                                        <i class="fas fa-briefcase"></i>
                                        Débouchés
                                    </h4>
                                    <p class="text-gray-700">
                                        {{
                                            getText(selectedFormation.debouches)
                                        }}
                                    </p>
                                </div>
                                <div
                                    v-if="selectedFormation.prerequis"
                                    class="bg-amber-50 p-6 rounded-2xl border border-amber-100"
                                >
                                    <h4
                                        class="text-lg font-bold text-amber-900 mb-3 flex items-center gap-2"
                                    >
                                        <i class="fas fa-list-check"></i>
                                        Prérequis
                                    </h4>
                                    <p class="text-gray-700">
                                        {{
                                            getText(selectedFormation.prerequis)
                                        }}
                                    </p>
                                </div>
                            </div>

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
console.log(props.categories);
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
    if (selectedDomainId.value === null) return null;
    return domains.value.find((d) => d.id === selectedDomainId.value);
});

const getDomain = (id) => {
    return domains.value.find((d) => d.id === id);
};

const filteredFormations = computed(() => {
    if (!selectedDomainId.value) return props.formations; // Show all if no category selected
    return props.formations.filter(
        (f) => f.category_id === selectedDomainId.value,
    );
});

// Removed onMounted force-select

const isOpen = ref(false);

const toggleDropdown = () => {
    isOpen.value = !isOpen.value;
};

const selectDomainAndClose = (id) => {
    selectDomain(id);
    isOpen.value = false;
};

// Image Helper
function getCategoryImage(categoryName) {
    const images = {
        "Les Langues":
            "https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
        "Paramédicale et Biomédical":
            "https://images.unsplash.com/photo-1505751172876-fa1923c5c528?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
        "L'Humanitaire":
            "https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
        "Numérique en Santé":
            "https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
        "Management & Recherche Opérationnelle en Santé":
            "https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
    };
    return (
        images[categoryName] ||
        "https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
    );
}

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
