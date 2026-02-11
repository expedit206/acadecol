<script setup>
import { ref } from "vue";
import PublicLayout from "@/Layouts/PublicLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
    formations: Array,
});

const mode = ref("register"); // 'register' ou 'login'

const form = useForm({
    // Informations de base
    formation_id: "",
    last_name: "",
    first_name: "",
    email: "",
    phone: "",
    whatsapp: "",
    address: "",
    birth_date: "",
    gender: "M",
    birth_place: "",
    nationality: "",

    // Parcours académique
    education_level: "",
    last_school: "",
    graduation_year: "",
    major_field: "",

    // Situation professionnelle
    professional_status: "",
    current_position: "",
    company_name: "",
    years_of_experience: "",

    // Langues
    french_level: "",
    english_level: "",
    other_languages: "",

    // Motivations et objectifs
    motivation: "",
    career_goals: "",
    prior_knowledge: "",

    // Disponibilité
    availability: "",
    preferred_schedule: "",

    // Documents
    cv_file: null,

    // Message optionnel
    message: "",
});

const loginForm = useForm({
    phone: "",
});

const submit = () => {
    form.post(route("pre-registration.store"));
};

const submitLogin = () => {
    loginForm.post(route("pre-registration.check"));
};

const handleFileUpload = (event) => {
    form.cv_file = event.target.files[0];
};
</script>

<template>
    <PublicLayout>
        <div
            class="py-12 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen"
        >
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Flash Warning -->
                <div
                    v-if="$page.props.flash?.warning"
                    class="mb-6 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-lg shadow-sm"
                >
                    <p class="font-bold">⚠️ Attention</p>
                    <p>{{ $page.props.flash?.warning }}</p>
                </div>

                <div class="bg-white overflow-hidden shadow-2xl rounded-2xl">
                    <!-- TABS -->
                    <div class="flex border-b border-gray-200">
                        <button
                            @click="mode = 'register'"
                            class="w-1/2 py-4 text-center font-bold text-lg transition-all duration-200 focus:outline-none"
                            :class="
                                mode === 'register'
                                    ? 'text-blue-600 border-b-4 border-blue-600 bg-blue-50'
                                    : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50'
                            "
                        >
                            <i class="fas fa-edit mr-2"></i> Nouvelle Demande
                        </button>
                        <button
                            @click="mode = 'login'"
                            class="w-1/2 py-4 text-center font-bold text-lg transition-all duration-200 focus:outline-none"
                            :class="
                                mode === 'login'
                                    ? 'text-blue-600 border-b-4 border-blue-600 bg-blue-50'
                                    : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50'
                            "
                        >
                            <i class="fas fa-user-check mr-2"></i> Déjà Inscrit
                            ?
                        </button>
                    </div>

                    <div class="p-6 sm:p-10 bg-white">
                        <!-- MODE INSCRIPTION -->
                        <div v-show="mode === 'register'">
                            <div class="mb-8 text-center">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-full mb-4"
                                >
                                    <i
                                        class="fas fa-graduation-cap text-white text-2xl"
                                    ></i>
                                </div>
                                <h1
                                    class="text-3xl font-bold text-gray-900 mb-2"
                                >
                                    Formulaire de Pré-inscription
                                </h1>
                                <p
                                    class="text-gray-600 text-sm max-w-2xl mx-auto"
                                >
                                    Remplissez ce formulaire détaillé pour
                                    réserver votre place. Plus votre dossier
                                    sera complet, plus nous pourrons évaluer
                                    rapidement votre candidature. Aucun frais
                                    n'est requis à cette étape.
                                </p>
                            </div>

                            <form @submit.prevent="submit" class="space-y-8">
                                <!-- ========== SECTION 1: FORMATION ========== -->
                                <div
                                    class="bg-blue-50 p-6 rounded-xl border-2 border-blue-200"
                                >
                                    <h2
                                        class="text-xl font-bold text-blue-900 mb-4 flex items-center gap-2"
                                    >
                                        <i class="fas fa-book"></i>
                                        Formation Souhaitée
                                    </h2>
                                    <div>
                                        <InputLabel
                                            for="formation_id"
                                            value="Sélectionnez votre formation *"
                                        />
                                        <select
                                            id="formation_id"
                                            v-model="form.formation_id"
                                            class="mt-2 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm py-3"
                                            required
                                        >
                                            <option value="">
                                                -- Choisissez une formation --
                                            </option>
                                            <option
                                                v-for="formation in formations"
                                                :key="formation.id"
                                                :value="formation.id"
                                            >
                                                {{ formation.titre.fr }}
                                            </option>
                                        </select>
                                        <InputError
                                            :message="form.errors.formation_id"
                                            class="mt-2"
                                        />
                                    </div>
                                </div>

                                <!-- ========== SECTION 2: IDENTITÉ ========== -->
                                <div
                                    class="bg-gray-50 p-6 rounded-xl border-2 border-gray-200"
                                >
                                    <h2
                                        class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2"
                                    >
                                        <i class="fas fa-user"></i>
                                        Informations Personnelles
                                    </h2>

                                    <div class="space-y-4">
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                        >
                                            <!-- Nom -->
                                            <div>
                                                <InputLabel
                                                    for="last_name"
                                                    value="Nom *"
                                                />
                                                <TextInput
                                                    id="last_name"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.last_name"
                                                    required
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.last_name
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Prénom -->
                                            <div>
                                                <InputLabel
                                                    for="first_name"
                                                    value="Prénom *"
                                                />
                                                <TextInput
                                                    id="first_name"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.first_name"
                                                    required
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.first_name
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="grid grid-cols-1 md:grid-cols-3 gap-4"
                                        >
                                            <!-- Date de naissance -->
                                            <div>
                                                <InputLabel
                                                    for="birth_date"
                                                    value="Date de naissance *"
                                                />
                                                <TextInput
                                                    id="birth_date"
                                                    type="date"
                                                    class="mt-1 block w-full"
                                                    v-model="form.birth_date"
                                                    required
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.birth_date
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Lieu de naissance -->
                                            <div>
                                                <InputLabel
                                                    for="birth_place"
                                                    value="Lieu de naissance *"
                                                />
                                                <TextInput
                                                    id="birth_place"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.birth_place"
                                                    placeholder="Ex: Yaoundé"
                                                    required
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.birth_place
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Sexe -->
                                            <div>
                                                <InputLabel
                                                    for="gender"
                                                    value="Sexe *"
                                                />
                                                <select
                                                    id="gender"
                                                    v-model="form.gender"
                                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                    required
                                                >
                                                    <option value="M">
                                                        Masculin
                                                    </option>
                                                    <option value="F">
                                                        Féminin
                                                    </option>
                                                </select>
                                                <InputError
                                                    :message="
                                                        form.errors.gender
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                        >
                                            <!-- Nationalité -->
                                            <div>
                                                <InputLabel
                                                    for="nationality"
                                                    value="Nationalité *"
                                                />
                                                <TextInput
                                                    id="nationality"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.nationality"
                                                    placeholder="Ex: Camerounaise"
                                                    required
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.nationality
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Adresse -->
                                            <div>
                                                <InputLabel
                                                    for="address"
                                                    value="Ville de résidence *"
                                                />
                                                <TextInput
                                                    id="address"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.address"
                                                    placeholder="Ex: Douala, Akwa"
                                                    required
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.address
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                        >
                                            <!-- Email -->
                                            <div>
                                                <InputLabel
                                                    for="email"
                                                    value="Email *"
                                                />
                                                <TextInput
                                                    id="email"
                                                    type="email"
                                                    class="mt-1 block w-full"
                                                    v-model="form.email"
                                                    placeholder="exemple@email.com"
                                                    required
                                                />
                                                <InputError
                                                    :message="form.errors.email"
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Téléphone -->
                                            <div>
                                                <InputLabel
                                                    for="phone"
                                                    value="Téléphone *"
                                                />
                                                <TextInput
                                                    id="phone"
                                                    type="tel"
                                                    class="mt-1 block w-full"
                                                    v-model="form.phone"
                                                    placeholder="Ex: 699123456"
                                                    required
                                                />
                                                <InputError
                                                    :message="form.errors.phone"
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>

                                        <!-- WhatsApp -->
                                        <div>
                                            <InputLabel
                                                for="whatsapp"
                                                value="Numéro WhatsApp (si différent) "
                                            />
                                            <TextInput
                                                id="whatsapp"
                                                type="tel"
                                                class="mt-1 block w-full"
                                                v-model="form.whatsapp"
                                                placeholder="Ex: 699123456"
                                            />
                                            <InputError
                                                :message="form.errors.whatsapp"
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <!-- ========== SECTION 3: PARCOURS ACADÉMIQUE ========== -->
                                <div
                                    class="bg-green-50 p-6 rounded-xl border-2 border-green-200"
                                >
                                    <h2
                                        class="text-xl font-bold text-green-900 mb-4 flex items-center gap-2"
                                    >
                                        <i class="fas fa-graduation-cap"></i>
                                        Parcours Académique
                                    </h2>

                                    <div class="space-y-4">
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                        >
                                            <!-- Niveau d'étude -->
                                            <div>
                                                <InputLabel
                                                    for="education_level"
                                                    value="Niveau d'étude actuel *"
                                                />
                                                <select
                                                    id="education_level"
                                                    v-model="
                                                        form.education_level
                                                    "
                                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                    required
                                                >
                                                    <option value="">
                                                        -- Sélectionnez --
                                                    </option>
                                                    <option value="CEP">
                                                        CEP / FSLC
                                                    </option>
                                                    <option value="BEPC">
                                                        BEPC / GCE O Level
                                                    </option>
                                                    <option value="Probatoire">
                                                        Probatoire
                                                    </option>
                                                    <option
                                                        value="Baccalauréat"
                                                    >
                                                        Baccalauréat / GCE A
                                                        Level
                                                    </option>
                                                    <option value="BTS/DUT">
                                                        BTS / DUT / HND
                                                    </option>
                                                    <option value="Licence">
                                                        Licence / Bachelor
                                                    </option>
                                                    <option value="Master">
                                                        Master / Master's Degree
                                                    </option>
                                                    <option value="Doctorat">
                                                        Doctorat / PhD
                                                    </option>
                                                    <option value="Autre">
                                                        Autre
                                                    </option>
                                                </select>
                                                <InputError
                                                    :message="
                                                        form.errors
                                                            .education_level
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Année d'obtention -->
                                            <div>
                                                <InputLabel
                                                    for="graduation_year"
                                                    value="Année d'obtention *"
                                                />
                                                <TextInput
                                                    id="graduation_year"
                                                    type="number"
                                                    min="1960"
                                                    max="2030"
                                                    class="mt-1 block w-full"
                                                    v-model="
                                                        form.graduation_year
                                                    "
                                                    placeholder="Ex: 2020"
                                                    required
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors
                                                            .graduation_year
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                        >
                                            <!-- Établissement -->
                                            <div>
                                                <InputLabel
                                                    for="last_school"
                                                    value="Dernier établissement fréquenté *"
                                                />
                                                <TextInput
                                                    id="last_school"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.last_school"
                                                    placeholder="Ex: Université de Yaoundé I"
                                                    required
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.last_school
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Filière -->
                                            <div>
                                                <InputLabel
                                                    for="major_field"
                                                    value="Domaine d'étude / Filière"
                                                />
                                                <TextInput
                                                    id="major_field"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.major_field"
                                                    placeholder="Ex: Gestion, Sciences, Littéraire..."
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.major_field
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ========== SECTION 4: SITUATION PROFESSIONNELLE ========== -->
                                <div
                                    class="bg-purple-50 p-6 rounded-xl border-2 border-purple-200"
                                >
                                    <h2
                                        class="text-xl font-bold text-purple-900 mb-4 flex items-center gap-2"
                                    >
                                        <i class="fas fa-briefcase"></i>
                                        Situation Professionnelle
                                    </h2>

                                    <div class="space-y-4">
                                        <!-- Statut professionnel -->
                                        <div>
                                            <InputLabel
                                                for="professional_status"
                                                value="Statut actuel *"
                                            />
                                            <select
                                                id="professional_status"
                                                v-model="
                                                    form.professional_status
                                                "
                                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                required
                                            >
                                                <option value="">
                                                    -- Sélectionnez --
                                                </option>
                                                <option value="Étudiant">
                                                    Étudiant(e)
                                                </option>
                                                <option value="Salarié">
                                                    Salarié(e)
                                                </option>
                                                <option value="Entrepreneur">
                                                    Entrepreneur /
                                                    Auto-entrepreneur
                                                </option>
                                                <option value="Sans emploi">
                                                    Demandeur d'emploi
                                                </option>
                                                <option value="Fonctionnaire">
                                                    Fonctionnaire
                                                </option>
                                                <option value="Stage">
                                                    En stage
                                                </option>
                                                <option value="Autre">
                                                    Autre
                                                </option>
                                            </select>
                                            <InputError
                                                :message="
                                                    form.errors
                                                        .professional_status
                                                "
                                                class="mt-2"
                                            />
                                        </div>

                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                        >
                                            <!-- Poste actuel -->
                                            <div>
                                                <InputLabel
                                                    for="current_position"
                                                    value="Poste / Fonction actuelle"
                                                />
                                                <TextInput
                                                    id="current_position"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="
                                                        form.current_position
                                                    "
                                                    placeholder="Ex: Assistant administratif"
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors
                                                            .current_position
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Entreprise -->
                                            <div>
                                                <InputLabel
                                                    for="company_name"
                                                    value="Entreprise / Organisation"
                                                />
                                                <TextInput
                                                    id="company_name"
                                                    type="text"
                                                    class="mt-1 block w-full"
                                                    v-model="form.company_name"
                                                    placeholder="Ex: MTN Cameroun"
                                                />
                                                <InputError
                                                    :message="
                                                        form.errors.company_name
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>

                                        <!-- Expérience -->
                                        <div>
                                            <InputLabel
                                                for="years_of_experience"
                                                value="Années d'expérience professionnelle"
                                            />
                                            <select
                                                id="years_of_experience"
                                                v-model="
                                                    form.years_of_experience
                                                "
                                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                            >
                                                <option value="">
                                                    -- Sélectionnez --
                                                </option>
                                                <option value="0">
                                                    Aucune expérience
                                                </option>
                                                <option value="1">
                                                    Moins d'1 an
                                                </option>
                                                <option value="1-3">
                                                    1 à 3 ans
                                                </option>
                                                <option value="3-5">
                                                    3 à 5 ans
                                                </option>
                                                <option value="5-10">
                                                    5 à 10 ans
                                                </option>
                                                <option value="10+">
                                                    Plus de 10 ans
                                                </option>
                                            </select>
                                            <InputError
                                                :message="
                                                    form.errors
                                                        .years_of_experience
                                                "
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <!-- ========== SECTION 5: COMPÉTENCES LINGUISTIQUES ========== -->
                                <div
                                    class="bg-amber-50 p-6 rounded-xl border-2 border-amber-200"
                                >
                                    <h2
                                        class="text-xl font-bold text-amber-900 mb-4 flex items-center gap-2"
                                    >
                                        <i class="fas fa-language"></i>
                                        Compétences Linguistiques
                                    </h2>

                                    <div class="space-y-4">
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                        >
                                            <!-- Niveau Français -->
                                            <div>
                                                <InputLabel
                                                    for="french_level"
                                                    value="Niveau de Français *"
                                                />
                                                <select
                                                    id="french_level"
                                                    v-model="form.french_level"
                                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                    required
                                                >
                                                    <option value="">
                                                        -- Sélectionnez --
                                                    </option>
                                                    <option value="Débutant">
                                                        Débutant (A1-A2)
                                                    </option>
                                                    <option
                                                        value="Intermédiaire"
                                                    >
                                                        Intermédiaire (B1-B2)
                                                    </option>
                                                    <option value="Avancé">
                                                        Avancé (C1-C2)
                                                    </option>
                                                    <option
                                                        value="Langue maternelle"
                                                    >
                                                        Langue maternelle
                                                    </option>
                                                </select>
                                                <InputError
                                                    :message="
                                                        form.errors.french_level
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Niveau Anglais -->
                                            <div>
                                                <InputLabel
                                                    for="english_level"
                                                    value="Niveau d'Anglais *"
                                                />
                                                <select
                                                    id="english_level"
                                                    v-model="form.english_level"
                                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                    required
                                                >
                                                    <option value="">
                                                        -- Sélectionnez --
                                                    </option>
                                                    <option value="Débutant">
                                                        Débutant (A1-A2)
                                                    </option>
                                                    <option
                                                        value="Intermédiaire"
                                                    >
                                                        Intermédiaire (B1-B2)
                                                    </option>
                                                    <option value="Avancé">
                                                        Avancé (C1-C2)
                                                    </option>
                                                    <option
                                                        value="Langue maternelle"
                                                    >
                                                        Langue maternelle
                                                    </option>
                                                </select>
                                                <InputError
                                                    :message="
                                                        form.errors
                                                            .english_level
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>

                                        <!-- Autres langues -->
                                        <div>
                                            <InputLabel
                                                for="other_languages"
                                                value="Autres langues parlées (optionnel)"
                                            />
                                            <TextInput
                                                id="other_languages"
                                                type="text"
                                                class="mt-1 block w-full"
                                                v-model="form.other_languages"
                                                placeholder="Ex: Espagnol (Intermédiaire), Allemand (Débutant)"
                                            />
                                            <InputError
                                                :message="
                                                    form.errors.other_languages
                                                "
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <!-- ========== SECTION 6: MOTIVATIONS & OBJECTIFS ========== -->
                                <div
                                    class="bg-rose-50 p-6 rounded-xl border-2 border-rose-200"
                                >
                                    <h2
                                        class="text-xl font-bold text-rose-900 mb-4 flex items-center gap-2"
                                    >
                                        <i class="fas fa-star"></i>
                                        Motivations & Objectifs
                                    </h2>

                                    <div class="space-y-4">
                                        <!-- Motivation -->
                                        <div>
                                            <InputLabel
                                                for="motivation"
                                                value="Pourquoi souhaitez-vous suivre cette formation ? *"
                                            />
                                            <textarea
                                                id="motivation"
                                                v-model="form.motivation"
                                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                rows="4"
                                                placeholder="Décrivez vos motivations pour cette formation..."
                                                required
                                            ></textarea>
                                            <InputError
                                                :message="
                                                    form.errors.motivation
                                                "
                                                class="mt-2"
                                            />
                                        </div>

                                        <!-- Objectifs -->
                                        <div>
                                            <InputLabel
                                                for="career_goals"
                                                value="Quels sont vos objectifs professionnels après cette formation ? *"
                                            />
                                            <textarea
                                                id="career_goals"
                                                v-model="form.career_goals"
                                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                rows="4"
                                                placeholder="Expliquez vos projets professionnels..."
                                                required
                                            ></textarea>
                                            <InputError
                                                :message="
                                                    form.errors.career_goals
                                                "
                                                class="mt-2"
                                            />
                                        </div>

                                        <!-- Connaissances préalables -->
                                        <div>
                                            <InputLabel
                                                for="prior_knowledge"
                                                value="Avez-vous des connaissances préalables dans ce domaine ?"
                                            />
                                            <textarea
                                                id="prior_knowledge"
                                                v-model="form.prior_knowledge"
                                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                rows="3"
                                                placeholder="Décrivez vos compétences ou expériences dans ce domaine..."
                                            ></textarea>
                                            <InputError
                                                :message="
                                                    form.errors.prior_knowledge
                                                "
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <!-- ========== SECTION 7: DISPONIBILITÉ ========== -->
                                <div
                                    class="bg-cyan-50 p-6 rounded-xl border-2 border-cyan-200"
                                >
                                    <h2
                                        class="text-xl font-bold text-cyan-900 mb-4 flex items-center gap-2"
                                    >
                                        <i class="fas fa-calendar-check"></i>
                                        Disponibilité
                                    </h2>

                                    <div class="space-y-4">
                                        <div
                                            class="grid grid-cols-1 md:grid-cols-2 gap-4"
                                        >
                                            <!-- Disponibilité générale -->
                                            <div>
                                                <InputLabel
                                                    for="availability"
                                                    value="Disponibilité *"
                                                />
                                                <select
                                                    id="availability"
                                                    v-model="form.availability"
                                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                    required
                                                >
                                                    <option value="">
                                                        -- Sélectionnez --
                                                    </option>
                                                    <option value="Temps plein">
                                                        Temps plein (disponible
                                                        toute la journée)
                                                    </option>
                                                    <option
                                                        value="Temps partiel"
                                                    >
                                                        Temps partiel (quelques
                                                        heures/jour)
                                                    </option>
                                                    <option value="Week-ends">
                                                        Week-ends uniquement
                                                    </option>
                                                    <option value="Soirées">
                                                        Soirées uniquement
                                                        (après 17h)
                                                    </option>
                                                </select>
                                                <InputError
                                                    :message="
                                                        form.errors.availability
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>

                                            <!-- Horaires préférés -->
                                            <div>
                                                <InputLabel
                                                    for="preferred_schedule"
                                                    value="Horaires préférés"
                                                />
                                                <select
                                                    id="preferred_schedule"
                                                    v-model="
                                                        form.preferred_schedule
                                                    "
                                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                >
                                                    <option value="">
                                                        -- Sélectionnez --
                                                    </option>
                                                    <option value="Matinée">
                                                        Matinée (8h-12h)
                                                    </option>
                                                    <option value="Après-midi">
                                                        Après-midi (14h-18h)
                                                    </option>
                                                    <option value="Soirée">
                                                        Soirée (18h-21h)
                                                    </option>
                                                    <option value="Flexible">
                                                        Flexible
                                                    </option>
                                                </select>
                                                <InputError
                                                    :message="
                                                        form.errors
                                                            .preferred_schedule
                                                    "
                                                    class="mt-2"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ========== SECTION 8: DOCUMENTS (Optionnel) ========== -->
                                <div
                                    class="bg-indigo-50 p-6 rounded-xl border-2 border-indigo-200"
                                >
                                    <h2
                                        class="text-xl font-bold text-indigo-900 mb-4 flex items-center gap-2"
                                    >
                                        <i class="fas fa-file-upload"></i>
                                        Documents (Optionnel)
                                    </h2>

                                    <div class="space-y-4">
                                        <!-- CV -->
                                        <div>
                                            <InputLabel
                                                for="cv_file"
                                                value="Télécharger votre CV (PDF, DOC, DOCX - Max 5MB)"
                                            />
                                            <input
                                                id="cv_file"
                                                type="file"
                                                @change="handleFileUpload"
                                                accept=".pdf,.doc,.docx"
                                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                                            />
                                            <p
                                                class="text-xs text-gray-500 mt-1"
                                            >
                                                Formats acceptés : PDF, DOC,
                                                DOCX
                                            </p>
                                            <InputError
                                                :message="form.errors.cv_file"
                                                class="mt-2"
                                            />
                                        </div>

                                        <!-- Message additionnel -->
                                        <div>
                                            <InputLabel
                                                for="message"
                                                value="Message ou informations complémentaires"
                                            />
                                            <textarea
                                                id="message"
                                                v-model="form.message"
                                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                rows="3"
                                                placeholder="Ajoutez toute information que vous jugez utile pour votre candidature..."
                                            ></textarea>
                                            <InputError
                                                :message="form.errors.message"
                                                class="mt-2"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <!-- SUBMIT -->
                                <div
                                    class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 rounded-xl text-white flex flex-col sm:flex-row items-center justify-between gap-4"
                                >
                                    <div>
                                        <p class="font-bold text-lg">
                                            Prêt à postuler ?
                                        </p>
                                        <p class="text-sm text-blue-100">
                                            Vérifiez bien toutes vos
                                            informations avant de soumettre
                                        </p>
                                    </div>
                                    <PrimaryButton
                                        class="bg-white text-blue-600 hover:bg-blue-50 px-8 py-4 text-lg font-bold shadow-lg hover:shadow-xl transition transform hover:scale-105"
                                        :class="{
                                            'opacity-50 cursor-not-allowed':
                                                form.processing,
                                        }"
                                        :disabled="form.processing"
                                    >
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        {{
                                            form.processing
                                                ? "Envoi en cours..."
                                                : "Envoyer ma candidature"
                                        }}
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>

                        <!-- MODE CONNEXION -->
                        <div v-show="mode === 'login'" class="py-8">
                            <div class="text-center mb-8">
                                <i
                                    class="fas fa-folder-open text-6xl text-blue-600 mb-4"
                                ></i>
                                <h2 class="text-3xl font-bold text-gray-900">
                                    Consulter mon dossier
                                </h2>
                                <p class="text-gray-500 mt-2">
                                    Saisissez le numéro de téléphone utilisé
                                    lors de votre inscription.
                                </p>
                            </div>

                            <form
                                @submit.prevent="submitLogin"
                                class="max-w-md mx-auto space-y-6"
                            >
                                <div>
                                    <InputLabel
                                        for="login_phone"
                                        value="Téléphone (WhatsApp)"
                                    />
                                    <TextInput
                                        id="login_phone"
                                        v-model="loginForm.phone"
                                        type="tel"
                                        class="mt-1 block w-full text-lg p-3"
                                        placeholder="Ex: 699999999"
                                        required
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="loginForm.errors.phone"
                                    />
                                </div>

                                <div class="flex items-center justify-end">
                                    <PrimaryButton
                                        :class="{
                                            'opacity-25': loginForm.processing,
                                        }"
                                        :disabled="loginForm.processing"
                                        class="w-full text-center justify-center py-4 text-lg"
                                    >
                                        <i class="fas fa-search mr-2"></i> Voir
                                        ma fiche
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </PublicLayout>
</template>
