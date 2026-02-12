<template>
    <PublicLayout>
        <!-- Hero Section -->
        <section
            class="relative bg-gray-900 text-white py-5 md:py-10 overflow-hidden"
        >
            <div
                class="absolute inset-0 opacity-20 bg-[url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')] bg-cover bg-center"
            ></div>
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-purple-900/90"
            ></div>
            <div class="container mx-auto px-4 relative z-10 text-center">
                <h1 class="text-xl md:text-4xl font-bold mb-3 tracking-tight">
                    Nos Programmes de Formation
                </h1>
                <p
                    class="text-sm md:text-xl text-blue-100 max-w-3xl mx-auto leading-relaxed"
                >
                    Des cursus certifiés par l'État pour propulser votre
                    carrière dans les secteurs d'avenir.
                </p>
            </div>
        </section>

        <!-- Navigation Tabs/Dropdown (Sticky) -->
        <!-- Navigation Pills (Sticky) -->
        <section
            class="sticky top-10 z-40 bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-sm transition-all duration-300"
        >
            <div class="container mx-auto px-4 py-3">
                <!-- Mobile: Dropdown Select -->
                <div class="lg:hidden">
                    <select
                        v-model="selectedDomainId"
                        @change="selectDomain(selectedDomainId)"
                        class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 bg-white text-sm font-semibold text-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all"
                    >
                        <option :value="null">🎓 Toutes les formations</option>
                        <option
                            v-for="domain in domains"
                            :key="domain.id"
                            :value="domain.id"
                        >
                            {{ domain.name }}
                        </option>
                    </select>
                </div>

                <!-- Desktop: Pills Navigation -->
                <div
                    class="hidden lg:flex overflow-x-auto gap-3 hide-scrollbar pb-1"
                >
                    <!-- 'Tous' Option -->
                    <button
                        @click="selectDomain(null)"
                        :class="[
                            'flex-shrink-0 px-5 py-2 rounded-full text-xs font-bold transition-all border whitespace-nowrap',
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
                            'flex-shrink-0 flex items-center gap-2 px-4 py-2 rounded-full text-xs font-bold transition-all border whitespace-nowrap',
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
        <section class="py-5 md:py-10 bg-gray-50 min-h-screen">
            <div class="container mx-auto px-4">
                <!-- Domain Header -->

                <!-- Formations Sections -->
                <div v-if="groupedFormations.length > 0">
                    <div
                        v-for="group in groupedFormations"
                        :key="group.id"
                        class="mb-6 last:mb-0"
                    >
                        <!-- Section Header -->
                        <div
                            class="flex items-center gap-3 md:gap-4 mb-2 md:mb-4     border-b border-gray-200 pb-4"
                        >
                            <div
                                :class="`w-10 h-10 md:w-14 md:h-14 rounded-xl md:rounded-2xl bg-gradent-to-br ${group.color} flex items-center justify-center text-white shadow-lg shrink-0`"
                            >
                              
                                   <i class="fas fa-arrow-right text-black"></i>

                            </div>
                            <div>
                                <h2
                                    class="md:text-xl text-sm lg:text-3xl font-bold text-gray-900"
                                >
                                    {{ group.name }}
                                </h2>
                            
                            </div>
                        </div>

                        <!-- Grid -->
                        <div
                            class="grid grid-cols-2 lg:grid-cols-5 md:grid-cols-3 gap-4 md:gap-6"
                        >
                            <div
                                v-for="formation in group.items"
                                :key="formation.id"
                                @click="openDetails(formation)"
                                class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 cursor-pointer border border-gray-100 flex flex-col h-full transform hover:-translate-y-1"
                            >
                                <!-- Image Section -->
                                <div
                                    class="relative h-32 md:h-48 overflow-hidden"
                                >
                                    <img
                                        :src="getFormationImage(formation)"
                                        :alt="getText(formation.titre)"
                                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                        onerror="this.src = '/img/school1.jpg'"
                                    />
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"
                                    ></div>
                                </div>

                                <!-- Card Content -->
                                <div
                                    class="px-1 pl-2 py-1 md:p-3 flex-grow flex flex-col pt-2"
                                >
                                    <h3
                                        class="text-xs md:text-md font-bold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2"
                                    >
                                        {{ getText(formation.titre) }}
                                    </h3>
                                    <p
                                        class="text-gray-500 text-xs md:text-sm  line-clamp-2 md:line-clamp-3"
                                    >
                                        {{
                                            getText(
                                                formation.description_courte,
                                            ) ||
                                            getText(
                                                formation.description_complete,
                                            ) ||
                                            "Cliquez pour voir les détails."
                                        }}
                                    </p>
                                </div>

                                <!-- Card Footer -->
                                <div
                                    class="px-3 mx-auto md:px-5 py-1 md:py-3 bg-gray-50 border-t border-gray-100 mt-auto flex items-center justify-end group-hover:bg-blue-50/30 transition-colors"
                                >
                                    <span
                                        class="inline-flex items-center text-blue-600 text-xs md:text-sm font-semibold uppercase tracking-wider group-hover:translate-x-1 transition-transform"
                                    >
                                        Détails
                                        <i
                                            class="fas fa-arrow-right ml-1 md:ml-2"
                                        ></i>
                                    </span>
                                </div>
                            </div>
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
                class="fixed inset-0 z-50 flex items-end md:items-center justify-center md:p-6"
                role="dialog"
            >
                <!-- Backdrop -->
                <div
                    class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity"
                    @click="closeDetails"
                ></div>

                <!-- Modal Content -->
                <div
                    class="relative bg-white rounded-t-3xl md:rounded-3xl shadow-2xl w-full max-w-4xl max-h-[95vh] md:max-h-[90vh] overflow-y-auto flex flex-col md:flex-row overflow-hidden"
                >
                    <!-- Close Button Mobile (Top Right) -->
                    <button
                        @click="closeDetails"
                        class="md:hidden absolute top-4 right-4 z-50 w-10 h-10 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition-all"
                    >
                        <i class="fas fa-times text-gray-700 text-lg"></i>
                    </button>

                    <!-- Left Side (Visual + Key Info) -->
                    <div
                        v-if="selectedFormation"
                        :class="`md:w-1/3 p-4 md:p-8 text-white bg-gradient-to-br ${getDomain(selectedFormation.category_id)?.color || 'from-blue-600 to-indigo-700'} relative overflow-hidden flex flex-col justify-between`"
                    >
                        <div
                            class="absolute top-0 right-0 -mr-10 -mt-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"
                        ></div>
                        <div
                            class="absolute bottom-0 left-0 -ml-10 -mb-10 w-40 h-40 bg-black/10 rounded-full blur-2xl"
                        ></div>

                        <div class="relative z-10">
                            <!-- Image de la formation -->
                            <div
                                class="w-full aspect-video md:aspect-square rounded-2xl overflow-hidden mb-4 md:mb-6 shadow-xl border-4 border-white/20 bg-white/10"
                            >
                                <img
                                    :src="getFormationImage(selectedFormation)"
                                    :alt="getText(selectedFormation.titre)"
                                    class="w-full h-full object-contain"
                                    onerror="this.src = '/img/school1.jpg'"
                                />
                            </div>

                            <h2
                                class="text-xl md:text-3xl font-bold leading-tight mb-2"
                            >
                                {{ getText(selectedFormation.titre) }}
                            </h2>
                            <p
                                class="text-white/80 text-xs md:text-sm font-medium uppercase tracking-wider mb-4 md:mb-8"
                            >
                                {{
                                    getDomain(selectedFormation.category_id)
                                        ?.name
                                }}
                            </p>
                        </div>

                        <div class="relative z-10 mt-4 md:mt-8">
                            <button
                                @click="closeDetails"
                                class="md:hidden w-full py-3 bg-white/20 hover:bg-white/30 rounded-xl font-bold backdrop-blur-md transition text-sm"
                            >
                                Fermer
                            </button>
                        </div>
                    </div>

                    <!-- Right Side (Details) -->
                    <div
                        class="md:w-2/3 p-4 md:p-8 lg:p-12 bg-white overflow-y-auto"
                    >
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
                                class="text-lg md:text-2xl font-bold text-gray-900 mb-3 md:mb-4 flex items-center gap-2"
                            >
                                À propos de la formation
                            </h3>
                            <p
                                class="text-gray-600 leading-relaxed text-sm md:text-lg mb-4 md:mb-8"
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

                            <!-- Débouchés Professionnels -->
                            <div
                                v-if="selectedFormation.debouches"
                                class="mb-4 md:mb-8"
                            >
                                <div
                                    class="bg-gradient-to-br from-blue-50 to-indigo-50 p-4 md:p-8 rounded-2xl md:rounded-3xl border-2 border-blue-200"
                                >
                                    <h4
                                        class="text-base md:text-2xl font-bold text-blue-900 mb-3 md:mb-4 flex items-center gap-2 md:gap-3"
                                    >
                                        <div
                                            class="w-8 h-8 md:w-12 md:h-12 bg-blue-600 rounded-lg md:rounded-xl flex items-center justify-center"
                                        >
                                            <i
                                                class="fas fa-briefcase text-white text-sm md:text-xl"
                                            ></i>
                                        </div>
                                        Vos Opportunités de Carrière
                                    </h4>
                                    <p
                                        class="text-gray-800 text-sm md:text-lg leading-relaxed"
                                    >
                                        {{
                                            getText(selectedFormation.debouches)
                                        }}
                                    </p>
                                </div>
                            </div>

                            <!-- Prérequis -->
                            <div
                                v-if="selectedFormation.prerequis"
                                class="mb-4 md:mb-8"
                            >
                                <div
                                    class="bg-gradient-to-br from-amber-50 to-orange-50 p-4 md:p-8 rounded-2xl md:rounded-3xl border-2 border-amber-200"
                                >
                                    <h4
                                        class="text-base md:text-2xl font-bold text-amber-900 mb-3 md:mb-4 flex items-center gap-2 md:gap-3"
                                    >
                                        <div
                                            class="w-8 h-8 md:w-12 md:h-12 bg-amber-600 rounded-lg md:rounded-xl flex items-center justify-center"
                                        >
                                            <i
                                                class="fas fa-graduation-cap text-white text-sm md:text-xl"
                                            ></i>
                                        </div>
                                        Conditions d'Admission
                                    </h4>
                                    <p
                                        class="text-gray-800 text-sm md:text-lg leading-relaxed"
                                    >
                                        {{
                                            getText(selectedFormation.prerequis)
                                        }}
                                    </p>
                                </div>
                            </div>

                            <!-- Pourquoi Choisir Cette Formation -->
                            <div class="mb-4 md:mb-8">
                                <div
                                    class="bg-gradient-to-br from-green-50 to-emerald-50 p-4 md:p-8 rounded-2xl md:rounded-3xl border-2 border-green-200"
                                >
                                    <h4
                                        class="text-base md:text-2xl font-bold text-green-900 mb-4 md:mb-6 flex items-center gap-2 md:gap-3"
                                    >
                                        <div
                                            class="w-8 h-8 md:w-12 md:h-12 bg-green-600 rounded-lg md:rounded-xl flex items-center justify-center"
                                        >
                                            <i
                                                class="fas fa-star text-white text-sm md:text-xl"
                                            ></i>
                                        </div>
                                        Pourquoi Choisir ACADECOL ?
                                    </h4>
                                    <div
                                        class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4"
                                    >
                                        <div
                                            class="flex items-start gap-2 md:gap-3"
                                        >
                                            <i
                                                class="fas fa-check-circle text-green-600 text-base md:text-xl mt-1"
                                            ></i>
                                            <div>
                                                <p
                                                    class="font-bold text-gray-900 text-sm md:text-base"
                                                >
                                                    Formation Certifiée
                                                </p>
                                                <p
                                                    class="text-gray-700 text-xs md:text-sm"
                                                >
                                                    Diplômes reconnus par l'État
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-start gap-2 md:gap-3"
                                        >
                                            <i
                                                class="fas fa-check-circle text-green-600 text-base md:text-xl mt-1"
                                            ></i>
                                            <div>
                                                <p
                                                    class="font-bold text-gray-900 text-sm md:text-base"
                                                >
                                                    Formateurs Experts
                                                </p>
                                                <p
                                                    class="text-gray-700 text-xs md:text-sm"
                                                >
                                                    Professionnels en activité
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-start gap-2 md:gap-3"
                                        >
                                            <i
                                                class="fas fa-check-circle text-green-600 text-base md:text-xl mt-1"
                                            ></i>
                                            <div>
                                                <p
                                                    class="font-bold text-gray-900 text-sm md:text-base"
                                                >
                                                    Stage Pratique
                                                </p>
                                                <p
                                                    class="text-gray-700 text-xs md:text-sm"
                                                >
                                                    Expérience terrain garantie
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-start gap-2 md:gap-3"
                                        >
                                            <i
                                                class="fas fa-check-circle text-green-600 text-base md:text-xl mt-1"
                                            ></i>
                                            <div>
                                                <p
                                                    class="font-bold text-gray-900 text-sm md:text-base"
                                                >
                                                    Accompagnement Emploi
                                                </p>
                                                <p
                                                    class="text-gray-700 text-xs md:text-sm"
                                                >
                                                    Aide à l'insertion
                                                    professionnelle
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CTA -->
                            <div
                                class="mt-8 pt-8 border-t border-gray-100 flex flex-col sm:flex-row gap-4"
                            >
                                <Link
                                    href="/preinscription"
                                    class="flex-1 text-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:from-blue-700 hover:to-indigo-700 hover:shadow-lg transition transform hover:-translate-y-1"
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

const getDomain = (id) => {
    return domains.value.find((d) => d.id === id);
};

const groupedFormations = computed(() => {
    let cats = domains.value;

    if (selectedDomainId.value) {
        cats = cats.filter((d) => d.id === selectedDomainId.value);
    }

    return cats
        .map((domain) => ({
            ...domain,
            items: props.formations.filter((f) => f.category_id === domain.id),
        }))
        .filter((g) => g.items.length > 0);
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

// Image Helpers
function getFormationImage(formation) {
    if (formation.image && formation.image.path) {
        return `/${formation.image.path}`;
    }
    // Fallback based on category
    const categoryName = getDomain(formation.category_id)?.name;
    return getCategoryImage(categoryName);
}

function getCategoryImage(categoryName) {
    const images = {
        "Les Langues": "/storage/formations/anglais.png",
        "Paramédicale et Biomédical": "/storage/formations/pharmacie.png",
        "L'Humanitaire": "/storage/formations/humanitaire.png",
        "Numérique en Santé": "/storage/formations/data_analyst.png",
        "Management & Recherche Opérationnelle en Santé":
            "/storage/formations/data_analyst.png",
    };
    return images[categoryName] || "/img/school1.jpg";
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
